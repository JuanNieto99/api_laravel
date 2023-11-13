<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class EstadoCivilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('estado_civils')->insert([
            [
                'id' => '1',
                'nombre' => 'Soltero (a)', 
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '2',
                'nombre' => 'Casado (a)', 
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '3',
                'nombre' => 'Divorciado(a)', 
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '5',
                'nombre' => 'Viudo(a).', 
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '7',
                'nombre' => 'Union libre', 
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '8',
                'nombre' => 'Otro', 
                'estado' => '1', // activo = 1, inactivo = 0
            ],
        ]);
        
    }
}
