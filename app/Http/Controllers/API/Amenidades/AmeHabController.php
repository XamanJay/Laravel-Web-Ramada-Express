<?php

namespace App\Http\Controllers\API\Amenidades;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\AmenidadHab;
use App\Models\Hotel;

class AmeHabController extends ApiController
{
    public function index($locale,$hotel_id)
    {
        $amenidades = AmenidadHab::all();
        $message = 'Mostrando '.count($amenidades).' amenidad(es)';
        $lista = locateParse($locale,$amenidades);
        return $this->successResponse($message,$lista,200);
    }

    public function show($hotel_id,$id)
    {
        $hotel = Hotel::findOrFail($hotel_id);
        $amenidad = AmemidadHab::where('hotel_id',$hotel_id)->where('id',$id)->get();

        return $this->successResponse('Mostrando la amenidad solicitada',$amenidad,200);
    }

    public function store(Request $request,$hotel_id)
    {
        $rules = [
            'nombre_es' => 'required',
            'nombre_en' => 'required',
        ];

        $messages = [
            'nombre_es.required' => 'Es necesario asiganr un nombre',
            'nombre_en.required' => 'Es necesario asignar un nombre en ingles'
        ];

        $this->validate($request,$rules,$messages);

        $hotel = Hotel::findOrFail($hotel_id);

        $amenidad = new AmenidadHab();
        $amenidad->nombre_es = $request->nombre_es;
        $amenidad->nombre_en = $request->nombre_en;
        $amenidad->desc_es = ($request->has('desc_es')) ? $request->desc_es : NULL;
        $amenidad->desc_en = ($request->has('desc_en')) ? $request->desc_en : NULL;
        $amenidad->icon = ($request->has('icon')) ? $request->icon : NULL;
        $amenidad->url_icon = ($request->has('url_icon')) ? $request->url_icon : NULL;
        $amenidad->hotel_id = $hotel->id;
        $amenidad->tag_es = Str::slug($request->nombre_es, '-');
        $amenidad->tag_en = Str::slug($request->nombre_en, '-');
        $amenidad->save();

        return $this->successResponse('La amenidad se creó exitosamente',$amenidad,200);

    }

    public function update(Request $request,$hotel_id,$id)
    {
        $rules = [
            'nombre_es' => 'required',
            'nombre_en' => 'required',
        ];

        $messages = [
            'nombre_es.required' => 'Es necesario asiganr un nombre',
            'nombre_en.required' => 'Es necesario asignar un nombre en ingles'
        ];

        $this->validate($request,$rules,$messages);

        $hotel = Hotel::findOrFail($hotel_id);

        $amenidad = AmenidadHab::findOrFail($id);
        $amenidad->nombre_es = $request->nombre_es;
        $amenidad->nombre_en = $request->nombre_en;
        $amenidad->desc_es = $request->desc_es;
        $amenidad->desc_en = $request->desc_en;
        $amenidad->icon = $request->icon;
        $amenidad->url_icon = $request->url_icon;
        $amenidad->hotel_id = $hotel->id;
        $amenidad->tag_es = Str::slug($request->nombre_es, '-');
        $amenidad->tag_en = Str::slug($request->nombre_en, '-');
        $amenidad->save();

        return $this->successResponse('La amenidad se creó exitosamente',$amenidad,200);
    }

    public function destroy($hotel_id,$id)
    {
        $hotel = Hotel::findOrFail();

        $amenidad = AmenidadHab::where('hotel_id',$hotel->id)->where('id',$id)->get();
        dd($amenidad);

        return $this->successResponse('La amenidad se elimino correctamente',NULL,200);
    }
}

function locateParse($lang,$amenidades)
{
    $list_amenidades = array();
    if($lang == 'es')
    {
        foreach($amenidades as $item)
        {
            $amenidad = [
                'nombre' => $item->nombre_es,
                'descripcion' => $item->desc_es,
                'icon' => $item->icon,
                'url_icon' => $item->url_icon,
                'tag' => $item->tag_es
            ];

            array_push($list_amenidades,$amenidad);
        }
    }else{
        foreach($amenidades as $item)
        {
            $amenidad = [
                'nombre' => $item->nombre_en,
                'descripcion' => $item->desc_en,
                'icon' => $item->icon,
                'url_icon' => $item->url_icon,
                'tag' => $item->tag_en
            ];

            array_push($list_amenidades,$amenidad);
        }
    }

    return $list_amenidades;
}
