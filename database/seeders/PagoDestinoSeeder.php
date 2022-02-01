<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PagoDestinoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pago_x_destino')->insert([
            'nombre' => 'Vacaciones de Verano',
            'startDate' => Carbon::parse('2021-04-11'),
            'endDate' => Carbon::parse('2021-05-02'),
            'tag' => Str::slug('Vacaciones de Verano','-'),
            'hotel_id' => 1,
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('pago_x_destino')->insert([
            'nombre' => 'Navidad',
            'startDate' => Carbon::parse('2021-12-12'),
            'endDate' => Carbon::parse('2021-12-31'),
            'tag' => Str::slug('Vacaciones de Verano','-'),
            'hotel_id' => 1,
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('pago_x_destino')->insert([
            'nombre' => 'Vacaciones de Verano',
            'startDate' => Carbon::parse('2021-04-11'),
            'endDate' => Carbon::parse('2021-05-02'),
            'tag' => Str::slug('Vacaciones de Verano','-'),
            'hotel_id' => 2,
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('pago_x_destino')->insert([
            'nombre' => 'Navidad',
            'startDate' => Carbon::parse('2021-12-12'),
            'endDate' => Carbon::parse('2021-12-31'),
            'tag' => Str::slug('Vacaciones de Verano','-'),
            'hotel_id' => 2,
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
