<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolSeeder::class,
            UserSeeder::class,
            HotelSeeder::class,
            CategoriaHabSeeder::class,
            AmenidadHabSeeder::class,
            PlanesHabSeeder::class,
            HabitacionesSeeder::class,
            TemporadasSeeder::class,
            PagoDestinoSeeder::class,
            GruposSeeder::class,
            SantanderKeysSeeder::class,
            TipoCambioSeeder::class
        ]);
    }
}
