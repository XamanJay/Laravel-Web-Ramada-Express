<?php

namespace App\Http\Controllers\API\Paypal;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

use App\Models\Paypal_response;
use App\Models\Paypal_object;
use App\Models\PaypalSecrets;
use App\Models\TipoCambio;
use App\Models\Habitacion;
use App\Models\Reserva;
use \File;

use App\Mail\en\reservaSuccess;



class PaypalController extends ApiController
{

    public function payment(Request $request,$locale)
    {
        $reserva = Reserva::where('folio',$request->id)->first();
        $invoice = 'Inv-'.$reserva['folio'];
        if($reserva == null)
            return $this->errorResponse('No se pudo generar su metodo de pago, por favor comunicate con el area de reservas con el siguiente folio: '.$id.' para continuar con tu reservacion',NULL,500);

  
        $hab = Habitacion::findOrFail($reserva['huesped_id']);
        $message = bookingData($reserva,$locale);
        $price = 1000000000;

        #Se tiene que convertir a MXN todos los precios
        if(($locale == 'es' && $reserva['currency'] == 'MXN') ||($locale == 'en' && $reserva['currency'] == 'MXN'))
            $price = $reserva['precio'];

        if(($locale == 'es' && $reserva['currency'] == 'USD') || ($locale == 'en' && $reserva['currency'] == 'USD'))
        {
            $tipo_x_cambio = TipoCambio::first();
            $price = $reserva['precio'] * $tipo_x_cambio['valor_x_moneda'];
        }

    
        $data = [];
        $data['items'] = [
            [
                'name' => ($locale == 'es')? $habitacion->categoria->nombre_es : $habitacion->categoria->nombre_en ,
                'price' => $price,
                'desc'  => $message,
                'qty' => $reserva['habitaciones']
            ]
        ];

        $paypal_secrets = PaypalSecrest::where('ambiente','test')->first();

        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                $paypal_secrets['client_id'], //Client
                $paypal_secrets['client_secret'],     // ClientSecret
            )
        );
        

        // After Step 2
        $payer = new \PayPal\Api\Payer();
        $payer->setPaymentMethod('paypal');
        

        $amount = new \PayPal\Api\Amount();
        $amount->setTotal($price);
        $amount->setCurrency('MXN');

        $list_items = array();

        #Se crea el item de PAYPAL
        $item = new \PayPal\Api\Item();
        $item->setName('Reserva Adhara Express')
            ->setCurrency('MXN')
            ->setQuantity($reserva['habitaciones'])
            ->setSku($invoice)#Id o folio generado de la reserva
            ->setPrice($price);
        array_push($list_items,$item);
        
                    
        
        $itemList = new \PayPal\Api\ItemList();
        $itemList->setItems($list_items);
        

        $transaction = new \PayPal\Api\Transaction();
        $transaction->setAmount($amount);
        $transaction->setItemList($itemList);
        $transaction->setDescription("Reserva Habitacion"); #Aqui descripcion del producto
        $transaction->setInvoiceNumber(uniqid()); #Invoice de la Habitacion

        $redirectUrls = new \PayPal\Api\RedirectUrls();
        $redirectUrls->setReturnUrl("https://gphoteles.herokuapp.com/paypal/success")
            ->setCancelUrl("https://gphoteles.herokuapp.com/paypal/cancel");

        $payment = new \PayPal\Api\Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);


        // After Step 3
        try {
            $payment->create($apiContext);
            $data = [
                'url' => $payment->getApprovalLink()
            ];

            $paypal_object = new Paypal_object();
            $paypal_object->SDK = $payment->id;
            $paypal_object->intent = $payment->intent;
            $paypal_object->invoice_number = $payment->transactions[0]->invoice_number;
            $paypal_object->link_generated = $payment->links[1]->href;
            $paypal_object->link_status = $payment->links[1]->rel;
            $paypal_object->descripcion = $payment;
            $paypal_object->amount = $price;
            $paypal_object->save();

            return $this->successResponse('Payment creado con exito',$data,201);
            //return redirect()->away($payment->getApprovalLink());
        }
        catch (\PayPal\Exception\PayPalConnectionException $ex) {
            // This will print the detailed information on the exception.
            //REALLY HELPFUL FOR DEBUGGING
            echo $ex->getData();
            dd($ex);
        }
                    

    }

    public function status(Request $request)
    {
        $paypal_secrets = PaypalSecrest::where('ambiente','test')->first();

        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                $paypal_secrets['client_id'], //Client
                $paypal_secrets['client_secret'],     // ClientSecret
            )
        );

        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
        $token = $request->input('token');

        $payment = \PayPal\Api\Payment::get($paymentId, $apiContext);

        $execution = new \PayPal\Api\PaymentExecution();
        $execution->setPayerId($payerId);

        /** Execute the payment **/
        $result = $payment->execute($execution, $apiContext);

        $folio = Str::of($paymentId)->explode('-');
        $reserva = Reserva::where('folio',$folio[1])->first();


        if (!$paymentId || !$payerId || !$token) 
        {
            DB::table('reservaciones')
                    ->where('folio', $folio[1])
                    ->update(['estatus' => 'denegada','paypal_pago_id' => $paymentId]);


            return $this->errorResponse('Lo sentimos! El pago a través de PayPal no se pudo realizar.',NULL,500);
        }

        $paypal_response = new Paypal_response();
        $paypal_response->paymentId = $paymentId;
        $paypal_response->payerId = $payerId;
        $paypal_response->token = $token;
        $paypal_response->state = $result->state;
        $paypal_response->cart = $result->cart;
        $paypal_response->payer_email = $result->payer->payer_info->email;
        $paypal_response->payer_name = $result->payer->payer_info->first_name;
        $paypal_response->payer_lastname = $result->payer->payer_info->last_name;
        $paypal_response->save();

        if ($result->getState() === 'approved') 
        {
            $reservation = DB::table('reservaciones')
                ->where('folio', $folio[1])
                ->update(['estatus' => 'aprobado','paypal_pago_id' => $paymentId]);

            /*Mail::to($result->payer->payer_info->email)
                ->bcc(['programacionweb@gphoteles.com','gerencia@gphoteles.com','ecommerce@gphoteles.com'])
                ->send(new PagoPaypal($response,$huesped,$reservation['currency']));*/

            Mail::to($result->payer->payer_info->email)->send(new reservaSuccess($reservation));

            $status = 'Gracias! El pago a través de PayPal se ha ralizado correctamente.';
            return view('paypal.result')->with(compact('status'));
        }
        else
        {
            DB::table('reservaciones')
                    ->where('folio', $folio[1])
                    ->update(['estatus' => 'denegada','paypal_pago_id' => $paymentId]);

            return redirect('/paypal/failed')->with('error', 'Lo sentimos! Algo ocurrio al realizar el pago en Paypal.');
            //return $this->errorResponse('Lo sentimos! Algo ocurrio al realizar el pago en Paypa',NULL,500);
        }
    }
}

function bookingData($reserva,$lang)
{
    $message = "";
    $message .= ($lang == 'es')? 'Reserva - '.$reserva['folio'] : 'Booking - '.$reserva['folio'];
    $message .= 'CheckIn: '.$reserva['checkIn'].' CheckOut: '.$reserv['checkOut'];
    $message .= ($lang == 'es')? 'Adultos: '.$reserva['adultos'].' Niños: '.$reserva['infantes'] : 'Adults: '.$reserva['adultos'].' Kids: '.$reserva['infantes'];
    $message .= ($lang == 'es')? 'Habitaciones: '.$reserva['habitaciones'].' Noches: '.$reserva['noches'] : 'Rooms: '.$reserva['habitaciones'].' Nights: '.$reserva['noches'];

    return $message;
}