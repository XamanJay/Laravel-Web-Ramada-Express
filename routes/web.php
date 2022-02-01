<?php

use Illuminate\Support\Facades\Route;

#RUTAS USUARIO FINAL
use App\Http\Controllers\WEB\RoomsController;
use App\Http\Controllers\WEB\ExpressController;
use App\Http\Controllers\WEB\Home\HomeController;
use App\Http\Controllers\WEB\Paypal\PaypalController;
use App\Http\Controllers\WEB\Reservas\ReservasController;
use App\Http\Controllers\WEB\AccommodationsController;

#RUTAS PANEL ADMINISTRATIVO
use App\Http\Controllers\Dashboard\DashboardController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/es');

Route::prefix('{locale}')->group(function () 
{
    Route::get('/',[HomeController::class,'index'])->name('inicio');
    Route::get('/rooms',[HomeController::class,'rooms'])->name('rooms');
    Route::get('/contact',[HomeController::class,'contact'])->name('contact');
    Route::get('/covid',[HomeController::class,'covid'])->name('covid');
    Route::post('/booking',[ReservasController::class,'index'])->name('booking');
    Route::get('/accommodations',[AccommodationsController::class,'accommodations'])->name('accommodations');


    # Dashboard ROUTES

    Auth::routes();
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('home');
    

    Route::post('/reservations',[ReservasController::class,'reservations'])->name('reservations');
    Route::post('/ultimate',[ReservasController::class,'store'])->name('ultimate');
    Route::post('/contact_mail',[ReservasController::class,'contact_mail'])->name('contact_mail');

    Route::get('reserva-response/{id}',[ReservasController::class,'response'])->name('response.reserva');


    

});



Route::post('reserva',[ReservasController::class,'store'])->name('store.reserva');

Route::post('paypal/payment',[PaypalController::class,'payment'])->name('paypal.payment');
Route::get('paypal/status',[PaypalController::class,'status'])->name('paypal.status');
Route::get('paypal/cancel',[PaypalController::class,'error'])->name('paypal.cancel');








