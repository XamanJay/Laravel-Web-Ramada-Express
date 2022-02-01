<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class HuespedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #Uusario Dummy por si surge algun problema
        DB::table('huespedes')->insert([
            'nombre' => 'Prueba',
            'apellidos' => 'Test',
            'email' => 'programacionweb@gphoteles.com',
            'telefono' => '9983208924',
            'isWhatsApp' => FALSE,
            'isClub' => FALSE,
            'ciudad' => 'Cancun',
            'pais_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
