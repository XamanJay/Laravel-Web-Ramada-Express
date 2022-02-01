<?php

namespace App\Http\Controllers\API\Temporadas;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

use App\Models\Temporadas;
use App\Models\Hotel;

class TemporadasController extends ApiController
{
    public function index(string $locale = 'es')
    {
        $temporadas = Temporadas::all();
        $message = ($locale == 'es') ?  'Mostrando ' . count($temporadas) . ' temporadas disponibles' : 'Showing ' . count($temporadas) . ' available seasons';
        return ($temporadas->isEmpty()) ? $this->successResponse($message, NULL, 200) : $this->successResponse($message, $temporadas, 200);
    }


    public function show($locale, $id)
    {
        $message = ($locale == 'es') ?  'Temporada encontrado': 'Season found';
        $temporada = Temporadas::findOrFail($id);
        return $this->successResponse($message,$temporada,200);
    }

    public function store(Request $request, string $locale = 'es')
    {
        $rules = [
            'startDate' => 'required|date',
            'endDate' => 'required|date',
            'tarifa_x_dolares' => 'required|numeric',
            'tarifa_x_pax' => 'required|numeric',
            'hotel_id' => 'required|integer',
        ];

        $messages = [
            'startDate.required' => 'Es necesario indicar la fecha de inicio',
            'startDate.date' => 'Formato invalido para startDate',
            'endDate.required' => 'Es necesario indicar la fecha final',
            'endDate.date' => 'Formato invalido para endDate',
            'tarifa_x_dolares.required' => 'Es necesario indicar la fecha final',
            'tarifa_x_dolares.numeric' => 'Formato invalido para tarifa_x_dolares',
            'tarifa_x_pax.required' => 'Es necesario indicar la tarifa por persona',
            'tarifa_x_pax.numeric' => 'Formato invalido para tarifa_x_pax',
            'hotel_id.required' => 'Es necesario indicar a que hotel va dedicado',
            'hotel_id.integer' => 'Formato invalido para hotel_id'
        ];

        $this->validate($request, $rules, $messages);

        $hotel = Hotel::findOrFail($request->hotel_id);

        $temporada = new Temporadas();
        $temporada->startDate = Carbon::parse($request->startDate);
        $temporada->endDate = Carbon::parse($request->endDate);
        $temporada->tarifa_x_dolares = $request->tarifa_x_dolares;
        $temporada->tarifa_x_pax = $request->tarifa_x_pax;
        $temporada->hotel_id = $hotel->id;
        $temporada->save();

        $message = ($locale == 'es') ?  'La temporada ha sido creada coreectamente': 'Season created successfully';
        return $this->successResponse($message,$temporada,200);
    }

    public function update(Request $request, $locale, $id)
    {
        $rules = [
            
        ];

        $messages = [
            
        ];

        $this->validate($request, $rules, $messages);

        $hotel = Hotel::findOrFail($request->hotel_id);

        $temporada = Temporadas::findOrFail($id);
        $temporada->startDate = ($request->filled('checkOut')) ? Carbon::parse($request->startDate) : $temporada->startDate;
        $temporada->endDate = ($request->filled('checkOut')) ? Carbon::parse($request->endDate) : $temporada->endDate;
        $temporada->tarifa_x_dolares = ($request->filled('checkOut')) ? $request->tarifa_x_dolares : $temporada->tarifa_x_dolares;
        $temporada->tarifa_x_pax = ($request->filled('checkOut')) ? $request->tarifa_x_pax : $temporada->tarifa_x_pax;
        $temporada->hotel_id = ($request->filled('checkOut')) ? $hotel->id : $temporada->hotel_id;
        $temporada->save();

        $message = ($locale == 'es') ?  'La temporada ha sido modificado correctamente': 'The season has been successfully modified';
        return $this->successResponse($message,$temporada,200);
    }

    public function destroy($locale, $id)
    {
        $temporada = Temporadas::findOrFail($id);
        $message = ($locale == 'es') ?  'La temporada se eliminó correctamente' : 'Season was successfully removed';
        $temporada->delete();

        return ($temporada) ? $this->successResponse($message, NULL, 200) : $this->successResponse($message, $temporada, 200);
    }
}
