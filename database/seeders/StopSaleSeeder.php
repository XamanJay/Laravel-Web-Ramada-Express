<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class StopSaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stop_sales')->insert([
            'nombre' => 'Navidad',
            'startDate' => Carbon::parse('2021-12-20'),
            'endDate' => Carbon::parse('2021-12-31'),
            'hotel_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
