<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("tipo_documentos")->insert(array(
            array(
                "id" => 1,
                "nombre_abreviado" => "CC",
                "nombre" => "Cédula de Ciudadanía",
                "codigo_dian" => "13",
                "estado" => 1,
            ),
            array(
                "id" => 2,
                "nombre_abreviado" => "CE",
                "nombre" => "Cédula de Extranjería", 
                "codigo_dian" => "22",
                "estado" => 1, 
            ),
            array(
                "id" => 3,
                "nombre_abreviado" => "TE",
                "nombre" => "Tarjeta de extranjeria", 
                "codigo_dian" => "21",
                "estado" => 1,
            ),
            array(
                "id" => 12,
                "nombre_abreviado" => "PP",
                "nombre" => "Pasaporte", 
                "codigo_dian" => "41",
                "estado" => 1, 
            ),
            array(
                "id" => 32,
                "nombre_abreviado" => "NIT",
                "nombre" => "Número de Identificación Tributaria", 
                "codigo_dian" => "31",
                "estado" => 1, 
            ),
            array(
                "id" => 37,
                "nombre_abreviado" => "DE",
                "nombre" => "Documento de identificación extranjero", 
                "codigo_dian" => "42",
                "estado" => 1, 
            ),
            array(
                "id" => 39,
                "nombre_abreviado" => "TI",
                "nombre" => "Tarjeta de identidad", 
                "codigo_dian" => "12",
                "estado" => 1, 
            ),
            array(
                "id" => 40,
                "nombre_abreviado" => "SIN",
                "nombre" => "Sin identificación del exterior o para uso definido por la DIAN.", 
                "codigo_dian" => "43",
                "estado" => 1, 
            ),
        ));
    }
}
