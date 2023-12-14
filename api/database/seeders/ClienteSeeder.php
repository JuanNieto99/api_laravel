<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clientes')->insert([
            [
                'id' => '1',
                'nombres' => 'Juan',  
                'apellidos' => 'Nieto',
                'tipo' => 1,
                'estado' => 1,
                'ciudad_id' => 1,
                'tipo_documento_id' => 1,
                'numero_documento' => '1204562132',
                'genero_id' => 1,
                'estado_civil_id' => 2,
                'barrio_residencia' => 'Belen',
                'fecha_nacimiento' => '2017-09-07 11:41:08.000',
                'telefono' => '3014556236',
                'celular' => '3014556236',
                'nivel_studio_id' => 5,
                'correo' => 'jgnieto99@gmail.com',
                'observacion' => 'ninguna',
                'usuario_create_id' => 1,  
            ],
        
        ]);
    }
}
