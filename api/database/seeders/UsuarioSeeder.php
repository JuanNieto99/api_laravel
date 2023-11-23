<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usuarios')->insert([
            'id' => 1,
            'usuario' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$12$wNr.t/gYOLs1YDwmG8ws5.fYx07XE3xg0wu3gbduPPmzvi8I/NQpa',
            'rol_id' => '1',
            'superadmin' => '1',
            'estado' => '1', // activo = 1, inactivo = 0 
        ]);
        
    }
}
