<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurlError extends Model
{
    use HasFactory;

    protected $table = 'santander_curl_errors';
}
