<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class MetodosPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('metodos_pagos')->insert([
            [
                'id' => '1',
                'nombre' => 'Efectivo', 
                'codigo_dian' => '0',
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '2',
                'nombre' => 'Tarjeta', 
                'codigo_dian' => '0',
                'estado' => '1', // activo = 1, inactivo = 0
            ], 
            [
                'id' => '4',
                'nombre' => 'PSE', 
                'codigo_dian' => '0',
                'estado' => '1', // activo = 1, inactivo = 0
            ], 
            [
                'id' => '3',
                'nombre' => 'Trasferencia', 
                'codigo_dian' => '0',
                'estado' => '1', // activo = 1, inactivo = 0
            ], 
            [
                'id' => '5',
                'nombre' => 'QR', 
                'codigo_dian' => '0',
                'estado' => '1', // activo = 1, inactivo = 0
            ], 
        ]);
        
    }
}