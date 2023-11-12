<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class PermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permisos')->insert([
            [
                'id' => '1',
                'codigo' => 'cf',
                'nombre' => 'chofer',
                'id_padre' => 0,
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '2',
                'codigo' => 'cf2',
                'nombre' => 'chofer2',
                'id_padre' => 0,
                'estado' => '1', // activo = 1, inactivo = 0
            ]
        ]);
    }
}
