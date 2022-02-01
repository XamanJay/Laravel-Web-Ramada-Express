<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Hotel;

use function Psy\debug;

class HotelController extends ApiController
{
    public function index(string $locale = 'es')
    {
        $hoteles = Hotel::all();
        $message = ($locale == 'es') ?  'Mostrando '.count($hoteles).' hoteles disponibles' : 'Showing '.count($hoteles).' available hotels';
        
        foreach($hoteles as $hotel)
        {
            $hotel->path_fachada = fachadaURL($hotel->path_fachada);
            $hotel->galeria = galeriaURL($hotel->galeria);
        }
        
        return ($hoteles->isEmpty()) ? $this->successResponse($message,NULL,200) : $this->successResponse($message,$hoteles,200) ;  
    }


    public function show(string $locale = 'es',$id=1)
    {
        $hotel = Hotel::findOrFail($id);
        $message = ($locale == 'es') ? 'Mostrando el Hotel '.$hotel->nombre_es : 'Showing '.$hotel->nombre_en.' Hotel';
        $hotel->path_fachada = ($hotel->path_fachada != null)? fachadaURL($hotel->path_fachada): null;
        $hotel->galeria = ($hotel->galeria != null)? galeriaURL($hotel->galeria): null;

        return $this->successResponse($message,$hotel,200);
    }

    public function store(Request $request,$locale)
    {
        $rules = [
            'nombre_es' => 'required|string',
            'nombre_en' => 'required|string',
            'calle' => 'required|string',
            'no_ext' => 'required|numeric',
            'cp' => 'required|numeric',
        ];

        $messages = [
            'nombre_es.required' => 'Es necesario asignar un nombre al Hotel',
            'nombre_es.string' => 'Este campo solo acepta cadenas de texto',
            'nombre_en.required' => 'Es necesario asignar un nombre en ingles del Hotel',
            'nombre_en.string' =>  'Este campo solo acepta cadenas de texto',
            'calle.required' => 'Es necesario asignar la calle donde se ubica el Hotel',
            'calle.string' => 'Este campo solo acepta caracteres',
            'no_ext.required' => 'Es necesario asignar el numero ext. del Hotel',
            'no_ext.numeric' => 'Este campo solo acepta numeros',
            'cp.required' => 'Es necesario asignar el codigo postal del Hotel',
            'cp.numeric' => 'Este campo solo acepta numeros'
        ];

        $this->validate($request,$rules,$messages);

        $tag_es = Str::slug($request->nombre_es, '-');
        $tag_en = Str::slug($request->nombre_en, '-');

        $hotel = new Hotel();
        $hotel->nombre_es = Str::title(Str::lower($request->nombre_es));
        $hotel->nombre_en = Str::title(Str::lower($request->nombre_en));
        $hotel->desc_es = ($request->filled('desc_es')) ? Str::ucfirst($request->desc_es) : NULL;
        $hotel->desc_en = ($request->filled('desc_en')) ? Str::ucfirst($request->desc_en) : NULL;
        $path = ($request->filled('fachada')) ? $request->file('fachada')->storePublicly('images/hoteles/'.$tag_es.'/fachada','s3') : NULL;
        $hotel->path_fachada = $path;
        $galeria = array();

        if($request->galeria != null){
            foreach($request->galeria as $img){
                $path = $img->storePublicly('images/hoteles/'.$tag_es.'/galeria','s3');
                array_push($galeria,$path);
            }
        }
        $hotel->galeria = (count($galeria) > 0)? json_encode($galeria): null;
        $hotel->calle = $request->calle;
        $hotel->no_ext = $request->no_ext;
        $hotel->cp = $request->cp;
        $hotel->referencias = ($request->filled('referencias')) ? $request->referencias : NULL;
        $hotel->tag_es = $tag_es;
        $hotel->tag_en = $tag_en;
        $hotel->save();

        $hotel->path_fachada = ($hotel->path_fachada != null)? fachadaURL($hotel->path_fachada): NULL;
        $hotel->galeria = ($hotel->galeria != null)? galeriaURL($hotel->galeria): NULL;

        return $this->successResponse('El hotel se creo con exito',$hotel,201);
    }

    public function update(Request $request, $locale, $id)
    {
        $rules = [
            'nombre_es' => 'required|string',
            'nombre_en' => 'required|string',
            'calle' => 'required|string',
            'no_ext' => 'required|numeric',
            'cp' => 'required|numeric',
        ];

        $messages = [
            'nombre_es.required' => 'Es necesario asignar un nombre al Hotel',
            'nombre_es.string' => 'Este campo solo acepta cadenas de texto',
            'nombre_en.required' => 'Es necesario asignar un nombre en ingles del Hotel',
            'nombre_en.string' =>  'Este campo solo acepta cadenas de texto',
            'calle.required' => 'Es necesario asignar la calle donde se ubica el Hotel',
            'calle.string' => 'Este campo solo acepta caracteres',
            'no_ext.required' => 'Es necesario asignar el numero ext. del Hotel',
            'no_ext.numeric' => 'Este campo solo acepta numeros',
            'cp.required' => 'Es necesario asignar el codigo postal del Hotel',
            'cp.numeric' => 'Este campo solo acepta numeros'
        ];

        $this->validate($request,$rules,$messages);

        $tag_es = Str::slug($request->nombre_es, '-');
        $tag_en = Str::slug($request->nombre_en, '-');

        $hotel = Hotel::findOrFail($id);
        $hotel->nombre_es = Str::title(Str::lower($request->nombre_es));
        $hotel->nombre_en = Str::title(Str::lower($request->nombre_en));
        $hotel->desc_es = ($request->filled('desc_es')) ? Str::ucfirst($request->desc_es) : NULL;
        $hotel->desc_en = ($request->filled('desc_en')) ? Str::ucfirst($request->desc_en) : NULL;

        /* En caso de que se subiera una nueva imagen, borrar la img previa */
        $path_prev = $hotel->path_fachada;
        $path = ($request->has('fachada')) ? $request->file('fachada')->storePublicly('images/hoteles/'.$tag_es.'/fachada','s3') : NULL;
        $hotel->path_fachada = $path;
        if($hotel->isDirty('path_fachada'))
            ($path_prev != null)? Storage::disk('s3')->delete($path_prev): null;

        /* En caso de que las imagenes de galeria se actualizen */
        $galeria_prev = ($hotel->galeria != NULL) ? $hotel->galeria : NULL;
        $galeria = array();
        foreach($request->galeria as $img){
            $path = $img->storePublicly('images/hoteles/'.$tag_es.'/galeria','s3');
            array_push($galeria,$path);
        }
        $hotel->galeria = json_encode($galeria);
        if($hotel->isDirty('galeria') && $hotel->galeria != NULL)
        {   
            if($galeria_prev != null)
            {
                foreach(json_decode($galeria_prev) as $img_prev)
                {   
                    Storage::disk('s3')->delete($img_prev);
                }
            }
        }


        $hotel->calle = $request->calle;
        $hotel->no_ext = $request->no_ext;
        $hotel->cp = $request->cp;
        $hotel->referencias = ($request->filled('referencias')) ? $request->referencias : NULL;
        $hotel->tag_es = $tag_es;
        $hotel->tag_en = $tag_en;
        if($hotel->isDirty())
            $hotel->save();

        $hotel->path_fachada = fachadaURL($hotel->path_fachada);
        $hotel->galeria = galeriaURL($hotel->galeria);

        return $this->successResponse('El hotel se actualizo con exito',$hotel,201);
    }

    public function destroy($locale, $id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();

        return $this->successResponse('El hotel se eliminó correctamente',NULL,200);
    }

}

function fachadaURL($fachada,$galeria = NULL)
{
    if($fachada == null)
        return null;

    return Storage::disk('s3')->url($fachada);  
}

function galeriaURL($galeria)
{
    if($galeria == null)
        return null;

    $galeria_urls = array();
    foreach(json_decode($galeria) as $img)
    {
        $path = Storage::disk('s3')->url($img);
        array_push($galeria_urls,$path);
    }

    return json_encode($galeria_urls);
}
