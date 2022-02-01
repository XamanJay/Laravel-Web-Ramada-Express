<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
    use HasFactory;
    protected $table = 'tipo_x_cambio_x_moneda';

    public function pais()
    {
        return $this->belongsTo(Pais::class,'pais_id');
    }
}
