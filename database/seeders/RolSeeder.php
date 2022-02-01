<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'nombre' => 'Admin',
            'permisos' => json_encode(['all'=>true,'showAny'=>false,'show'=>false,'store'=>false,'update'=>false,'delete'=>false]),
            'tag_rol' => 'admin',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'nombre' => 'Gerente',
            'permisos' => json_encode(['all'=>true,'showAny'=>true,'show'=>true,'store'=>true,'update'=>true,'delete'=>true]),
            'tag_rol' => 'gerente',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'nombre' => 'Ventas',
            'permisos' => json_encode(['all'=>false,'showAny'=>true,'show'=>true,'store'=>true,'update'=>true,'delete'=>true]),
            'tag_rol' => 'ventas',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'nombre' => 'Recepcion',
            'permisos' => json_encode(['all'=>false,'showAny'=>true,'show'=>true,'store'=>false,'update'=>true,'delete'=>false]),
            'tag_rol' => 'recepcion',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
