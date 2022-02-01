<?php

namespace App\Http\Controllers\API\Habitacion;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\CategoriaHab;
use App\Models\Hotel;


class CategoriaController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($hotel_id)
    {
        $categorias = CategoriaHab::where('hotel_id',$hotel_id)->get();
        return $this->successResponse('Mostrando '.count($categorias).' categorias del hotel',$categorias,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$hotel_id)
    {
        $rules = [
            'nombre_es' => 'required',
            'nombre_en' => 'required',
            'plus_tarifa_base' => 'required|numeric',
            'plus_x_pax' => 'required|numeric',
        ];

        $messages = [
            'nombre_es.required' => 'Es necesario asignar un nombre',
            'nombre_en.required' => 'Es necesario poner un nombre en ingles',
            'plus_tarifa_base.required' => 'Por favor asigna la tarifa plus sobre la tarifa base',
            'plus_tarifa_base.numeric' => 'Solo se aceptan numeros',
            'plus_x_pax.required' => 'Por favor asigna una tarifa por pax extra sobre la base',
            'plus_x_pax.numeric' => 'Solo se aceptan numeros'
        ];

        $this->validate($request,$rules,$messages);

        $hotel = Hotel::findOrFail($hotel_id);

        $categoria = new CategoriaHab();
        $categoria->nombre_es = Str::ucfirst($request->nombre_es);
        $categoria->nombre_en = Str::ucfirst($request->nombre_en);
        $categoria->desc_es = ($request->filled('desc_es')) ? $request->desc_es : NULL;
        $categoria->desc_en = ($request->filled('desc_en')) ? $request->desc_en : NULL;
        $categoria->plus_tarifa_base = $request->plus_tarifa_base;
        $categoria->plus_x_pax = $request->plus_x_pax;
        $categoria->tag_es = Str::of($request->nombre_es)->slug('-');
        $categoria->tag_en = Str::of($request->nombre_en)->slug('-');
        $categoria->hotel_id = $hotel->id;
        $categoria->save();

        return $this->successResponse('La categoria se agrego correctamente',$categoria,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($hotel_id,$id)
    {
        $hotel = Hotel::findOrFail($hotel_id);
        $categoria = CategoriaHab::where('hotel_id',$hotel_id)->where('id',$id)->get();
        if($categoria->isEmpty())
            return $this->errorResponse('No existe esta categoria registrada en el hotel '.$hotel->nombre_es,404);

        return $this->successResponse('Mostrando la categoria solicitada',$categoria,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $hotel_id,$id)
    {
        $rules = [
            'nombres_es' => 'required',
            'nombre_en' => 'required',
            'plus_tarifa_base' => 'required|numeric',
            'plus_x_pax' => 'required|numeric',
        ];

        $messages = [
            'nombre_es.required' => 'Es necesario asignar un nombre',
            'nombre_en.required' => 'Es necesario poner un nombre en ingles',
            'plus_tarifa_base.required' => 'Por favor asigna la tarifa plus sobre la tarifa base',
            'plus_tarifa_base.numeric' => 'Solo se aceptan numeros',
            'plus_x_pax.required' => 'Por favor asigna una tarifa por pax extra sobre la base',
            'plus_x_pax.numeric' => 'Solo se aceptan numeros'
        ];

        $this->validate($request,$rules,$messages);

        $hotel = Hotel::findOrFail($hotel_id);

        $categoria = CategoriaHab::where('hotel_id',$hotel_id)->where('id',$id)->get();
        $categoria->nombre_es = Str::ucfirst($request->nombre_es);
        $categoria->nombre_en = Str::ucfirst($request->nombre_en);
        $categoria->desc_es = ($request->filled('desc_es')) ? $request->desc_es : NULL;
        $categoria->desc_en = ($request->filled('desc_en')) ? $request->desc_en : NULL;
        $categoria->plus_tarifa_base = $request->plus_tarifa_base;
        $categoria->plus_x_pax = $request->plus_x_pax;
        $categoria->tag_es = Str::of($request->nombre_es)->slug('-');
        $categoria->tag_en = Str::of($request->nombre_en)->slug('-');
        $categoria->hotel_id = $hotel->id;
        $categoria->save();

        return $this->successResponse('La categoria se actualizo correctamente',$categoria,201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
