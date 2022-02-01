<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    use HasFactory;
    protected $table = 'habitaciones';

    public function categoria()
    {
        return $this->belongsTo(CategoriaHab::class,'categoria_habitacion_id');
    }

    public function plan()
    {
        return $this->belongsTo(PlanHab::class,'plan_habitacion_id');
    }
}
