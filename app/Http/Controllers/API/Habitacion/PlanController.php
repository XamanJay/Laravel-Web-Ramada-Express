<?php

namespace App\Http\Controllers\API\Habitacion;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\PlanHab;
use App\Models\Hotel;

class PlanController extends ApiController
{
    public function index()
    {
        $planes = PlanHab::all();
        $count = count($planes);

        return $this->successResponse('Mostrando '.$count. ' planes de habitacion registrados',$planes,200);
    }

    public function show($id)
    {
        $plan = PlanHab::findOrFail($id);
        return $this->successResponse('Mostrando el Plan solicitado',$plan,200);
    }

    public function store(Request $request)
    {
        $rules = [
            'nombre_es' => 'required|string',
            'nombre_en' => 'required|string',
            'hotel_id' => 'required',
            'isDesayuno' => 'required'
        ];

        $messages = [
            'nombre_es.required' => 'Es necesario asignar un nombre para el nuevo plan',
            'nombre_en.required' => 'Es necesario asignar un nombre en ingles para el nuevo plan',
            'nombre_es.string' => 'Este campo solo acepta cadenas de texto',
            'nombre_en.string' => 'Este campo solo acepta cadenas de texto',
            'hotel_id.required' => 'Favor de seleccionar un hotel para el nuevo plan',
            'isDesayuno.required' => 'Es necesario indicar si este Plan de Habitacion contiene alimentos o no'
        ];

        $this->validate($request,$rules,$messages);

        $hotel = Hotel::findOrFail($request->hotel_id);

        $plan = new PlanHab();
        $plan->nombre_es = Str::ucfirst($request->nombre_es);
        $plan->nombre_en = Str::ucfirst($request->nombre_en);
        $plan->desc_es = ($request->filled('desc_es')) ? $request->desc_es : NULL;
        $plan->desc_en = ($request->filled('desc_en')) ? $request->desc_en : NULL;
        $plan->desayuno_adulto = ($request->filled('desayuno_adulto')) ? $request->desayuno_adulto : NULL;
        $plan->desayuno_infante = ($request->filled('desayuno_infante')) ? $request->desayuno_infante : NULL;
        $plan->tag_es = Str::of($request->nombre_es)->slug('-');
        $plan->tag_en = Str::of($request->nombre_en)->slug('-');
        $plan->isDesayuno = $request->isDesayuno;
        $plan->hotel_id = $hotel->id;
        $plan->save();

        return $this->successResponse('El plan se creo correctamente',$plan,201);
    }

    public function update(Request $request,$id)
    {
        $rules = [
            'nombre_es' => 'required|string',
            'nombre_en' => 'required|string',
            'hotel_id' => 'required',
            'isDesayuno' => 'required'
        ];

        $messages = [
            'nombre_es.required' => 'Es necesario asignar un nombre para el nuevo plan',
            'nombre_en.required' => 'Es necesario asignar un nombre en ingles para el nuevo plan',
            'nombre_es.string' => 'Este campo solo acepta cadenas de texto',
            'nombre_en.string' => 'Este campo solo acepta cadenas de texto',
            'hotel_id.required' => 'Favor de seleccionar un hotel para el nuevo plan',
            'isDesayuno.required' => 'Es necesario indicar si este Plan de Habitacion contiene alimentos o no'
        ];

        $this->validate($request,$rules,$messages);

        $hotel = Hotel::findOrFail($request->hotel_id);

        $plan = PlanHab::findOrFail($id);
        $plan->nombre_es = Str::ucfirst($request->nombre_es);
        $plan->nombre_en = Str::ucfirst($request->nombre_en);
        $plan->desc_es = ($request->filled('desc_es')) ? $request->desc_es : NULL;
        $plan->desc_en = ($request->filled('desc_en')) ? $request->desc_en : NULL;
        $plan->desayuno_adulto = ($request->filled('desayuno_adulto')) ? $request->desayuno_adulto : NULL;
        $plan->desayuno_infante = ($request->filled('desayuno_infante')) ? $request->desayuno_infante : NULL;
        $plan->tag_es = Str::of($request->nombre_es)->slug('-');
        $plan->tag_en = Str::of($request->nombre_en)->slug('-');
        $plan->isDesayuno = $request->isDesayuno;
        $plan->hotel_id = $hotel->id;
        $plan->save();

        return $this->successResponse('El Plan se actualizo correctamente',$plan,200);
    }

    public function destroy($id)
    {
        $plan = PlanHab::findOrFail($id);
        $plan->destroy();
        return $this->successResponse('El plan se elimino correctamente',NULL,200);
    }
}
