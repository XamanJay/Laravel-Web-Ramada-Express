<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AmenidadHabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('amenidades_x_cuarto')->insert([
            'nombre_es' => 'Aire Acondicionado',
            'nombre_en' => 'Air Condition',
            'desc_es' => NULL,
            'desc_en' => NULL,
            'icon' => 'fas fa-air',
            'url_icon' => NULL,
            'tag_es' => Str::slug('Aire Acondicionado','-'),
            'tag_en' => Str::slug('Air Condition','-'),
            'hotel_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('amenidades_x_cuarto')->insert([
            'nombre_es' => 'Wifi Gratis',
            'nombre_en' => 'Free Wifi',
            'desc_es' => NULL,
            'desc_en' => NULL,
            'icon' => 'fas fa-wifi',
            'url_icon' => NULL,
            'tag_es' => Str::slug('Wifi Gratis','-'),
            'tag_en' => Str::slug('Free Wifi','-'),
            'hotel_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('amenidades_x_cuarto')->insert([
            'nombre_es' => 'Frigobar',
            'nombre_en' => 'Mini Bar',
            'desc_es' => NULL,
            'desc_en' => NULL,
            'icon' => 'fas fa-room',
            'url_icon' => NULL,
            'tag_es' => Str::slug('Frigobar','-'),
            'tag_en' => Str::slug('Mini Bar','-'),
            'hotel_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);


        DB::table('amenidades_x_categoria')->insert([
            'categoria_habitacion_id' => 1,
            'amenidad_id' => 1
        ]);

        DB::table('amenidades_x_categoria')->insert([
            'categoria_habitacion_id' => 2,
            'amenidad_id' => 1
        ]);

        DB::table('amenidades_x_categoria')->insert([
            'categoria_habitacion_id' => 2,
            'amenidad_id' => 2
        ]);

        DB::table('amenidades_x_categoria')->insert([
            'categoria_habitacion_id' => 3,
            'amenidad_id' => 1
        ]);

        DB::table('amenidades_x_categoria')->insert([
            'categoria_habitacion_id' => 3,
            'amenidad_id' => 2
        ]);

        DB::table('amenidades_x_categoria')->insert([
            'categoria_habitacion_id' => 3,
            'amenidad_id' => 3
        ]);

        DB::table('amenidades_x_categoria')->insert([
            'categoria_habitacion_id' => 4,
            'amenidad_id' => 1
        ]);
    }
}
