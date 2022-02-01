<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaypalSecrets extends Model
{
    use HasFactory;

    protected $table = 'paypal_secrets';
}
