<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class InventarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('inventarios')->insert([
            [
                'id' => '1',
                'nombre' => 'Inventario test', 
                'hotel_id' => '1',
                'descripcion' => 'inventario test',
                'estado' => '1', // activo = 1, inactivo = 0
            ], 
        ]);
        
    }
}
