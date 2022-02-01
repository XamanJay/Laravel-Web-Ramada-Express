<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriaHabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //persona = pax
        DB::table('categorias_x_habitacion')->insert([
            'nombre_es' => 'Estandar',
            'nombre_en' => 'Standar',
            'desc_es' => 'Habitacion con una cama',
            'desc_en' => 'Room with just 1 bed',
            'plus_tarifa_base' => 0.0,
            'plus_x_pax' => 10.0,
            'tag_es' => Str::slug('Estandar','-'),
            'tag_en' => Str::slug('Standar','-'),
            'hotel_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categorias_x_habitacion')->insert([
            'nombre_es' => 'Superior',
            'nombre_en' => 'Superior',
            'desc_es' => 'Habitacion con doble cama',
            'desc_en' => 'Room with double bed',
            'plus_tarifa_base' =>15.0,
            'plus_x_pax' => 10.0,
            'tag_es' => Str::slug('Superior','-'),
            'tag_en' => Str::slug('Superior','-'),
            'hotel_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categorias_x_habitacion')->insert([
            'nombre_es' => 'Ejecutiva',
            'nombre_en' => 'Ejecutive',
            'desc_es' => 'Habitacion con doble cama y caja de seguridad',
            'desc_en' => 'Room with double bed and safety box',
            'plus_tarifa_base' => 25.0,
            'plus_x_pax' => 10.0,
            'tag_es' => Str::slug('Ejecutiva','-'),
            'tag_en' => Str::slug('Ejecutive','-'),
            'hotel_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categorias_x_habitacion')->insert([
            'nombre_es' => 'Estandar',
            'nombre_en' => 'Standar',
            'desc_es' => 'Habitacion con 1 cama',
            'desc_en' => 'Room with just 1 bed',
            'plus_tarifa_base' => 0.0,
            'plus_x_pax' => 10.0,
            'tag_es' => Str::slug('Estandar','-'),
            'tag_en' => Str::slug('Standar','-'),
            'hotel_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
