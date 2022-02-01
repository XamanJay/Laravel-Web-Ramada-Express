<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ReservacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reservaciones')->insert([
            'pago_x_destino' => FALSE,
            'checkIn' => Carbon::parse('2021-10-05'),
            'checkOut' => Carbon::parse('2021-10-07'),
            'plataforma' => 'web',
            'noches' => 2,
            'habitaciones' => 1,
            'adultos' => 2,
            'infantes' => 0,
            'precio' => 3745.23,
            'currency' => 'MXN',
            'estatus' => 'aprobada',
            'comentatios' => NULL,
            'hotel_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
