<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rols')->insert([
            [
                'id' => '1',
                'nombre' => 'admin',
                'descripcion' => 'Super Admin',
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '2',
                'nombre' => 'permiso',
                'descripcion' => 'permiso tesr',
                'estado' => '1', // activo = 1, inactivo = 0
            ]
        ]);
        
    }
}
