<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PlanesHabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('planes_x_habitacion')->insert([
            'nombre_es' => 'Solo Habitacion',
            'nombre_en' => 'Just Room',
            'desc_es' => NULL,
            'desc_en' => NULL,
            'desayuno_adulto' => 0,
            'desayuno_infante' => 0,
            'tag_es' => Str::slug('Solo Habitacion','-'),
            'tag_en' => Str::slug('Just Room','-'),
            'hotel_id' => 1,
            'isDesayuno' => FALSE,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('planes_x_habitacion')->insert([
            'nombre_es' => 'Desayuno Americano',
            'nombre_en' => 'American Express',
            'desc_es' => NULL,
            'desc_en' => NULL,
            'desayuno_adulto' => 10.0,
            'desayuno_infante' => 8.0,
            'tag_es' => Str::slug('Desayuno Americano','-'),
            'tag_en' => Str::slug('American Breakfast','-'),
            'hotel_id' => 1,
            'isDesayuno' => TRUE,
            'created_at' => now(),
            'updated_at' => now()
        ]);


        DB::table('planes_x_habitacion')->insert([
            'nombre_es' => 'Solo Habitacion',
            'nombre_en' => 'Just Room',
            'desc_es' => NULL,
            'desc_en' => NULL,
            'desayuno_adulto' => 0,
            'desayuno_infante' => 0,
            'tag_es' => Str::slug('Solo Habitacion','-'),
            'tag_en' => Str::slug('Just Room','-'),
            'hotel_id' => 2,
            'isDesayuno' => FALSE,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('planes_x_habitacion')->insert([
            'nombre_es' => 'Desayuno Americano',
            'nombre_en' => 'American Express',
            'desc_es' => NULL,
            'desc_en' => NULL,
            'desayuno_adulto' => 10.0,
            'desayuno_infante' => 8.0,
            'tag_es' => Str::slug('Desayuno Americano','-'),
            'tag_en' => Str::slug('American Breakfast','-'),
            'hotel_id' => 2,
            'isDesayuno' => TRUE,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
