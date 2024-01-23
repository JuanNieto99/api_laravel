<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('estados')->insert([
            [
                'id' => '2',
                'nombre' => 'Ocupado', 
                'descripcion' => '', 
                'modulo_id' => '1', 
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '3',
                'nombre' => 'Disponible', 
                'descripcion' => '', 
                'modulo_id' => '1', 
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '4',
                'nombre' => 'Limpieza', 
                'descripcion' => '', 
                'modulo_id' => '1', 
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '5',
                'nombre' => 'Reservada', 
                'descripcion' => '', 
                'modulo_id' => '1', 
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '6',
                'nombre' => 'Mantenimiento', 
                'descripcion' => '', 
                'modulo_id' => '1', 
                'estado' => '1', // activo = 1, inactivo = 0
            ],
        ]);
        
    }
}