<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoOperacionSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_operacion')->insert([
            [
                'id' => '1',
                'nombre' => 'Facturacion ',  
                'isInterna' => 1, // interna = 1, externa 0,
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '2',
                'nombre' => 'Facturacion Electronica',  
                'isInterna' => 0, // interna = 1, externa 0,
                'estado' => '1', // activo = 1, inactivo = 0
            ],
        ]);
    }
}
