<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetalleHotelUsuario extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hotel_detalle_usuario')->insert([
            [
                'id' => 1,
                'usuario_id' => 1,
                'hotel_id' => 1,
            ]
        ]);
    }
}
