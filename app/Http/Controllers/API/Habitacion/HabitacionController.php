<?php

namespace App\Http\Controllers\API\Habitacion;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\CategoriaHab;
use App\Models\Habitacion;
use App\Models\PlanHab;
use App\Models\Hotel;



class HabitacionController extends ApiController
{
    public function index()
    {
        $habitaciones = Habitacion::all();
        $count = count($habitaciones);

        return $this->successResponse('Mostrando '.$count.' habitaciones',$habitaciones,200);
    }

    public function store(Request $request)
    {
        $rules = [
            'isTarifaMagica' => 'required|boolean',
            'incluye_alimentos' => 'required|boolean',
            'pago_x_destino' => 'required|boolean',
            'stock' => 'required|integer',
            'hotel_id' => 'required',
            'plan_id' => 'required',
            'categoria_id' => 'required'
        ];

        $messages = [
            'isTarifaMagica.required' => 'Es necesario indicar un valor',
            'isTarifaMagica.boolean' => 'Valor no permitido en este campo',
            'incluye_alimentos.required' => 'Es necesario indicar un valor',
            'incluye_alimentos.boolean' => 'Valor no permitido en este campo',
            'pago_x_destino.required' => 'Es necesario indicar un valor',
            'pago_x_destino.boolean' => 'Valor no permitido en este campo',
            'stock.required' => 'Es necesario indicar un stock para la habitacion',
            'stock.integer' => 'Este campo solo acepta numero enteros',
            'hotel_id' => 'Es necesario indicar a que hotel pertenece esta habitacion',
            'plan_id' => 'Es necesario asignar un tipo de plan a la habitacion',
            'categoria_id' => 'Es necesario asignar una categoria a la habitacion'
        ];

        $this->validate($request,$rules,$messages);

        $hotel = Hotel::findOrFail($request->hotel_id);
        $plan = PlanHab::findOrFail($request->plan_id);
        $categoria = CategoriaHab::findOrFail($request->categoria_id);

        $habitacion = new Habitacion();
        $habitacion->isTarifaMagica = $request->isTarifaMagica;
        $habitacion->incluye_alimentos = $request->incluye_alimentos;
        $habitacion->pago_x_destino = $request->pago_x_destino;
        $habitacion->stock = $request->stock;
        $habitacion->hotel_id = $hotel->id;
        $habitacion->plan_habitacion_id = $plan->id;
        $habitacion->categoria_habitacion_id = $categoria->id;
        $habitacion->save();

        return $this->successResponse("La habitacion se registró con exito",$habitacion,201);
    }

    public function update(Request $request,$id)
    {
        $rules = [
            'isTarifaMagica' => 'required|boolean',
            'incluye_alimentos' => 'required|boolean',
            'pago_x_destino' => 'required|boolean',
            'stock' => 'required|integer',
            'hotel_id' => 'required',
            'plan_id' => 'required',
            'categoria_id' => 'required'
        ];

        $messages = [
            'isTarifaMagica.required' => 'Es necesario indicar un valor',
            'isTarifaMagica.boolean' => 'Valor no permitido en este campo',
            'incluye_alimentos.required' => 'Es necesario indicar un valor',
            'incluye_alimentos.boolean' => 'Valor no permitido en este campo',
            'pago_x_destino.required' => 'Es necesario indicar un valor',
            'pago_x_destino.boolean' => 'Valor no permitido en este campo',
            'stock.required' => 'Es necesario indicar un stock para la habitacion',
            'stock.integer' => 'Este campo solo acepta numero enteros',
            'hotel_id' => 'Es necesario indicar a que hotel pertenece esta habitacion',
            'plan_id' => 'Es necesario asignar un tipo de plan a la habitacion',
            'categoria_id' => 'Es necesario asignar una categoria a la habitacion'
        ];

        $this->validate($request,$rules,$messages);

        $hotel = Hotel::findOrFail($request->hotel_id);
        $plan = PlanHab::findOrFail($request->plan_id);
        $categoria = CategoriaHab::findOrFail($request->categoria_id);

        $habitacion = Habitacion::findOrFail($id);
        $habitacion->isTarifaMagica = $request->isTarifaMagica;
        $habitacion->incluye_alimentos = $request->incluye_alimentos;
        $habitacion->pago_x_destino = $request->pago_x_destino;
        $habitacion->stock = $request->stock;
        $habitacion->hotel_id = $hotel->id;
        $habitacion->plan_habitacion_id = $plan->id;
        $habitacion->categoria_habitacion_id = $categoria->id;
        $habitacion->save();

        return $this->successResponse("La habitacion se actualizó con exito",$habitacion,200);
    }

    public function destroy($id)
    {
        $hab = Habitacion::findOrFail($id);
        $hab->delete();

        return $this->successResponse('La Habitacion se elimino de manera correcta',200);
    }


}
