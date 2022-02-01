<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;

class TemporadasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('temporadas')->insert([
            'startDate' => now(),
            'endDate' => Carbon::parse('2021-12-31'),
            'tarifa_x_dolares' => 80.00,
            'tarifa_x_pax' => 20,
            'hotel_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('temporadas')->insert([
            'startDate' => Carbon::parse('2022-01-01'),
            'endDate' => Carbon::parse('2022-01-15'),
            'tarifa_x_dolares' => 80.00,
            'tarifa_x_pax' => 20,
            'hotel_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('temporadas')->insert([
            'startDate' => Carbon::parse('2022-01-16'),
            'endDate' => Carbon::parse('2022-01-28'),
            'tarifa_x_dolares' => 80.00,
            'tarifa_x_pax' => 20,
            'hotel_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);


        // ------ Hotel Adhara Express ------
        DB::table('temporadas')->insert([
            'startDate' => now(),
            'endDate' => Carbon::parse('2021-12-31'),
            'tarifa_x_dolares' => 80.00,
            'tarifa_x_pax' => 20,
            'hotel_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('temporadas')->insert([
            'startDate' => Carbon::parse('2022-01-01'),
            'endDate' => Carbon::parse('2022-01-15'),
            'tarifa_x_dolares' => 80.00,
            'tarifa_x_pax' => 20,
            'hotel_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('temporadas')->insert([
            'startDate' => Carbon::parse('2022-01-16'),
            'endDate' => Carbon::parse('2022-01-28'),
            'tarifa_x_dolares' => 80.00,
            'tarifa_x_pax' => 20,
            'hotel_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
    }
}
