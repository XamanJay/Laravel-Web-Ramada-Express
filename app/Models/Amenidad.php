<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenidad extends Model
{
    use HasFactory;
    protected $table = 'amenidades_x_hotel';
}
