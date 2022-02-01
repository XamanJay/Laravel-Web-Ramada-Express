<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hoteles')->insert([
            'nombre_es' => 'Adhara Cancun',
            'nombre_en' => 'Adhara cancun',
            'desc_es' => 'Hotel estilo colonial',
            'desc_en' => 'Colonial Style',
            'path_fachada' => NULL,
            'galeria' => NULL,
            'calle' => 'Av Nader',
            'no_ext' => 3,
            'cp' => 77500,
            'referencias' => 'Enfrente del edificio del PRI',
            'tag_es' => str::slug('Adhara Cancun','-'),
            'tag_en' => str::slug('Adhara Cancun','-'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('hoteles')->insert([
            'nombre_es' => 'Adhara Express',
            'nombre_en' => 'Adhara Express',
            'desc_es' => 'Hotel dedicado a cuenta comercial',
            'desc_en' => 'Bussiness Hotel',
            'path_fachada' => NULL,
            'galeria' => NULL,
            'calle' => 'Av Yachilan',
            'no_ext' => 3,
            'cp' => 77500,
            'referencias' => 'Enfrente del Hotel Caribe',
            'tag_es' => Str::slug('Adhara Express','-'),
            'tag_en' => Str::slug('Adhara Express','-'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
