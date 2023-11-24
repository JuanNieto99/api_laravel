<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class TipoContribuyenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_contribuyente')->insert([
            [
                'id' => '1',
                'nombre' => 'Gran contribuyente', 
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '2',
                'nombre' => 'Contribuyente Mediano Alto ', 
                'estado' => '1', // activo = 1, inactivo = 0
            ], 
            [
                'id' => '3',
                'nombre' => 'Contribuyente mediano ', 
                'estado' => '1', // activo = 1, inactivo = 0
            ], 
            [
                'id' => '4',
                'nombre' => 'Contribuyente pequeño', 
                'estado' => '1', // activo = 1, inactivo = 0
            ], 
            [
                'id' => '5',
                'nombre' => 'Contribuyente Micro', 
                'estado' => '1', // activo = 1, inactivo = 0
            ], 
        ]);
        
    }
}
