<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class ImpuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('impuestos')->insert([
            [
                'id' => '1',
                'nombre' => 'Iva', 
                'descripcion' => 'Iva', 
                'hotel_id' => 1,
                'porcentaje' => 19,
                'estado' => 1,
            ]
        ]);
    }
}
