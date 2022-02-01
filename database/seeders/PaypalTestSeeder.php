<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class PaypalTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('paypal_secrets')->insert([
            'client_id' =>  Crypt::encryptString('AaWfgK41Zazbu6gPYFrOPj3QYX-Jydo-xvJDk8-05Ik1H9us00H_AzFBI7KxmCDeKqW2ji177sQiWdzn'),
            'client_secret' =>  Crypt::encryptString('EP_MuhpYZClaPPobZt18qYskEGfvW_41wpuQZL1tufhie4Ia-lt8-bl0Xk-rarVYSN8kJtI0bS3bw_K_'),
            'ambiente' => 'test', // test - prod
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
