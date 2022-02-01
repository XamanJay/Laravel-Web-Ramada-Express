<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory, softDeletes;
    protected $table = 'hoteles';

    protected $hidden = [
        'created_at',
        'deleted_at'
    ];
}
