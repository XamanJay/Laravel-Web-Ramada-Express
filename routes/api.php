<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\ClubEstrella\DiscountClubEstrellaController;
use App\Http\Controllers\API\ExchangeCurrency\ExchangeCurrencyController;
use App\Http\Controllers\API\Habitacion\HabitacionController;
use App\Http\Controllers\API\Temporadas\TemporadasController;
use App\Http\Controllers\API\Habitacion\CategoriaController;
use App\Http\Controllers\API\Amenidades\AmenidadController;
use App\Http\Controllers\API\Santander\SantanderController;
use App\Http\Controllers\API\Reserva\CotizacionController;
use App\Http\Controllers\API\Amenidades\AmeHabController;
use App\Http\Controllers\API\Reserva\ReservaController;
use App\Http\Controllers\API\Reserva\BookingController;
use App\Http\Controllers\API\Habitacion\PlanController;
use App\Http\Controllers\API\Paypal\PaypalController;
use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Pais\PaisController;
use App\Http\Controllers\API\HotelController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login',[LoginController::class,'login']);

#Hoteles
Route::get('/{locale}/hoteles',[HotelController::class,'index']);
Route::get('/{locale}/hotel/{id}',[HotelController::class,'show']);
Route::post('/{locale}/hotel',[HotelController::class,'store']);
Route::post('/{locale}/hotel/{id}',[HotelController::class,'update']);
Route::delete('/{locale}/hotel/{id}',[HotelController::class,'destroy']);

#Paises
Route::get('sync-paises',[PaisController::class,'sync']);
Route::get('paises',[PaisController::class,'index']);

#Descuento ClubEstrella
Route::get('/discount-clubestrella',[DiscountClubEstrellaController::class,'index']);
Route::post('/discount-clubestrella',[DiscountClubEstrellaController::class,'store']);
Route::post('/discount-clubestrella/{id}',[DiscountClubEstrellaController::class,'update']);
Route::delete('/discount-clubestrella/{id}',[DiscountClubEstrellaController::class,'destroy']);

#Divisas
Route::get('/divisas',[ExchangeCurrencyController::class,'index']);
Route::post('/exchange-currency',[ExchangeCurrencyController::class,'store']);
Route::post('/exchange-currency/{id}',[ExchangeCurrencyController::class,'update']);
Route::get('/exchange-currency/{id}',[ExchangeCurrencyController::class,'show']);
Route::delete('/exchange-currency/{id}',[ExchangeCurrencyController::class,'destroy']);

#Amenidades Hotel
Route::get('hotel-amenidades/{id}',[AmenidadController::class,'index']);
Route::get('hotel-amenidad/{hotel_id}/{id}',[AmenidadController::class,'show']);
Route::post('hotel-amenidad/{id}',[AmenidadController::class,'store']);
Route::post('hotel-amenidad/{hotel_id}/{id}',[AmenidadController::class,'update']);
Route::delete('hotel-amenidad/{hotel_id}/{id}',[AmenidadController::class,'destroy']);

#Amenidades Habitacion
Route::get('/{locale}/habitacion-amenidades/{hotel_id}',[HabitacionController::class,'index']);
Route::get('habitacion-amenidad/{hotel_id}/{id}',[HabitacionController::class,'show']);
Route::post('habitacion-amenidad/{hotel_id}',[HabitacionController::class,'store']);
Route::post('habitacion-amenidad/{hotel_id}/{id}',[HabitacionController::class,'update']);
Route::delete('habitacion-amenidad/{hotel_id}/{id}',[HabitacionController::class,'destroy']);

#Categorias Habitacion
Route::get('category-room/{hotel_id}',[CategoriaController::class,'index']);
Route::get('category-room/{hotel_id}/{id}',[CategoriaController::class,'show']);
Route::post('category-room/{hotel_id}',[CategoriaController::class,'store']);
Route::post('category-room/{hotel_id}/{id}',[CategoriaController::class,'update']);
Route::delete('category-room/{hotel_id}/{id}',[CategoriaController::class,'destroy']);

#Planes Habitacion
Route::get('plans-rooms',[PlanController::class,'index']);
Route::post('plan-room',[PlanController::class,'store']);
Route::get('plan-room/{id}',[PlanController::class,'show']);
Route::post('plan-room/{id}',[PlanController::class,'update']);
Route::delete('plan-room/{id}',[PlanController::class,'destroy']);

#Habitaciones
Route::get('habitaciones',[HabitacionController::class,'index']);
Route::post('habitacion',[HabitacionController::class,'store']);
Route::get('habitacion/{id}',[HabitacionController::class,'show']);
Route::post('habitacion/{id}',[HabitacionController::class,'update']);
Route::delete('habitacion/{id}',[HabitacionController::class,'destroy']);

#Reservas -- HOME OFFICE
Route::get('/reservas',[ReservaController::class,'index']);
Route::post('/{locale}/reserva',[ReservaController::class,'store']);

Route::delete('/reserva/{id}',[ReservaController::class,'destroy']);
Route::post('/reserva/{id}',[ReservaController::class,'update']);
Route::get('/reserva/{id}',[ReservaController::class,'show']);

#Reservas -- FRONTEND
Route::post('/{locale}/reserva-habitacion',[BookingController::class,'store']);

#Temporadas - cotizacion - FRONTEND
Route::post('{locale}/temporada-habitacion',[CotizacionController::class,'checkSeason']);
Route::post('{locale}/select-habitacion/{id}',[CotizacionController::class,'checkRoom']);



#Temporadas
Route::get('/{locale}/temporadas',[TemporadasController::class,'index']);
Route::post('/{locale}/temporada',[TemporadasController::class,'store']);
Route::delete('/{locale}/temporada/{id}',[TemporadasController::class,'destroy']);
Route::post('/{locale}/temporada/{id}',[TemporadasController::class,'update']);
Route::get('/{locale}/temporada/{id}',[TemporadasController::class,'show']);


#Santander
Route::post('/santander',[SantanderController::class,'index'])->name('santander');


#Paypal
Route::post('/paypal/{locale}',[PaypalController::class,'payment']);
Route::get('/paypal/status/{locale}',[PaypalController::class,'status'])->name('status.payment');


#Test
Route::post('/test',[ReservaController::class,'test']);
