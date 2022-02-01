<?php

namespace App\Http\Controllers\API\Amenidades;

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Amenidad;
use App\Models\Hotel;

class AmenidadController extends ApiController
{
    public function index($id)
    {
        $hotel = Hotel::findOrFail($id);
        $amenidades = Amenidad::where('hotel_id',$hotel->id)->get();

        foreach($amenidades as $amenidad)
        {
            $amenidad->galeria = galeriaURL($amenidad->galeria);
        }

        return $this->successResponse('Mostrando '.count($amenidades).' amenidad(es)',$amenidades,200);
    }

    public function show($hotel_id,$id)
    {
        $hotel = Hotel::findOrFail($id);
        $amenidad = Amenidad::findOrFail($id);
        $amenidad->galeria = galeriaURL($hotel->galeria);
        return $this->successResponse('Se encontró la amenidad solicitada',$amenidad,200);
    }

    public function store(Request $request, $id)
    {
        $rules = [
            'nombre_es' => 'required',
            'nombre_en' => 'required',
            'apertura' => 'required',
            'cierre' => 'required',
            'dias_laborales' => 'required'
        ];

        $messages = [
            'nombre_es.required' => 'Es necesario agregar el nombre en español',
            'nombre_en.required' => 'Es necesario agregar el nombre en ingles',
            'apertura.required' => 'Especificar el horario de apertura',
            'cierre.requried' => 'Especificar el horario de cierre',
            'dias_laborales.requried' => 'Especifique los dias que esta disponible esta amenidad'

        ];

        $this->validate($request,$rules,$messages);

        $hotel = Hotel::findOrFail($id);
        $tag_es = Str::slug($request->nombre_es,'-');
        $tag_en = Str::slug($request->nombre_en,'-');

        $amenidad = new Amenidad();
        $amenidad->nombre_es = $request->nombre_es;
        $amenidad->nombre_en = $request->nombre_en;
        $amenidad->desc_es = ($request->filled('desc_es')) ? $request->desc_es : NULL;
        $amenidad->desc_en = ($request->filled('desc_en')) ? $request->desc_en : NULL;
        $amenidad->apertura = $request->apertura;
        $amenidad->cierre = $request->cierre;
        $amenidad->dias_laborales = $request->dias_laborales;
        /* Store de las imagenes en el bucket s3 */
        $galeria = array();
        if($request->has('galeria'))
        {
            foreach($request->galeria as $img){
                $path = $img->storePublicly('images/hoteles/'.$hotel->tag_es.'/amenidades/'.$tag_es.'/galeria','s3');
                array_push($galeria,$path);
            }
        }
        $amenidad->galeria = (empty($galeria)) ? NULL : json_encode($galeria);
        $amenidad->tag_es = $tag_es;
        $amenidad->tag_en = $tag_en;
        $amenidad->hotel_id = $hotel->id;
        $amenidad->save();

        $amenidad->galeria = galeriaURL($hotel->galeria);

        return $this->successResponse('La amenidad se registro corretamente',$amenidad,200);


    }

    public function update(Request $request,$hotel_id,$id)
    {
        $rules = [
            'nombre_es' => 'required',
            'nombre_en' => 'required',
            'apertura' => 'required',
            'cierre' => 'required',
            'dias_laborales' => 'required'
        ];

        $messages = [
            'nombre_es.required' => 'Es necesario agregar el nombre en español',
            'nombre_en.required' => 'Es necesario agregar el nombre en ingles',
            'apertura.required' => 'Especificar el horario de apertura',
            'cierre.requried' => 'Especificar el horario de cierre',
            'dias_laborales.requried' => 'Especifique los dias que esta disponible esta amenidad'

        ];

        $this->validate($request,$rules,$messages);

        $hotel = Hotel::findOrFail($hotel_id);
        $tag_es = Str::slug($request->nombre_es,'-');
        $tag_en = Str::slug($request->nombre_en,'-');

        $amenidad = Amenidad::findOrFail($id);
        $amenidad->nombre_es = $request->nombre_es;
        $amenidad->nombre_en = $request->nombre_en;
        $amenidad->desc_es = ($request->filled('desc_es')) ? $request->desc_es : NULL;
        $amenidad->desc_en = ($request->filled('desc_en')) ? $request->desc_en : NULL;
        $amenidad->apertura = $request->apertura;
        $amenidad->cierre = $request->cierre;
        $amenidad->dias_laborales = $request->dias_laborales;
        /* Store de las imagenes en el bucket s3 */
        $prev_galeria = json_decode($amenidad->galeria);
        foreach($prev_galeria as $img)
        {
            Storage::disk('s3')->delete($img);
        }
        $galeria = array();
        if($request->has('galeria'))
        {
            foreach($request->galeria as $img){
                $path = $img->storePublicly('images/hoteles/'.$hotel->tag_es.'/amenidades/'.$tag_es.'/galeria','s3');
                array_push($galeria,$path);
            }
        }
        $amenidad->galeria = (empty($galeria)) ? NULL : json_encode($galeria);
        $amenidad->tag_es = $tag_es;
        $amenidad->tag_en = $tag_en;
        $amenidad->hotel_id = $hotel->id;
        $amenidad->save();

        $amenidad->galeria = galeriaURL($hotel->galeria);

        return $this->successResponse('La amenidad se actualizó corretamente',$amenidad,201);
    }

    public function destroy($hotel_id,$id)
    {
        $hotel = Hotel::findOrFail($id);
        $amenidad = Amenidad::findOrFail($id);
        $galeria = json_decode($amenidad->galeria);
        foreach($galeria as $img)
        {
            Storage::disk('s3')->delete($img);
        }
        $amenidad->delete();
        return $this->successResponse('La amenidad se elimino correctamente',NULL,200);
    }
}

function galeriaURL($galeria)
{
    $galeria_urls = array();
    foreach(json_decode($galeria) as $img)
    {
        $path = Storage::disk('s3')->url($img);
        array_push($galeria_urls,$path);
    }

    return json_encode($galeria_urls);
}