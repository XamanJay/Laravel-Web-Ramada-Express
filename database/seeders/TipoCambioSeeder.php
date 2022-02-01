<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TipoCambioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #240 Pertenece a Estados Unidos
        DB::table('tipo_x_cambio_x_moneda')->insert([
            'valor_x_moneda' => 20,
            'pais_id' => 240,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
