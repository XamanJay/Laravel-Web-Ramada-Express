<?php

namespace App\Http\Controllers\API\ClubEstrella;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Models\DiscountClub;

class DiscountClubEstrellaController extends ApiController
{
    public function index()
    {
        $discount = DiscountClub::all();
        return $this->successResponse('Mostrando el descuento',$discount,200);
    }

    public function store(Request $request)
    {
        $rules = [
            'descuento' => 'required|numeric'
        ];

        $messages = [
            'descuento.required' => 'Es necesario agregar el porcentaje de descuento',
            'descuento.numeric' => 'Formato invalido, solo se aceptan numeros'
        ];

        $this->validate($request,$rules,$messages);

        $prev_discount = DiscountClub::all();
        if(!$prev_discount->isEmpty())
            return $this->errorResponse('No puede existir mas de un registro para el descuento de Club Estrella',406);

        $discount = new DiscountClub();
        $discount->descuento = $request->descuento;
        $discount->save();
        return $this->successResponse('Se creo el descuento de ClubEstrella',$discount,201);

    }

    public function update(Request $request, $id)
    {
        $rules = [
            'descuento' => 'required|numeric'
        ];

        $messages = [
            'descuento.required' => 'Es necesario agregar el porcentaje de descuento',
            'descuento.numeric' => 'Formato invalido, solo se aceptan numeros'
        ];

        $this->validate($request,$rules,$messages);

        $discount = DiscountClub::findOrFail($id);
        $discount->descuento = $request->descuento;
        if($discount->isDirty())
            $discount->save();

        return $this->successResponse('El registro se actualizó correctamente',$discount,202);
    }

    public function destroy($id)
    {
        $discount = DiscountClub::findOrFail($id);
        $discount->delete();
        return $this->successResponse('El registro se eliminó correctamente',NULL,202);
    }
}
