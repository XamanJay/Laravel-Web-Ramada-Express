<?php

namespace App\Http\Controllers\API\Pais;

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Pais;

class PaisController extends ApiController
{
    public function index()
    {
        $paises = Pais::paginate(10);
        return $this->successResponse('Mostrando '.count($paises).' paises',$paises,200);
    }

    public function delete($locale, $id)
    {
        $pais = Pais::findOrFail($id);
        $pais->delete();

        return $this->successResponse('El pais se eliminó correctamente',NULL,200);
    }


    public function sync()
    {
        $data = Http::get('http://restcountries.eu/rest/v2/all');

        $response = $data->json();
        $count = 0;
        $pointer = 0;

        foreach($response as $row){
            
            $check = Pais::where('nombre',$row['name'])->get();
            
            if($check->isEmpty())
            {
                $pais = new Pais();
                $pais->nombre = $row['name'];
                $pais->alpha_code = $row['alpha2Code'];
                $pais->alpha_code_2 = $row['alpha3Code'];
                $pais->callingCodes = json_encode($row['callingCodes']);
                $pais->capital = $row['capital'];
                $pais->region = $row['region'];
                if($row['latlng'] != NULL)
                    $pais->latlng = json_encode($row['latlng']);
                $pais->monedas = json_encode($row['currencies']);
                $pais->bandera = $row['flag'];
                $pais->save();
                $pointer++;
            }else{
                $pais = Pais::where('nombre',$row['name'])->first();
                $pais->nombre = $row['name'];
                $pais->alpha_code = $row['alpha2Code'];
                $pais->alpha_code_2 = $row['alpha3Code'];
                $pais->callingCodes = json_encode($row['callingCodes']);
                $pais->capital = $row['capital'];
                $pais->region = $row['region'];
                if($row['latlng'] != NULL)
                    $pais->latlng = json_encode($row['latlng']);
                $pais->monedas = json_encode($row['currencies']);
                $pais->bandera = $row['flag'];
                $pais->save();
                if($pais->isDirty())
                    $count++;
            }
        }
        return $this->successResponse('Se agregaron '.$pointer.' y se actualizaron '.$count.' paises a la BD',null,200);
    }
}
