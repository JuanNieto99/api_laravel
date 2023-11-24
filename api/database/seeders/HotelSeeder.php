<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hotels')->insert([
            [
                'id' => '1',
                'nombre' => 'Hotel Prueba', 
                'direccion' => 'Calle 45 14 A',
                'ciudad_id' => 1,
                'contacto' => 'Pepito Perez',
                'contacto_telefono' => '3127889654',
                'contacto_cargo' => 'Jefe',
                'telefono' => '451244',
                'nit' => '846515451',
                'razon_social' => 'test',
                'cantidad_habitaciones' => 29,
                'email' => 'test@gmail.com',
                'tipo_contribuyente' => 1,
                'usuario_id' => 1, 
                'imagen' => 'defaultHotel.png',
                'estado' => '1', // activo = 1, inactivo = 0
            ], 
        ]);
        
    }
}
