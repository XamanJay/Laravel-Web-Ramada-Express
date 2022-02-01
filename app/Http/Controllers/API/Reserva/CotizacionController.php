<?php

namespace App\Http\Controllers\API\Reserva;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

use App\Models\Temporadas;
use App\Models\Habitacion;

#Fecha libreria
use Carbon\Carbon;

class CotizacionController extends ApiController
{
    public function checkSeason(Request $request)
    {
        $rules = [
            'checkIn' => 'required|date',
            'checkOut' => 'required|date',
            'habitaciones' => 'required|integer',
            'adultos' => 'required',
        ];

        $messages = [
            'checkIn.required' => 'Es necesario indicar la fecha de ingreso al hotel',
            'checkIn.date' => 'Solo se aceptan fechas en este campo',
            'checkOut.required' => 'Es necesario indicar la fecha de salida del hotel',
            'checkout.date' => 'Solo se aceptan fechas en este campo',
            'habitaciones.required' => 'Es necesario indicar cuantas habitaciones reservara',
            'habitaciones.integer' => 'Solo se aceptan numeros',
            'adultos.required' => 'Es necesario indicar cuantos adultos se hospedaran'
        ];

        $this->validate($request, $rules, $messages);

        # Los valores de adultos y niños vendran en array
        $checkIn = Carbon::createFromFormat('Y-m-d', $request->checkIn);#Cuando llegan los clientes
        $checkOut = Carbon::createFromFormat('Y-m-d', $request->checkOut);#Cuando dejan el hotel
        $habitaciones = Habitacion::where('hotel_id',1)->get();

        $noches = $checkIn->diffInDays($checkOut);
        $rooms = $request->habitaciones;#Habitacion que el cliente mando a cotizar

        $pointer = $checkIn;


        $total = 0;
        $precio_x_adulto = 0;
        $precio_x_infante = 0;
        $desayuno_x_adulto = 0;
        $desayuno_x_infante = 0;
        $detalle_x_habitacion = [];
        //dd($pointer);

        for ($i=0; $i < $noches; $i++) 
        { 
            $temporada = Temporadas::where('startDate','<',$pointer->toDateString())->first();
            if($temporada == NULL)
                return $this->successResponse('No existen temporadas disponibles para estas fechas',null,200);
            
            foreach ($habitaciones as  $key => $habitacion) 
            {
                //dd($temporada);

                if($i == 0)
                {
                    $detalle_x_habitacion[$key] = [
                        'id' => $habitacion->id,
                        'habitacion' => $habitacion->categoria->nombre_es,
                        'isTarifaMagica' => ($habitacion->isTarifaMagica) ? 'ES TARIFA MAGICA' : 'NO ES TARIFA MAGICA',
                        'plan_x_alimentos' => $habitacion->plan->nombre_es,
                        'tarifa_base' => $temporada->tarifa_x_dolares,
                        'noches' => $noches,
                        'cuartos' => (int)$rooms
                    ];
                }
                
                //dd($detalle_x_habitacion[$key]);
                $pointer_total = 0;

                //$hold_hab + ($habitacion->total + $temporada->tarifa_x_dolares);
                for ($j=0; $j < $rooms ; $j++) 
                { 
                    if($i > 0)
                    {
                        if($habitacion->isTarifaMagica)
                        {
                            if($habitacion->categoria->tag_es == 'estandar')
                            {
                                #En caso de que sea Categoria estandar se resta el porcentaje sobre la tarifa base
                                $tarifa_magica = $temporada->tarifa_x_dolares - ($temporada->tarifa_x_dolares * ($habitacion->porcentaje/100));
                                $habitacion->total = $detalle_x_habitacion[$key]['habitacion_'.($j+1)]['subtotal'] + $tarifa_magica;

                            }else{
                                #En caso de que sea diferente a Categoria estandar se suma el porcentaje sobre la tarifa base
                                $tarifa_magica = $temporada->tarifa_x_dolares + $habitacion->porcentaje;
                                $habitacion->total = $detalle_x_habitacion[$key]['habitacion_'.($j+1)]['subtotal'] + $tarifa_magica;
                            }
                            
                        }else{
                            $habitacion->total = $detalle_x_habitacion[$key]['habitacion_'.($j+1)]['subtotal'] + $temporada->tarifa_x_dolares;
                        }

                    }else{
                        if($habitacion->isTarifaMagica)
                        {
                            if($habitacion->categoria->tag_es == 'estandar')
                            {
                                //dd($temporada->tarifa_x_dolares * ($habitacion->porcentaje/100));
                                #En caso de que sea Categoria estandar se resta el porcentaje sobre la tarifa base
                                $habitacion->total = $temporada->tarifa_x_dolares - ($temporada->tarifa_x_dolares * ($habitacion->porcentaje/100));
                            }else{
                                #En caso de que sea diferente a Categoria estandar se suma el porcentaje sobre la tarifa base
                                $habitacion->total = $temporada->tarifa_x_dolares + $habitacion->porcentaje;
                            }
                            
                        }else{
                            $habitacion->total = $temporada->tarifa_x_dolares;
                        }
                    }
                    
                    $pointer_x_adulto = 0;
                    $precio_x_pax_extra = 0;
                    $adultos = (int)$request->adultos[$j];

                    if($adultos > 2)
                    {
                        $pointer_x_adulto = $adultos - 2;
                        $precio_x_pax_extra += ($pointer_x_adulto * $habitacion->categoria->plus_x_pax) * $noches;
                    }

                    if($habitacion->plan->isDesayuno)
                    {
                        $habitacion->precio_desayuno_adulto = $habitacion->plan->desayuno_adulto  * ((int)$request->adultos[$j] * $noches);
                        $habitacion->precio_desayuno_infante = $habitacion->plan->desayuno_infante * ((int)$request->infantes[$j] * $noches);
                    }
                    
                    $precio_x_habitacion[$key] = [
                        'habitacion_'.($j+1) =>[
                            'adultos' => $adultos,
                            'infantes' => (int)$request->infantes[$j],
                            'subtotal' => $habitacion->total,
                            'subtotal_x_adulto_extra' => $precio_x_pax_extra,
                            'subtotal_desayuno_x_adulto' => $habitacion->plan->desayuno_adulto * ($request->adultos[$j] * $noches),
                            'subtotal_desayuno_x_infante' => $habitacion->plan->desayuno_infante * ($request->infantes[$j] * $noches),
                            'total' =>  $habitacion->total + ($precio_x_pax_extra) + $habitacion->precio_desayuno_adulto + $habitacion->precio_desayuno_infante + $habitacion->categoria->plus_tarifa_base,
                            'plus_x_room' => $habitacion->categoria->plus_tarifa_base,
                            'plus_x_pax' => $habitacion->categoria->plus_x_pax,
                            'desayuno_x_adulto' => $habitacion->plan->desayuno_adulto,
                            'desayuno_x_infante' => $habitacion->plan->desayuno_infante,
                        ]
                    ];
                    $pointer_total += $precio_x_habitacion[$key]['habitacion_'.($j+1)]['total'];
                    $detalle_x_habitacion[$key] = array_merge($detalle_x_habitacion[$key],$precio_x_habitacion[$key]);
                    $habitacion->total = 0;
                    
                }
                
                $price = [
                    'total' => $pointer_total,
                    'currency' => $temporada->currency
                ];
                $detalle_x_habitacion[$key] = array_merge($detalle_x_habitacion[$key],$price);
           
            }
            //pointer -> 2021-10-18
            $pointer = $pointer->addDays(1);
        }
        
        //dd($detalle_x_habitacion);
        return $this->successResponse('Mostrando tarifas',$detalle_x_habitacion,200);
    }


    public function checkRoom(Request $request,$locale,$id)
    {
        $rules = [
            'checkIn' => 'required',
            'checkOut' => 'required',
            'noches' => 'required',
            'adultos' => 'required',
            'habitaciones' => 'required'
            
        ];

        $messages = [
            'checkIn.required' => 'Es necesario asignar la fecha de CheckIn',
            'checkOut.required' => 'Es necesario asignar la fecha de checkOut',
            'adultos.required' => 'Es necesario indicar cuantos adultos hay en la reserva',
            'habitaciones.required' => 'Es necesario indicar cuantas habitaciones se eligieron',
            'noches.required' => 'Es necesario indicar cuantas noches se hospedara el cliente'
        ];

        $this->validate($request,$rules,$messages);

        # Los valores de adultos y niños vendran en array
        $checkIn = Carbon::createFromFormat('Y-m-d', $request->checkIn);
        $checkOut = Carbon::createFromFormat('Y-m-d', $request->checkOut);
        $habitacion = Habitacion::findOrFail($id);

        

        $diff = $checkIn->diffInDays($checkOut);
        $noches = ($request->noches == $diff) ? $request->noches : $diff;
        $rooms = $request->habitaciones;
        $pointer = $checkIn;


        $total = 0;
        $precio_x_adulto = 0;
        $precio_x_infante = 0;
        $desayuno_x_adulto = 0;
        $desayuno_x_infante = 0;
        $detalle_x_habitacion = [];


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
                    'tarifa_base' => $temporada->tarifa_x_dolares,
                    'noches' => $noches,
                    'cuartos' => (int)$rooms
                ];
            }
                
            //dd($detalle_x_habitacion);
            $pointer_total = 0;

            for ($j=0; $j < $rooms ; $j++) 
            { 
                if($i > 0){
                    //dd($detalle_x_habitacion['habitacion_'.($j+1)]['subtotal']);
                    if($habitacion->isTarifaMagica)
                        {
                            if($habitacion->categoria->tag_es == 'estandar')
                            {
                                #En caso de que sea Categoria estandar se resta el porcentaje sobre la tarifa base
                                $tarifa_magica = $temporada->tarifa_x_dolares - ($temporada->tarifa_x_dolares * ($habitacion->porcentaje/100));
                                $habitacion->total = $detalle_x_habitacion['habitacion_'.($j+1)]['subtotal'] + $tarifa_magica;

                            }else{
                                #En caso de que sea diferente a Categoria estandar se suma el porcentaje sobre la tarifa base
                                $tarifa_magica = $temporada->tarifa_x_dolares + $habitacion->porcentaje;
                                $habitacion->total = $detalle_x_habitacion['habitacion_'.($j+1)]['subtotal'] + $tarifa_magica;
                            }
                            
                        }else{
                            $habitacion->total = $detalle_x_habitacion['habitacion_'.($j+1)]['subtotal'] + $temporada->tarifa_x_dolares;
                        }
                    //dd($habitacion->total);
                }else{
                    if($habitacion->isTarifaMagica)
                    {
                        if($habitacion->categoria->tag_es == 'estandar')
                        {
                            //dd($temporada->tarifa_x_dolares * ($habitacion->porcentaje/100));
                            #En caso de que sea Categoria estandar se resta el porcentaje sobre la tarifa base
                            $habitacion->total = $temporada->tarifa_x_dolares - ($temporada->tarifa_x_dolares * ($habitacion->porcentaje/100));
                        }else{
                            #En caso de que sea diferente a Categoria estandar se suma el porcentaje sobre la tarifa base
                            $habitacion->total = $temporada->tarifa_x_dolares + $habitacion->porcentaje;
                        }
                        
                    }else{
                        $habitacion->total = $temporada->tarifa_x_dolares;
                    }
                }
                    
                $pointer_x_adulto = 0;
                $precio_x_pax_extra = 0;
                $adultos = (int)$request->adultos[$j];

                if($adultos > 2)
                {
                    $pointer_x_adulto = $adultos - 2;
                    $precio_x_pax_extra += ($pointer_x_adulto * $habitacion->categoria->plus_x_pax) * $noches;
                }

                if($habitacion->plan->isDesayuno)
                {
                    $habitacion->precio_desayuno_adulto = $habitacion->plan->desayuno_adulto  * ((int)$request->adultos[$j] * $noches);
                    $habitacion->precio_desayuno_infante = $habitacion->plan->desayuno_infante * ((int)$request->infantes[$j] * $noches);
                }
                
                $precio_x_habitacion = [
                    'habitacion_'.($j+1) =>[
                        'adultos' => $adultos,
                        'infantes' => (int)$request->infantes[$j],
                        'subtotal' => $habitacion->total,
                        'subtotal_x_adulto_extra' => $precio_x_pax_extra,
                        'subtotal_desayuno_x_adulto' => $habitacion->plan->desayuno_adulto * ($request->adultos[$j] * $noches),
                        'subtotal_desayuno_x_infante' => $habitacion->plan->desayuno_infante * ($request->infantes[$j] * $noches),
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


            //dd($detalle_x_habitacion);
            $pointer = $pointer->addDays(1);
        } 
        //dd($checkIn->format('Y-m-d'));
        //dd($detalle_x_habitacion);

        return $this->successResponse('Mostrando tarifas',$detalle_x_habitacion,200);
    }
}
