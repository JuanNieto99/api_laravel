<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table("departamentos")->insert(array(
            array(
                "id" => 1,
                "nombre" => "AMAZONAS",
                "codigo_dane" => "91",
                "pais_id" => 12,
                "estado" => 1,
                "indicativo_departamento" => "8"
            ),
            array(
                "id" => 2,
                "nombre" => "ANTIOQUIA",
                "codigo_dane" => "05",
                "pais_id" => 12,
                "estado" => 1,
                "indicativo_departamento" => "4"
            ),
            array(
                "id" => 3,
                "nombre" => "ARAUCA",
                "codigo_dane" => "81",
                "pais_id" => 12,
                "estado" => 1,
                "indicativo_departamento" => "7"
            ),
            array(
                "id" => 4,
                "nombre" => "ATLANTICO",
                "codigo_dane" => "08",
                "pais_id" => 12,
                "estado" => 1,
                "indicativo_departamento" => "5"
            ),
            array(
                "id" => 5,
                "nombre" => "BOGOTA D.C.",
                "codigo_dane" => "11",
                "pais_id" => 12,
                "estado" => 1,
                "indicativo_departamento" => "1"
            ),
            array(
                "id" => 6,
                "nombre" => "BOLIVAR",
                "codigo_dane" => "13",
                "pais_id" => 12,
                "estado" => 1,
                "indicativo_departamento" => "5"
            ),
            array(
                "id" => 7,
                "nombre" => "BOYACA",
                "codigo_dane" => "15",
                "pais_id" => 12,
                "estado" => 1,
                "indicativo_departamento" => "8"
            ),
            array(
                "id" => 8,
                "nombre" => "CALDAS",
                "codigo_dane" => "17",
                "pais_id" => 12,
                "estado" => 1,
                "indicativo_departamento" => "6"
            ),
            array(
                "id" => 9,
                "nombre" => "CAQUETA",
                "codigo_dane" => "18",
                "pais_id" => 12,
                "estado" => 1,
                "indicativo_departamento" => "8"
            ),
            array(
                "id" => 10,
                "nombre" => "CASANARE",
                "codigo_dane" => "85",
                "pais_id" => 12,
                "estado" => 1,
                "indicativo_departamento" => "8"
            ),
            array(
                "id" => 11,
                "nombre" => "CAUCA",
                "codigo_dane" => "19",
                "pais_id" => 12,
                "estado" => 1,
                "indicativo_departamento" => "2"
            ),
            array(
                "id" => 12,
                "nombre" => "CESAR",
                "codigo_dane" => "20",
                "pais_id" => 12,
                "estado" => 1,
                "indicativo_departamento" => "5"
            ),
            array(
                "id" => 13,
                "nombre" => "CHOCO",
                "codigo_dane" => "27",
                "pais_id" => 12,
                "estado" => 1,
                "indicativo_departamento" => "4"
            ),
            array(
                "id" => 14,
                "nombre" => "CORDOBA",
                "codigo_dane" => "23",
                "pais_id" => 12,
                "estado" => 1,
                "indicativo_departamento" => "4"
            ),
            array(
                "id" => 15,
                "nombre" => "CUNDINAMARCA",
                "codigo_dane" => "25",
                "pais_id" => 12,
                "estado" => 1,
                "indicativo_departamento" => "1"
            ),
            array(
                "id" => 16,
                "nombre" => "GUAINIA",
                "codigo_dane" => "94",
                "pais_id" => 12,
                "estado" => 1,
                "indicativo_departamento" => "8"
            ),
            array(
                "id" => 17,
                "nombre" => "GUAJIRA",
                "codigo_dane" => "44",
                "pais_id" => 12,
                "estado" => 1,
                "indicativo_departamento" => "5"
            ),
            array(
                "id" => 18,
                "nombre" => "GUAVIARE",
                "codigo_dane" => "95",
                "pais_id" => 12,
                "estado" => 1,
                "indicativo_departamento" => "8"
            ),
            array(
                "id" => 19,
                "nombre" => "HUILA",
                "codigo_dane" => "41",
                "pais_id" => 12,
                "estado" => 1,
                "indicativo_departamento" => "8"
            ),
            array(
                "id" => 20,
                "nombre" => "MAGDALENA",
                "codigo_dane" => "47",
                "pais_id" => 12,
                "estado" => 1,
                "indicativo_departamento" => "5"
            ),
            array(
                "id" => 21,
                "nombre" => "META",
                "codigo_dane" => "50",
                "pais_id" => 12,
                "estado" => 1,
                "indicativo_departamento" => "8"
            ),
            array(
                "id" => 22,
                "nombre" => "NARIÑO",
                "codigo_dane" => "52",
                "pais_id" => 12,
                "estado" => 1,
                "indicativo_departamento" => "2"
            ),
            array(
                "id" => 23,
                "nombre" => "NORTEDESANTANDER",
                "codigo_dane" => "54",
                "pais_id" => 12,
                "estado" => 1,
                "indicativo_departamento" => "7"
            ),
            array(
                "id" => 24,
                "nombre" => "PUTUMAYO",
                "codigo_dane" => "86",
                "pais_id" => 12,
                "estado" => 1,
                "indicativo_departamento" => "8"
            ),
            array(
                "id" => 25,
                "nombre" => "QUINDIO",
                "codigo_dane" => "63",
                "pais_id" => 12,
                "estado" => 1,
                "indicativo_departamento" => "6"
            ),
            array(
                "id" => 26,
                "nombre" => "RISARALDA",
                "codigo_dane" => "66",
                "pais_id" => 12,
                "estado" => 1,
                "indicativo_departamento" => "6"
            ),
            array(
                "id" => 27,
                "nombre" => "SANANDRES",
                "codigo_dane" => "88",
                "pais_id" => 12,
                "estado" => 1,
                "indicativo_departamento" => "8"
            ),
            array(
                "id" => 28,
                "nombre" => "SANTANDER",
                "codigo_dane" => "68",
                "pais_id" => 12,
                "estado" => 1,
                "indicativo_departamento" => "7"
            ),
            array(
                "id" => 29,
                "nombre" => "SUCRE",
                "codigo_dane" => "70",
                "pais_id" => 12,
                "estado" => 1,
                "indicativo_departamento" => "5"
            ),
            array(
                "id" => 30,
                "nombre" => "TOLIMA",
                "codigo_dane" => "73",
                "pais_id" => 12,
                "estado" => 1,
                "indicativo_departamento" => "8"
            ),
            array(
                "id" => 31,
                "nombre" => "VALLEDELCAUCA",
                "codigo_dane" => "76",
                "pais_id" => 12,
                "estado" => 1,
                "indicativo_departamento" => "2"
            ),
            array(
                "id" => 32,
                "nombre" => "VAUPES",
                "codigo_dane" => "97",
                "pais_id" => 12,
                "estado" => 1,
                "indicativo_departamento" => "8"
            ),
            array(
                "id" => 33,
                "nombre" => "VICHADA",
                "codigo_dane" => "99",
                "pais_id" => 12,
                "estado" => 1,
                "indicativo_departamento" => "8"
            ),
            array(
                "id" => 57,
                "nombre" => "NUEVO DEPARTAMENTOO",
                "codigo_dane" => "89",
                "pais_id" => 12,
                "estado" => 1,
                "indicativo_departamento" => "8"
            )
        ));
    }
}
