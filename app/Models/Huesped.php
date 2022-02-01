<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Huesped extends Model
{
    use HasFactory;

    protected $table = 'huespedes';

    protected $fillable = [
        'nombre',
        'apellidos',
        'email',
        'telefono',
        'isWhatsApp',
        'isClub',
        'ciudad',
        'club_email',
        'pais_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
