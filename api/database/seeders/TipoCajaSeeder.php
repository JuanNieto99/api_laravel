<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoCajaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_cajas')->insert([
            [
                'id' => 1,
                'nombre' =>  'Facturacion Habitacion y Consumo',
                'descripcion' => 'Facturacion Descripcion',
                'estado' => 1,
            ],
            [
                'id' => 2,
                'nombre' =>  'Facturacion Piscina',
                'descripcion' => 'Facturacion Caja piscina',
                'estado' => 1,
            ],
        ]);


    }
}
