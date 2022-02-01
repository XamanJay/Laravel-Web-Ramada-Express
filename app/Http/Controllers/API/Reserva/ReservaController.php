<?php

namespace App\Http\Controllers\API\Reserva;

use App\Http\Controllers\API\Santander\SantanderBooking;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

#Modelos
use App\Models\TipoCambio;
use App\Models\CategoriaHab;
use App\Models\Temporadas;
use App\Models\Habitacion;
use App\Models\Santander;
use App\Models\Huesped;
use App\Models\Reserva;
use App\Models\Pais;
use App\Models\User;

#Mails
use App\Mail\en\reservaFailednew;
use App\Mail\en\reservaSuccess;
use App\Mail\ReservaReceived;
use App\Mail\ReservaFailed;
use App\Mail\StockRoom;


#Fecha libreria
use Carbon\Carbon;


class ReservaController extends ApiController
{

    public function index()
    {
        $reservas = Reserva::all();
        $message = 'Mostrando ' . count($reservas) . ' reservas disponibles';
        return ($reservas->isEmpty()) ? $this->successResponse($message, NULL, 200) : $this->successResponse($message, $reservas, 200);
    }

    public function show($id)
    {
        $message = 'Mostrando reserva solicitada';
        $reserva = Reserva::findOrFail($id);
        return $this->successResponse($message, $reserva, 200);
    }

    public function update(Request $request, $id)
    {
        $rules = [];

        $messages = [];

        $this->validate($request, $rules, $messages);

        $reserva = Reserva::findOrFail($id);
        $reserva->pago_x_destino = ($request->filled('checkOut')) ? $request->pago_x_destino : $reserva->pago_x_destino;
        $reserva->checkIn = ($request->filled('checkOut')) ? Carbon::parse($request->checkIn) : $reserva->checkIn;
        $reserva->checkOut = ($request->filled('checkOut')) ? Carbon::parse($request->checkOut) : $reserva->checkOut;
        $reserva->plataforma = ($request->filled('plataforma')) ? $request->plataforma : $reserva->plataforma;
        $reserva->noches = ($request->filled('noches')) ? $request->noches : $reserva->noches;
        $reserva->habitaciones = ($request->filled('habitaciones')) ? $request->habitaciones : $reserva->habitaciones;
        $reserva->adultos = ($request->filled('adultos')) ? $request->adultos : $reserva->adultos;
        $reserva->infantes = ($request->filled('infantes')) ? $request->infantes : $reserva->infantes;
        $reserva->precio = ($request->filled('precio')) ? $request->precio : $reserva->precio;
        $reserva->currency = ($request->filled('currency')) ? $request->currency : $reserva->currency;
        $reserva->estatus = $request->estatus;
        $reserva->comentarios = ($request->filled('comentarios')) ? $request->comentarios : $reserva->comentarios;
        $reserva->habitacion_id = ($request->filled('habitacion_id')) ? $request->habitacion_id : $reserva->habitacion_id;
        $reserva->transfer_id = NULL;

        $reserva->save();

        $message = 'Reserva modificado correctamente';

        return $this->successResponse($message, $reserva, 200);
    }

    public function store(Request $request,$locale)
    {
        $rules = [
            'pago_x_destino' => 'required|boolean',
            'checkIn' => 'required|date',
            'checkOut' => 'required|date',
            'plataforma' => 'required|string',
            'noches' => 'required|integer',
            'habitaciones' => 'required|integer',
            'adultos' => 'required',
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'email' => 'required|email',
            'telefono' => 'required',
            'pais_id' => 'required',
            'habitacion_id' => 'required',
            'payment' => 'required'
        ];

        $messages = [
            'pago_x_destino.required' => 'Es necesario indicar si la habitacion cuenta con pago en destino',
            'pago_x_destino.boolean' => 'Formato invalido para pago_x_destino',
            'checkIn.required' => 'Es necesario indicar la fecha de ingreso al hotel',
            'checkIn.date' => 'Solo se aceptan fechas en este campo',
            'checkOut.required' => 'Es necesario indicar la fecha de salida del hotel',
            'checkout.date' => 'Solo se aceptan fechas en este campo',
            'plataforma.required' => 'Es necesario indicar de que plataforma se esta realizado la reserva',
            'plataforma.string' => 'Formato invalido, solo se aceptan cadena de caracteres',
            'noches.required' => 'Es necesario indicar cuantas noches se hospedara',
            'noches.integer' => 'Solo se aceptan numeros',
            'habitaciones.required' => 'Es necesario indicar cuantas habitaciones reservara',
            'habitaciones.integer' => 'Solo se aceptan numeros',
            'adultos.required' => 'Es necesario indicar cuantos adultos se hospedaran',
            'habitacion.required' => 'Es necesario asignar un cuarto a la reserva',
            'payment.required' => 'El metodo de pago es requerido'
        ];

        $this->validate($request, $rules, $messages);


        $pais = Pais::findOrFail($request->pais_id);
        $habitacion = Habitacion::findOrFail($request->habitacion_id);
        $user = User::where('email', 'admin@admin.com')->first();


        $tarifa = getPrices($request->checkIn,$request->checkOut,$request->noches,$request->adultos,$request->infantes,$request->habitacion_id,$request->habitaciones);
        //dd($tarifa);

        #Se valida si el email dado pertenece a clubestrella de lo contrario se queda como null
        $club_email = NULL;
        $isClub = FALSE;
        if($request->isClub == TRUE)
        {
            ($request->same_email) ? $club_email = $request->email : $club_email = $request->club_email;
            $club_email = DB::connection('mysql2')->table('users')->where('email',$club_email)->first();
            if($club_email != NULL)
                $isClub = TRUE;
        }

        #Si el tock es 0 mandar EMAIL para abrir mas habitaciones
        if ($habitacion->stock > 0) 
        {
            #Se obtiene el ID del ultimo registro de reservas
            $last_reserva = Reserva::all();
            $last_reserva = $last_reserva->last();
            $id_last_reserva = ($last_reserva == NULL) ? 1 : $last_reserva->id + 1;

            #Obtencion del tipo de habitacion
            $tipo_folio = '';
            switch ($habitacion->categoria->nombre_es) 
            {
                case 'Estandar':
                    $tipo_folio = 'STD';
                    break;
                case 'Superior':
                    $tipo_folio = 'SUP';
                    break;
                case 'Ejecutivo':
                    $tipo_folio = 'EJC';
                    break;
            }
  
            #Se combina el tipo de habitacion con el id del ultimo registro de reservas
            $folio_reserva = $tipo_folio . $id_last_reserva;
            //dd($folio_reserva);
            $total = 0;
            $currency = 'USD';
            if($locale == 'es')
            {
                $tipo_x_cambio = TipoCambio::first();
                $total = $tarifa['total'] * $tipo_x_cambio->valor_x_moneda;
                $currency = 'MXN';
            }else{
                $total = $tarifa['total'];
            }


            #Se hace una transaccion para hacer la reserva
            try 
            {
                DB::beginTransaction();

                $huesped = Huesped::create([
                    'nombre' => Str::ucfirst(Str::lower($request->nombre)),
                    'apellidos' => Str::ucfirst(Str::lower($request->apellidos)),
                    'email' => $request->email,
                    'telefono' => $request->telefono,
                    'isWhatsApp' => $request->isWhatsApp,
                    'isClub' => $request->isClub,
                    'ciudad' => ($request->filled('ciudad')) ? Str::ucfirst(Str::lower($request->ciudad)) : 'Cancun',
                    'club_email' => $isClub,
                    'pais_id' => $pais->id,

                ]);

                $reserva = Reserva::create([
                    'pago_x_destino' => $request->pago_x_destino,
                    'checkIn' => Carbon::parse($request->checkIn)->format('Y-m-d'),
                    'checkOut' => Carbon::parse($request->checkOut)->format('Y-m-d'),
                    'plataforma' => $request->plataforma,
                    'noches' => $tarifa['noches'],
                    'habitaciones' => $tarifa['habitaciones'],
                    'adultos' => $tarifa['adultos'],
                    'infantes' => $tarifa['infantes'],
                    'precio' => $total,
                    'currency' => $currency,
                    'estatus' => 'pendiente',
                    'comentarios' => ($request->filled('comentarios')) ? $request->comentarios : null,
                    'huesped_id' => $huesped->id,
                    'paypal_pago_id' => NULL,
                    'santander_pago_id' => NULL,
                    'habitacion_id' => $habitacion->id,
                    'user_id' => $user->id,
                    'transfer_id' => NULL,
                    'folio' => $folio_reserva,
                    'metodo_pago' => $request->payment
                ]);

                DB::commit();


            } catch (\Exception $e) {
                DB::rollBack();
                return $this->errorResponse('Error al guardar la reservacion '.$e,500);
            }
            #Se aparta la habitacion y se hace el update en la BD
            $habitacion->stock -= 1;
            $habitacion->save();
            #En caso de que el stock llegue a 0 se mandara una notificacion para que se actualice el stock
            if($habitacion->stock == 0)
            {
                Mail::to('ecommerce@gphoteles.com')
                >bcc(['programacionweb@gphoteles.com','gerencia@gphoteles.com','ventas@gphoteles.com','recepcion.adhara@gphoteles.com'])
                ->send(new StockRoom($habitacion));
            }
            
            $data = [
                'folio' => $folio_reserva,
                'metodo_pago' => $request->payment
            ];

            #En caso de que el metodo de pago se PAGO_DESTINO solo se devuelve la respuesta con la RESERVA
            if($request->payment == 'pago_destino')
            {
                Mail::to($request->email)->send(new ReservaReceived($request));
                return $this->successResponse('La reserva se creo con exito', $data, 201);
                 /*else if ($locale == 'en') {
                    Mail::to($request->email)->send(new reservaSuccess($request));
                    return $this->successResponse('Reservation was created successfully', $data, 201);
                }*/
                #El codigo 201 indica que la reserva se pagara al llegar al hotel

            }
            else{
                # se necesita hacer un paso mas que es redirigir al metodo de pago
                return $this->successResponse('Exito al guardar la reservacion',$data,203);
                #El codigo 203 indica que se necesita redigir al metodo de pago especificado
            }
        } else {
            //enviar una notificacion a recepcion de que no hay mas habitaciones por el momento
            $message = 'No existen habitaciones disponibles para realizar una reserva';
            Mail::to('ecommerce@gphoteles.com')
                ->bcc(['programacionweb@gphoteles.com','gerencia@gphoteles.com','ventas@gphoteles.com','recepcion.adhara@gphoteles.com'])
                ->send(new StockRoom($habitacion));

            return $this->errorResponse($message,409); #409 Indica que no hay cuartos disponibles
        }
    }

    public function destroy($id)
    {
        $reserva = Reserva::findOrFail($id);
        $message = 'La reserva se eliminó correctamente';
        $reserva->delete();

        return ($reserva) ? $this->successResponse($message, NULL, 200) : $this->successResponse($message, $reserva, 200);
    }
}


function getprices($llegada,$salida,$nights,$adults,$kids,$id,$habitaciones)
{
    //dd($llegada);
    # Los valores de adultos y niños vendran en array
    $checkIn = Carbon::createFromFormat('Y-m-d', $llegada);
    $checkOut = Carbon::createFromFormat('Y-m-d', $salida);
    $habitacion = Habitacion::findOrFail($id);

        

    $diff = $checkIn->diffInDays($checkOut);
    $noches = ($nights == $diff) ? $nights : $diff;
    $rooms = $habitaciones;
    $pointer = $checkIn;


    $total = 0;
    $precio_x_adulto = 0;
    $precio_x_infante = 0;
    $desayuno_x_adulto = 0;
    $desayuno_x_infante = 0;
    $detalle_x_habitacion = [];
    $adultos = 0;
    $childs = 0;
    foreach ($adults as $adult) {
        $adultos += $adult;
    }

    foreach ($kids as $kid) {
        $childs += $kid;
    }


    for ($i=0; $i < $noches; $i++) 
    { 
        $temporada = Temporadas::where('startDate','<',$pointer->toDateString())->first(); 
        if($i == 0)
        {
            #Informacion que va en la cabecera, por eso se hace en la NOCHE - 1
            $detalle_x_habitacion = [
                'habitacion' => $habitacion->categoria->nombre_es,
                'isTarifaMagica' => ($habitacion->isTarifaMagica) ? 'ES TARIFA MAGICA' : 'NO ES TARIFA MAGICA',
                'plan_x_alimentos' => $habitacion->plan->nombre_es,
                'noches' => $noches,
                'habitaciones' => (int)$rooms,
                'adultos' => $adultos,
                'infantes' => $childs,
            ];
        }
                
        $pointer_total = 0;

        for ($j=0; $j < $rooms ; $j++) 
        { 
            if($i > 0)
            {
                $habitacion->total = $detalle_x_habitacion['habitacion_'.($j+1)]['subtotal'] + $temporada->tarifa_x_dolares;
            }else{
                $habitacion->total = $temporada->tarifa_x_dolares;
            }
                       
                    
            $pointer_x_adulto = 0;
            $precio_x_pax_extra = 0;
            $adultos = (int)$adults[$j];

            if($adultos > 2)
            {
                $pointer_x_adulto = $adultos - 2;
                $precio_x_pax_extra += ($pointer_x_adulto * $habitacion->categoria->plus_x_pax) * $noches;
            }

            if($habitacion->plan->isDesayuno)
            {
                $habitacion->precio_desayuno_adulto = $habitacion->plan->desayuno_adulto  * ((int)$adults[$j] * $noches);
                $habitacion->precio_desayuno_infante = $habitacion->plan->desayuno_infante * ((int)$kids[$j] * $noches);
            }
                    
            $precio_x_habitacion = [
                'habitacion_'.($j+1) =>[
                    'adultos' => $adultos,
                    'infantes' => (int)$kids[$j],
                    'subtotal' => $habitacion->total,
                    'subtotal_x_adulto_extra' => $precio_x_pax_extra,
                    'subtotal_desayuno_x_adulto' => $habitacion->plan->desayuno_adulto * ($adults[$j] * $noches),
                    'subtotal_desayuno_x_infante' => $habitacion->plan->desayuno_infante * ($kids[$j] * $noches),
                    'total' =>  $habitacion->total + ($precio_x_pax_extra) + $habitacion->precio_desayuno_adulto + $habitacion->precio_desayuno_infante + $habitacion->categoria->plus_tarifa_base,
                    'plus_x_room' => $habitacion->categoria->plus_tarifa_base,
                    'plus_x_pax' => $habitacion->categoria->plus_x_pax,
                    'desayuno_x_adulto' => $habitacion->plan->desayuno_adulto,
                    'desayuno_x_infante' => $habitacion->plan->desayuno_infante,
                ]
            ];
                    $pointer_total += $precio_x_habitacion['habitacion_'.($j+1)]['total'];
                    $detalle_x_habitacion = array_merge($detalle_x_habitacion,$precio_x_habitacion);
                    $habitacion->total = 0;
                    
        }
                
        $price = [
            'total' => $pointer_total,
            'currency' => $temporada->currency
        ];
        $detalle_x_habitacion = array_merge($detalle_x_habitacion,$price);
           

        $pointer = $pointer->addDays(1);
    }
    return $detalle_x_habitacion;
}
