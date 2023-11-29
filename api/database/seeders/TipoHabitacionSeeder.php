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
                'hotel_id'=> '1',
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '2',
                'nombre' => 'Pequeña ', 
                'hotel_id'=> '1',
                'estado' => '1', // activo = 1, inactivo = 0
            ], 
            [
                'id' => '3',
                'nombre' => 'triple ', 
                'hotel_id'=> '1',
                'estado' => '1', // activo = 1, inactivo = 0
            ], 
            [
                'id' => '4',
                'nombre' => 'King', 
                'hotel_id'=> '1',
                'estado' => '1', // activo = 1, inactivo = 0
            ], 
            [
                'id' => '5',
                'nombre' => 'Jumbo', 
                'hotel_id'=> '1',
                'estado' => '1', // activo = 1, inactivo = 0
            ], 
        ]);
        
    }
}
