<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('generos')->insert([
            [
                'id' => '1',
                'nombre' => 'Masculino', 
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '2',
                'nombre' => 'Femenino', 
                'estado' => '1', // activo = 1, inactivo = 0
            ], 
            [
                'id' => '3',
                'nombre' => 'No aplica', 
                'estado' => '1', // activo = 1, inactivo = 0
            ], 
        ]);
        
    }
}
