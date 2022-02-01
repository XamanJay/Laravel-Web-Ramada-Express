<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;

class GruposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grupos')->insert([
            'nombre_convenio' => 'Grupo Bimbo',
            'empresa' => 'Bimbo SA de CV',
            'codigo_reserva' => 'BIMBOGPH',
            'habitaciones_disponibles' => 20,
            'window_open' => Carbon::parse('2021-08-12'),
            'window_close' => Carbon::parse('2021-08-17'),
            'startDate' => Carbon::parse('2021-08-20'),
            'endDate' => Carbon::parse('2021-08-30'),
            'tarifa' => 60.0,
            'tarifa_x_pax' => 15.0,
            'desayuno_adulto' => 20.0,
            'desayuno_infante' => 10.0,
            'incluye_alimentos' => 1,
            'pago_destino' => 1,
            'hotel_id' => 1,
            'habitacion_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('grupos')->insert([
            'nombre_convenio' => 'IBM',
            'empresa' => 'IBM SA de CV',
            'codigo_reserva' => 'IBMGPH',
            'habitaciones_disponibles' => 10,
            'window_open' => Carbon::parse('2021-09-20'),
            'window_close' => Carbon::parse('2021-09-28'),
            'startDate' => Carbon::parse('2021-10-01'),
            'endDate' => Carbon::parse('2021-10-15'),
            'tarifa' => 55.4,
            'tarifa_x_pax' => 85.0,
            'desayuno_adulto' => 30.0,
            'desayuno_infante' => 20.0,
            'incluye_alimentos' => 1,
            'pago_destino' => 1,
            'hotel_id' => 1,
            'habitacion_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
