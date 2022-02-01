<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $table = 'reservaciones';

    protected $fillable = [
        'pago_x_destino',
        'checkIn',
        'checkOut',
        'plataforma',
        'noches',
        'habitaciones',
        'adultos',
        'infantes',
        'precio',
        'currency',
        'estatus',
        'comentarios',
        'huesped_id',
        'paypal_pago_id',
        'santander_pago_id',
        'habitacion_id',
        'user_id',
        'transfer_id',
        'folio',
        'metodo_pago'
    ];
}
