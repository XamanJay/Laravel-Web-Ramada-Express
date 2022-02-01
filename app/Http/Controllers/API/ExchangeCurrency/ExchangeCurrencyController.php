<?php

namespace App\Http\Controllers\API\ExchangeCurrency;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Models\Exchange;
use App\Models\Pais;

class ExchangeCurrencyController extends ApiController
{
    public function index()
    {
        $exchanges = Exchange::with('pais')->get();

        $divisas = array();

        foreach($exchanges as $exchange)
        {
            $monedas = json_decode($exchange->pais->monedas);
            $divisa = [
                'pais' => $exchange->pais->nombre,
                'moneda' => $monedas[0]->code,
                'valor_respecto_mxn' => $exchange->valor_x_moneda,
                'bandera' => $exchange->pais->bandera
            ];

            array_push($divisas,$divisa);
        }

        return $this->successResponse('Mostrando '.count($exchanges).' registros',$divisas,200); 
    }

    public function show($id)
    {
        $exchange = Exchange::with('pais')->findOrFail($id);
        return $this->successResponse('Mostrando el pais solicitado',$exchange,200);
    }

    public function store(Request $request)
    {
        $rules = [
            'valor_x_moneda' => 'required|numeric',
            'pais_id' => 'required'
        ];

        $messages = [
            'valor_x_moneda.required' => 'Es necesario agregar un valor',
            'valor_x_moneda' => 'Formato invalido, solo se aceptan numero enteros o decimales',
            'pais_id.required' => 'Es necesario agregar la moneda del pais al cual quiere evaluar'
        ];
        $this->validate($request,$rules,$messages);

        $pais = Pais::findOrFail($request->pais_id);
        $exchange_prev = Exchange::where('pais_id',$pais->id)->first();
        if($exchange_prev !=  NULL)
            return $this->errorResponse('Ya existe un registro con este moneda del pais que seleccionaste',406);

        
        $monedas = json_decode($pais->monedas);
        $exchange = new Exchange();
        $exchange->valor_x_moneda = $request->valor_x_moneda;
        $exchange->pais_id = $pais->id;
        $exchange->save();

        $divisa = [
            'pais' => $pais->nombre,
            'moneda' => $monedas[0]->code,
            'valor_respecto_mxn' => $exchange->valor_x_moneda,
            'bandera' => $pais->bandera
        ];

        return $this->successResponse('Se guardo correctamente el registro',$divisa,201);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'valor_x_moneda' => 'required|numeric',
            'pais_id' => 'required'
        ];

        $messages = [
            'valor_x_moneda.required' => 'Es necesario agregar un valor',
            'valor_x_moneda' => 'Formato invalido, solo se aceptan numero enteros o decimales',
            'pais_id.required' => 'Es necesario agregar la moneda del pais al cual quiere evaluar'
        ];
        $this->validate($request,$rules,$messages);

        $pais = Pais::findOrFail($pais_id);
        $exchange_prev = Exchange::where('pais_id',$pais->id)->where('id','<>', $id)->first();
        if(!$exchange_prev->isEmpty())
            return $this->errorResponse('Ya existe un registro con este moneda del pais que seleccionaste',406);

        $exchange = Exchange::findOrFail($id);
        $exchange->valor_x_moneda = $request->valor_x_moneda;
        $exchange->pais_id = $pais->id;
        $exchange->save();

        $divisa = [
            'pais' => $pais->nombre,
            'moneda' => $monedas[0]->code,
            'valor_respecto_mxn' => $exchange->valor_x_moneda,
            'bandera' => $pais->bandera
        ];

        return $this->successResponse('Se actualizó correctamente el registro',$divisa,201);
    }

    public function destroy($id)
    {
        $exchange = Exchange::findOrFail($id);
        $exchange->delete();
        return $this->successResponse('El registro se eiminó correctamente',203);
    }
}
