<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PromocionTemporadaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promociones_x_temporada')->insert([
            'nombre' => 'Vacations',
            'startDate' => Carbon::parse('2022-02-05'),
            'endDate' => Carbon::parse('2022-02-20'),
            'descuento' => 20,
            'hotel_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
