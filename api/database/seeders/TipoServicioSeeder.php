<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_servicio')->insert([
            [
                'id' => '1',
                'nombre' => 'Producto',  
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '2',
                'nombre' => 'Servicio',  
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '3',
                'nombre' => 'Tarifa',  
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '4',
                'nombre' => 'Receta',  
                'estado' => '1', // activo = 1, inactivo = 0
            ],
        ]);
    }
}
