<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class TipoHabitacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_habitacion')->insert([
            [
                'id' => '1',
                'nombre' => 'Grande', 
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '2',
                'nombre' => 'Pequeña ', 
                'estado' => '1', // activo = 1, inactivo = 0
            ], 
            [
                'id' => '3',
                'nombre' => 'triple ', 
                'estado' => '1', // activo = 1, inactivo = 0
            ], 
            [
                'id' => '4',
                'nombre' => 'King', 
                'estado' => '1', // activo = 1, inactivo = 0
            ], 
            [
                'id' => '5',
                'nombre' => 'Jumbo', 
                'estado' => '1', // activo = 1, inactivo = 0
            ], 
        ]);
        
    }
}
