<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_cliente')->insert([
            [
                'id' => '1',
                'nombre' => 'Natural', 
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '2',
                'nombre' => 'Juridico', 
                'estado' => '1', // activo = 1, inactivo = 0
            ], 
            
        ]);
    }
}
