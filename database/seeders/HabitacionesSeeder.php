<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class HabitacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Categoria Estandar - Habitacion Tarifa Magica
        DB::table('habitaciones')->insert([
            'isTarifaMagica' => 1,
            'incluye_alimentos' => 0,
            'pago_x_destino' => 0,
            'porcentaje' => 10,
            'stock' => 20,
            'hotel_id' => 1,
            'plan_habitacion_id' => 1,
            'categoria_habitacion_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('habitaciones')->insert([
            'isTarifaMagica' => 1,
            'incluye_alimentos' => 1,
            'pago_x_destino' => 0,
            'porcentaje' => 10,
            'stock' => 20,
            'hotel_id' => 1,
            'plan_habitacion_id' => 2,
            'categoria_habitacion_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Categoria Estandar - Habitacion Regular
        DB::table('habitaciones')->insert([
            'isTarifaMagica' => 0,
            'incluye_alimentos' => 0,
            'pago_x_destino' => 1,
            'stock' => 20,
            'hotel_id' => 1,
            'plan_habitacion_id' => 1,
            'categoria_habitacion_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('habitaciones')->insert([
            'isTarifaMagica' => 0,
            'incluye_alimentos' => 1,
            'pago_x_destino' => 1,
            'stock' => 20,
            'hotel_id' => 1,
            'plan_habitacion_id' => 2,
            'categoria_habitacion_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Categoria Superior - Habitacion Tarifa Magica
        DB::table('habitaciones')->insert([
            'isTarifaMagica' => 1,
            'incluye_alimentos' => 0,
            'pago_x_destino' => 0,
            'porcentaje' => 10,
            'stock' => 20,
            'hotel_id' => 1,
            'plan_habitacion_id' => 1,
            'categoria_habitacion_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('habitaciones')->insert([
            'isTarifaMagica' => 1,
            'incluye_alimentos' => 1,
            'pago_x_destino' => 0,
            'porcentaje' => 10,
            'stock' => 20,
            'hotel_id' => 1,
            'plan_habitacion_id' => 2,
            'categoria_habitacion_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Categoria Superior - Habitacion Regular
        DB::table('habitaciones')->insert([
            'isTarifaMagica' => 0,
            'incluye_alimentos' => 0,
            'pago_x_destino' => 1,
            'stock' => 20,
            'hotel_id' => 1,
            'plan_habitacion_id' => 1,
            'categoria_habitacion_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('habitaciones')->insert([
            'isTarifaMagica' => 0,
            'incluye_alimentos' => 1,
            'pago_x_destino' => 1,
            'stock' => 20,
            'hotel_id' => 1,
            'plan_habitacion_id' => 2,
            'categoria_habitacion_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Categoria Ejecutivo - Habitacion Tarifa Magica
        DB::table('habitaciones')->insert([
            'isTarifaMagica' => 1,
            'incluye_alimentos' => 0,
            'pago_x_destino' => 0,
            'porcentaje' => 20,
            'stock' => 20,
            'hotel_id' => 1,
            'plan_habitacion_id' => 1,
            'categoria_habitacion_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('habitaciones')->insert([
            'isTarifaMagica' => 1,
            'incluye_alimentos' => 1,
            'pago_x_destino' => 0,
            'porcentaje' => 20,
            'stock' => 20,
            'hotel_id' => 1,
            'plan_habitacion_id' => 2,
            'categoria_habitacion_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Categoria Ejecutivo - Habitacion Regular
        DB::table('habitaciones')->insert([
            'isTarifaMagica' => 0,
            'incluye_alimentos' => 0,
            'pago_x_destino' => 1,
            'stock' => 20,
            'hotel_id' => 1,
            'plan_habitacion_id' => 1,
            'categoria_habitacion_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('habitaciones')->insert([
            'isTarifaMagica' => 0,
            'incluye_alimentos' => 1,
            'pago_x_destino' => 1,
            'stock' => 20,
            'hotel_id' => 1,
            'plan_habitacion_id' => 2,
            'categoria_habitacion_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);


        // ------ Hotel Adhara Express ------
        // Categoria Estandar - Habitacion Tarifa Magica
        DB::table('habitaciones')->insert([
            'isTarifaMagica' => 1,
            'incluye_alimentos' => 0,
            'pago_x_destino' => 0,
            'porcentaje' => 10,
            'stock' => 20,
            'hotel_id' => 2,
            'plan_habitacion_id' => 1,
            'categoria_habitacion_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('habitaciones')->insert([
            'isTarifaMagica' => 1,
            'incluye_alimentos' => 1,
            'pago_x_destino' => 0,
            'porcentaje' => 10,
            'stock' => 20,
            'hotel_id' => 2,
            'plan_habitacion_id' => 2,
            'categoria_habitacion_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Categoria Estandar - Habitacion Regular
        DB::table('habitaciones')->insert([
            'isTarifaMagica' => 0,
            'incluye_alimentos' => 0,
            'pago_x_destino' => 1,
            'stock' => 20,
            'hotel_id' => 2,
            'plan_habitacion_id' => 1,
            'categoria_habitacion_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('habitaciones')->insert([
            'isTarifaMagica' => 0,
            'incluye_alimentos' => 1,
            'pago_x_destino' => 1,
            'stock' => 20,
            'hotel_id' => 2,
            'plan_habitacion_id' => 2,
            'categoria_habitacion_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
