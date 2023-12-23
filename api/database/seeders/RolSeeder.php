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
                'nombre' => 'Super admin',
                'descripcion' => 'Super Admin con todos los permisos del sistema',
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '2',
                'nombre' => 'Admin',
                'descripcion' => 'Permite Administrar la info de cada hotel',
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '3',
                'nombre' => 'Gestor',
                'descripcion' => 'Usuario gestor del hotel (recepcion)',
                'estado' => '1', // activo = 1, inactivo = 0
            ]
        ]);
        
    }
}
