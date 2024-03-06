<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class NivelEstudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nivel_estudios')->insert([
            [
                'id' => '1',
                'nombre' => 'Sin nivel de estudio', 
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '2',
                'nombre' => 'Basica Primaria', 
                'estado' => '1', // activo = 1, inactivo = 0
            ], 
            [
                'id' => '3',
                'nombre' => 'Basica Secundaria', 
                'estado' => '1', // activo = 1, inactivo = 0
            ], 
            [
                'id' => '4',
                'nombre' => 'Tecnico', 
                'estado' => '1', // activo = 1, inactivo = 0
            ], 
            [
                'id' => '5',
                'nombre' => 'Tecnologo', 
                'estado' => '1', // activo = 1, inactivo = 0
            ], 
            [
                'id' => '6',
                'nombre' => 'Universitario', 
                'estado' => '1', // activo = 1, inactivo = 0
            ], 
            [
                'id' => '7',
                'nombre' => 'Pos Grado', 
                'estado' => '1', // activo = 1, inactivo = 0
            ], 
            [
                'id' => '8',
                'nombre' => 'No aplica', 
                'estado' => '1', // activo = 1, inactivo = 0
            ], 
        ]);
        
    }
}
