<?php

namespace App\Http\Controllers\API\Reserva;

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

#Modelos
use App\Models\CategoriaHab;
use App\Models\Habitacion;
use App\Models\Reserva;
use App\Models\Huesped;
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

class BookingController extends ApiController
{
    public function store(Request $request, $locale)
    {
        $rules = [
            'pago_x_destino' => 'required|boolean',
            'checkIn' => 'required|date',
            'checkOut' => 'required|date',
            'plataforma' => 'required|string',
            'noches' => 'required|integer',
            'habitaciones' => 'required|integer',
            'adultos' => 'required|integer',
            'precio' => 'required|numeric',
            'currency' => 'required|string',
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
            'adultos.integer' => 'Solo se aceptan numeros',
            'precio.required' => 'Es necesario indicar el monto a pagar por la reserva',
            'precio.numeric' => 'Solo se aceptan numeros',
            'currency.required' => 'Es necesario indicar el tipo de moneda con el que se realizara el pago',
            'currency.string' => 'Solo se aceptan cadenas de caracteres',
            'habitacion.required' => 'Es necesario asignar un cuarto a la reserva',
            'payment.required' => 'El metodo de pago es requerido'
        ];

        $this->validate($request, $rules, $messages);

        $pais = Pais::findOrFail($request->pais_id);
        $habitacion = Habitacion::findOrFail($request->habitacion_id);
        $user = User::where('email', 'admin@admin.com')->first();

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

 
        
        if ($habitacion->stock > 0) 
        {
            #Se obtiene el ID del ultimo registro de reservas
            $last_reserva = Reserva::all();
            $last_reserva = $last_reserva->last();
            $id_last_reserva = ($last_reserva == NULL) ? 1 : $last_reserva->id + 1;

            #Obtencion del tipo de habitacion
            $categoria_habitacion = CategoriaHab::findOrFail($habitacion->categoria_habitacion_id);
            $tipo_folio = '';
            switch ($categoria_habitacion->nombre_es) 
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
                    'noches' => $request->noches,
                    'habitaciones' => $request->habitaciones,
                    'adultos' => $request->adultos,
                    'infantes' => ($request->filled('infantes')) ? $request->infantes : 0,
                    'precio' => $request->precio,
                    'currency' => Str::of($request->currency)->upper(),
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
                $message = ($locale == 'es') ? 'Error al guardar la reservacion intente mas tarde' : 'There was an error saving your reservation, please try again later';
                return $this->errorResponse($message.' '.$e,500);
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
                if($locale == 'es')
                {
                    Mail::to($request->email)->send(new ReservaReceived($request));
                    return $this->successResponse('La reserva se creo con exito', $data, 201);
                }else if ($locale == 'en') {
                    Mail::to($request->email)->send(new reservaSuccess($request));
                    return $this->successResponse('Reservation was created successfully', $data, 201);
                }
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
}
