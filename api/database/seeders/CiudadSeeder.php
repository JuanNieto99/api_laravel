<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CiudadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table("ciudads")->insert(array(
            array(
                "id" => 1,
                "nombre" => "MEDELLIN",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05001"
            ),
            array(
                "id" => 2,
                "nombre" => "ABEJORRAL",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05002"
            ),
            array(
                "id" => 3,
                "nombre" => "ABRIAQUI",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05004"
            ),
            array(
                "id" => 4,
                "nombre" => "ALEJANDRIA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05021"
            ),
            array(
                "id" => 5,
                "nombre" => "AMAGA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05030"
            ),
            array(
                "id" => 6,
                "nombre" => "AMALFI",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05031"
            ),
            array(
                "id" => 7,
                "nombre" => "ANDES",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05034"
            ),
            array(
                "id" => 8,
                "nombre" => "ANGELOPOLIS",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05036"
            ),
            array(
                "id" => 9,
                "nombre" => "ANGOSTURA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05038"
            ),
            array(
                "id" => 10,
                "nombre" => "ANORI",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05040"
            ),
            array(
                "id" => 11,
                "nombre" => "SANTAFE DE ANTIOQUIA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05042"
            ),
            array(
                "id" => 12,
                "nombre" => "ANZA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05044"
            ),
            array(
                "id" => 13,
                "nombre" => "APARTADO",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05045"
            ),
            array(
                "id" => 14,
                "nombre" => "ARBOLETES",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05051"
            ),
            array(
                "id" => 15,
                "nombre" => "ARGELIA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05055"
            ),
            array(
                "id" => 16,
                "nombre" => "ARMENIA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05059"
            ),
            array(
                "id" => 17,
                "nombre" => "BARBOSA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05079"
            ),
            array(
                "id" => 18,
                "nombre" => "BELMIRA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05086"
            ),
            array(
                "id" => 19,
                "nombre" => "BELLO",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05088"
            ),
            array(
                "id" => 20,
                "nombre" => "BETANIA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05091"
            ),
            array(
                "id" => 21,
                "nombre" => "BETULIA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05093"
            ),
            array(
                "id" => 22,
                "nombre" => "CIUDAD BOLIVAR",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05101"
            ),
            array(
                "id" => 23,
                "nombre" => "BRICEÑO",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05107"
            ),
            array(
                "id" => 24,
                "nombre" => "BURITICA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05113"
            ),
            array(
                "id" => 25,
                "nombre" => "CACERES",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05120"
            ),
            array(
                "id" => 26,
                "nombre" => "CAICEDO",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05125"
            ),
            array(
                "id" => 27,
                "nombre" => "CALDAS",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05129"
            ),
            array(
                "id" => 28,
                "nombre" => "CAMPAMENTO",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05134"
            ),
            array(
                "id" => 29,
                "nombre" => "CAÑASGORDAS",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05138"
            ),
            array(
                "id" => 30,
                "nombre" => "CARACOLI",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05142"
            ),
            array(
                "id" => 31,
                "nombre" => "CARAMANTA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05145"
            ),
            array(
                "id" => 32,
                "nombre" => "CAREPA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05147"
            ),
            array(
                "id" => 33,
                "nombre" => "EL CARMEN DE VIBORAL",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05148"
            ),
            array(
                "id" => 34,
                "nombre" => "CAROLINA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05150"
            ),
            array(
                "id" => 35,
                "nombre" => "CAUCASIA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05154"
            ),
            array(
                "id" => 36,
                "nombre" => "CHIGORODO",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05172"
            ),
            array(
                "id" => 37,
                "nombre" => "CISNEROS",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05190"
            ),
            array(
                "id" => 38,
                "nombre" => "COCORNA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05197"
            ),
            array(
                "id" => 39,
                "nombre" => "CONCEPCION",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05206"
            ),
            array(
                "id" => 40,
                "nombre" => "CONCORDIA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05209"
            ),
            array(
                "id" => 41,
                "nombre" => "COPACABANA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05212"
            ),
            array(
                "id" => 42,
                "nombre" => "DABEIBA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05234"
            ),
            array(
                "id" => 43,
                "nombre" => "DON MATIAS",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05237"
            ),
            array(
                "id" => 44,
                "nombre" => "EBEJICO",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05240"
            ),
            array(
                "id" => 45,
                "nombre" => "EL BAGRE",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05250"
            ),
            array(
                "id" => 46,
                "nombre" => "ENTRERRIOS",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05264"
            ),
            array(
                "id" => 47,
                "nombre" => "ENVIGADO",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05266"
            ),
            array(
                "id" => 48,
                "nombre" => "FREDONIA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05282"
            ),
            array(
                "id" => 49,
                "nombre" => "FRONTINO",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05284"
            ),
            array(
                "id" => 50,
                "nombre" => "GIRALDO",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05306"
            ),
            array(
                "id" => 51,
                "nombre" => "GIRARDOTA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05308"
            ),
            array(
                "id" => 52,
                "nombre" => "GOMEZ PLATA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05310"
            ),
            array(
                "id" => 53,
                "nombre" => "GRANADA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05313"
            ),
            array(
                "id" => 54,
                "nombre" => "GUADALUPE",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05315"
            ),
            array(
                "id" => 55,
                "nombre" => "GUARNE",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05318"
            ),
            array(
                "id" => 56,
                "nombre" => "GUATAPE",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05321"
            ),
            array(
                "id" => 57,
                "nombre" => "HELICONIA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05347"
            ),
            array(
                "id" => 58,
                "nombre" => "HISPANIA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05353"
            ),
            array(
                "id" => 59,
                "nombre" => "ITAGUI",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05360"
            ),
            array(
                "id" => 60,
                "nombre" => "ITUANGO",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05361"
            ),
            array(
                "id" => 61,
                "nombre" => "JARDIN",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05364"
            ),
            array(
                "id" => 62,
                "nombre" => "JERICO",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05368"
            ),
            array(
                "id" => 63,
                "nombre" => "LA CEJA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05376"
            ),
            array(
                "id" => 64,
                "nombre" => "LA ESTRELLA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05380"
            ),
            array(
                "id" => 65,
                "nombre" => "LA PINTADA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05390"
            ),
            array(
                "id" => 66,
                "nombre" => "LA UNION",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05400"
            ),
            array(
                "id" => 67,
                "nombre" => "LIBORINA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05411"
            ),
            array(
                "id" => 68,
                "nombre" => "MACEO",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05425"
            ),
            array(
                "id" => 69,
                "nombre" => "MARINILLA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05440"
            ),
            array(
                "id" => 70,
                "nombre" => "MONTEBELLO",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05467"
            ),
            array(
                "id" => 71,
                "nombre" => "MURINDO",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05475"
            ),
            array(
                "id" => 72,
                "nombre" => "MUTATA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05480"
            ),
            array(
                "id" => 73,
                "nombre" => "NARIÑO",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05483"
            ),
            array(
                "id" => 74,
                "nombre" => "NECOCLI",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05490"
            ),
            array(
                "id" => 75,
                "nombre" => "NECHI",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05495"
            ),
            array(
                "id" => 76,
                "nombre" => "OLAYA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05501"
            ),
            array(
                "id" => 77,
                "nombre" => "PEÑOL",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05541"
            ),
            array(
                "id" => 78,
                "nombre" => "PEQUE",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05543"
            ),
            array(
                "id" => 79,
                "nombre" => "PUEBLORRICO",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05576"
            ),
            array(
                "id" => 80,
                "nombre" => "PUERTO BERRIO",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05579"
            ),
            array(
                "id" => 81,
                "nombre" => "PUERTO NARE",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05585"
            ),
            array(
                "id" => 82,
                "nombre" => "PUERTO TRIUNFO",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05591"
            ),
            array(
                "id" => 83,
                "nombre" => "REMEDIOS",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05604"
            ),
            array(
                "id" => 84,
                "nombre" => "RETIRO",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05607"
            ),
            array(
                "id" => 85,
                "nombre" => "RIONEGRO",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05615"
            ),
            array(
                "id" => 86,
                "nombre" => "SABANALARGA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05628"
            ),
            array(
                "id" => 87,
                "nombre" => "SABANETA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05631"
            ),
            array(
                "id" => 88,
                "nombre" => "SALGAR",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05642"
            ),
            array(
                "id" => 89,
                "nombre" => "SAN ANDRES DE CUERQUIA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05647"
            ),
            array(
                "id" => 90,
                "nombre" => "SAN CARLOS",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05649"
            ),
            array(
                "id" => 91,
                "nombre" => "SAN FRANCISCO",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05652"
            ),
            array(
                "id" => 92,
                "nombre" => "SAN JERONIMO",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05656"
            ),
            array(
                "id" => 93,
                "nombre" => "SAN JOSE DE LA MONTAÑA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05658"
            ),
            array(
                "id" => 94,
                "nombre" => "SAN JUAN DE URABA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05659"
            ),
            array(
                "id" => 95,
                "nombre" => "SAN LUIS",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05660"
            ),
            array(
                "id" => 96,
                "nombre" => "SAN PEDRO",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05664"
            ),
            array(
                "id" => 97,
                "nombre" => "SAN PEDRO DE URABA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05665"
            ),
            array(
                "id" => 98,
                "nombre" => "SAN RAFAEL",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05667"
            ),
            array(
                "id" => 99,
                "nombre" => "SAN ROQUE",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05670"
            ),
            array(
                "id" => 100,
                "nombre" => "SAN VICENTE",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05674"
            ),
            array(
                "id" => 101,
                "nombre" => "SANTA BARBARA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05679"
            ),
            array(
                "id" => 102,
                "nombre" => "SANTA ROSA DE OSOS",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05686"
            ),
            array(
                "id" => 103,
                "nombre" => "SANTO DOMINGO",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05690"
            ),
            array(
                "id" => 104,
                "nombre" => "EL SANTUARIO",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05697"
            ),
            array(
                "id" => 105,
                "nombre" => "SEGOVIA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05736"
            ),
            array(
                "id" => 106,
                "nombre" => "SONSON",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05756"
            ),
            array(
                "id" => 107,
                "nombre" => "SOPETRAN",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05761"
            ),
            array(
                "id" => 108,
                "nombre" => "TAMESIS",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05789"
            ),
            array(
                "id" => 109,
                "nombre" => "TARAZA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05790"
            ),
            array(
                "id" => 110,
                "nombre" => "TARSO",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05792"
            ),
            array(
                "id" => 111,
                "nombre" => "TITIRIBI",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05809"
            ),
            array(
                "id" => 112,
                "nombre" => "TOLEDO",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05819"
            ),
            array(
                "id" => 113,
                "nombre" => "TURBO",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05837"
            ),
            array(
                "id" => 114,
                "nombre" => "URAMITA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05842"
            ),
            array(
                "id" => 115,
                "nombre" => "URRAO",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05847"
            ),
            array(
                "id" => 116,
                "nombre" => "VALDIVIA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05854"
            ),
            array(
                "id" => 117,
                "nombre" => "VALPARAISO",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05856"
            ),
            array(
                "id" => 118,
                "nombre" => "VEGACHI",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05858"
            ),
            array(
                "id" => 119,
                "nombre" => "VENECIA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05861"
            ),
            array(
                "id" => 120,
                "nombre" => "VIGIA DEL FUERTE",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05873"
            ),
            array(
                "id" => 121,
                "nombre" => "YALI",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05885"
            ),
            array(
                "id" => 122,
                "nombre" => "YARUMAL",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05887"
            ),
            array(
                "id" => 123,
                "nombre" => "YOLOMBO",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05890"
            ),
            array(
                "id" => 124,
                "nombre" => "YONDO",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05893"
            ),
            array(
                "id" => 125,
                "nombre" => "ZARAGOZA",
                "departamento_id" => 2,
                "estado" => 1,
                "codigo_dane" => "05895"
            ),
            array(
                "id" => 126,
                "nombre" => "BARRANQUILLA",
                "departamento_id" => 4,
                "estado" => 1,
                "codigo_dane" => "08001"
            ),
            array(
                "id" => 127,
                "nombre" => "BARANOA",
                "departamento_id" => 4,
                "estado" => 1,
                "codigo_dane" => "08078"
            ),
            array(
                "id" => 128,
                "nombre" => "CAMPO DE LA CRUZ",
                "departamento_id" => 4,
                "estado" => 1,
                "codigo_dane" => "08137"
            ),
            array(
                "id" => 129,
                "nombre" => "CANDELARIA",
                "departamento_id" => 4,
                "estado" => 1,
                "codigo_dane" => "08141"
            ),
            array(
                "id" => 130,
                "nombre" => "GALAPA",
                "departamento_id" => 4,
                "estado" => 1,
                "codigo_dane" => "08296"
            ),
            array(
                "id" => 131,
                "nombre" => "JUAN DE ACOSTA",
                "departamento_id" => 4,
                "estado" => 1,
                "codigo_dane" => "08372"
            ),
            array(
                "id" => 132,
                "nombre" => "LURUACO",
                "departamento_id" => 4,
                "estado" => 1,
                "codigo_dane" => "08421"
            ),
            array(
                "id" => 133,
                "nombre" => "MALAMBO",
                "departamento_id" => 4,
                "estado" => 1,
                "codigo_dane" => "08433"
            ),
            array(
                "id" => 134,
                "nombre" => "MANATI",
                "departamento_id" => 4,
                "estado" => 1,
                "codigo_dane" => "08436"
            ),
            array(
                "id" => 135,
                "nombre" => "PALMAR DE VARELA",
                "departamento_id" => 4,
                "estado" => 1,
                "codigo_dane" => "08520"
            ),
            array(
                "id" => 136,
                "nombre" => "PIOJO",
                "departamento_id" => 4,
                "estado" => 1,
                "codigo_dane" => "08549"
            ),
            array(
                "id" => 137,
                "nombre" => "POLONUEVO",
                "departamento_id" => 4,
                "estado" => 1,
                "codigo_dane" => "08558"
            ),
            array(
                "id" => 138,
                "nombre" => "PONEDERA",
                "departamento_id" => 4,
                "estado" => 1,
                "codigo_dane" => "08560"
            ),
            array(
                "id" => 139,
                "nombre" => "PUERTO COLOMBIA",
                "departamento_id" => 4,
                "estado" => 1,
                "codigo_dane" => "08573"
            ),
            array(
                "id" => 140,
                "nombre" => "REPELON",
                "departamento_id" => 4,
                "estado" => 1,
                "codigo_dane" => "08606"
            ),
            array(
                "id" => 141,
                "nombre" => "SABANAGRANDE",
                "departamento_id" => 4,
                "estado" => 1,
                "codigo_dane" => "08634"
            ),
            array(
                "id" => 142,
                "nombre" => "SABANALARGA",
                "departamento_id" => 4,
                "estado" => 1,
                "codigo_dane" => "08638"
            ),
            array(
                "id" => 143,
                "nombre" => "SANTA LUCIA",
                "departamento_id" => 4,
                "estado" => 1,
                "codigo_dane" => "08675"
            ),
            array(
                "id" => 144,
                "nombre" => "SANTO TOMAS",
                "departamento_id" => 4,
                "estado" => 1,
                "codigo_dane" => "08685"
            ),
            array(
                "id" => 145,
                "nombre" => "SOLEDAD",
                "departamento_id" => 4,
                "estado" => 1,
                "codigo_dane" => "08758"
            ),
            array(
                "id" => 146,
                "nombre" => "SUAN",
                "departamento_id" => 4,
                "estado" => 1,
                "codigo_dane" => "08770"
            ),
            array(
                "id" => 147,
                "nombre" => "TUBARA",
                "departamento_id" => 4,
                "estado" => 1,
                "codigo_dane" => "08832"
            ),
            array(
                "id" => 148,
                "nombre" => "USIACURI",
                "departamento_id" => 4,
                "estado" => 1,
                "codigo_dane" => "08849"
            ),
            array(
                "id" => 149,
                "nombre" => "BOGOTA D.C.",
                "departamento_id" => 5,
                "estado" => 1,
                "codigo_dane" => "11001"
            ),
            array(
                "id" => 150,
                "nombre" => "CARTAGENA",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13001"
            ),
            array(
                "id" => 151,
                "nombre" => "ACHI",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13006"
            ),
            array(
                "id" => 152,
                "nombre" => "ALTOS DEL ROSARIO",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13030"
            ),
            array(
                "id" => 153,
                "nombre" => "ARENAL",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13042"
            ),
            array(
                "id" => 154,
                "nombre" => "ARJONA",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13052"
            ),
            array(
                "id" => 155,
                "nombre" => "ARROYOHONDO",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13062"
            ),
            array(
                "id" => 156,
                "nombre" => "BARRANCO DE LOBA",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13074"
            ),
            array(
                "id" => 157,
                "nombre" => "CALAMAR",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13140"
            ),
            array(
                "id" => 158,
                "nombre" => "CANTAGALLO",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13160"
            ),
            array(
                "id" => 159,
                "nombre" => "CICUCO",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13188"
            ),
            array(
                "id" => 160,
                "nombre" => "CORDOBA",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13212"
            ),
            array(
                "id" => 161,
                "nombre" => "CLEMENCIA",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13222"
            ),
            array(
                "id" => 162,
                "nombre" => "EL CARMEN DE BOLIVAR",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13244"
            ),
            array(
                "id" => 163,
                "nombre" => "EL GUAMO",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13248"
            ),
            array(
                "id" => 164,
                "nombre" => "EL PEÑON",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13268"
            ),
            array(
                "id" => 165,
                "nombre" => "HATILLO DE LOBA",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13300"
            ),
            array(
                "id" => 166,
                "nombre" => "MAGANGUE",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13430"
            ),
            array(
                "id" => 167,
                "nombre" => "MAHATES",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13433"
            ),
            array(
                "id" => 168,
                "nombre" => "MARGARITA",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13440"
            ),
            array(
                "id" => 169,
                "nombre" => "MARIA LA BAJA",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13442"
            ),
            array(
                "id" => 170,
                "nombre" => "MONTECRISTO",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13458"
            ),
            array(
                "id" => 171,
                "nombre" => "MOMPOS",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13468"
            ),
            array(
                "id" => 172,
                "nombre" => "MORALES",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13473"
            ),
            array(
                "id" => 173,
                "nombre" => "NOROSI",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13490"
            ),
            array(
                "id" => 174,
                "nombre" => "PINILLOS",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13549"
            ),
            array(
                "id" => 175,
                "nombre" => "REGIDOR",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13580"
            ),
            array(
                "id" => 176,
                "nombre" => "RIO VIEJO",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13600"
            ),
            array(
                "id" => 177,
                "nombre" => "SAN CRISTOBAL",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13620"
            ),
            array(
                "id" => 178,
                "nombre" => "SAN ESTANISLAO",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13647"
            ),
            array(
                "id" => 179,
                "nombre" => "SAN FERNANDO",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13650"
            ),
            array(
                "id" => 180,
                "nombre" => "SAN JACINTO",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13654"
            ),
            array(
                "id" => 181,
                "nombre" => "SAN JACINTO DEL CAUCA",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13655"
            ),
            array(
                "id" => 182,
                "nombre" => "SAN JUAN NEPOMUCENO",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13657"
            ),
            array(
                "id" => 183,
                "nombre" => "SAN MARTIN DE LOBA",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13667"
            ),
            array(
                "id" => 184,
                "nombre" => "SAN PABLO",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13670"
            ),
            array(
                "id" => 185,
                "nombre" => "SANTA CATALINA",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13673"
            ),
            array(
                "id" => 186,
                "nombre" => "SANTA ROSA",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13683"
            ),
            array(
                "id" => 187,
                "nombre" => "SANTA ROSA DEL SUR",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13688"
            ),
            array(
                "id" => 188,
                "nombre" => "SIMITI",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13744"
            ),
            array(
                "id" => 189,
                "nombre" => "SOPLAVIENTO",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13760"
            ),
            array(
                "id" => 190,
                "nombre" => "TALAIGUA NUEVO",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13780"
            ),
            array(
                "id" => 191,
                "nombre" => "TIQUISIO",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13810"
            ),
            array(
                "id" => 192,
                "nombre" => "TURBACO",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13836"
            ),
            array(
                "id" => 193,
                "nombre" => "TURBANA",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13838"
            ),
            array(
                "id" => 194,
                "nombre" => "VILLANUEVA",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13873"
            ),
            array(
                "id" => 195,
                "nombre" => "ZAMBRANO",
                "departamento_id" => 6,
                "estado" => 1,
                "codigo_dane" => "13894"
            ),
            array(
                "id" => 196,
                "nombre" => "TUNJA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15001"
            ),
            array(
                "id" => 197,
                "nombre" => "ALMEIDA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15022"
            ),
            array(
                "id" => 198,
                "nombre" => "AQUITANIA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15047"
            ),
            array(
                "id" => 199,
                "nombre" => "ARCABUCO",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15051"
            ),
            array(
                "id" => 200,
                "nombre" => "BELEN",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15087"
            ),
            array(
                "id" => 201,
                "nombre" => "BERBEO",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15090"
            ),
            array(
                "id" => 202,
                "nombre" => "BETEITIVA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15092"
            ),
            array(
                "id" => 203,
                "nombre" => "BOAVITA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15097"
            ),
            array(
                "id" => 204,
                "nombre" => "BOYACA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15104"
            ),
            array(
                "id" => 205,
                "nombre" => "BRICEÑO",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15106"
            ),
            array(
                "id" => 206,
                "nombre" => "BUENAVISTA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15109"
            ),
            array(
                "id" => 207,
                "nombre" => "BUSBANZA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15114"
            ),
            array(
                "id" => 208,
                "nombre" => "CALDAS",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15131"
            ),
            array(
                "id" => 209,
                "nombre" => "CAMPOHERMOSO",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15135"
            ),
            array(
                "id" => 210,
                "nombre" => "CERINZA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15162"
            ),
            array(
                "id" => 211,
                "nombre" => "CHINAVITA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15172"
            ),
            array(
                "id" => 212,
                "nombre" => "CHIQUINQUIRA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15176"
            ),
            array(
                "id" => 213,
                "nombre" => "CHISCAS",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15180"
            ),
            array(
                "id" => 214,
                "nombre" => "CHITA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15183"
            ),
            array(
                "id" => 215,
                "nombre" => "CHITARAQUE",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15185"
            ),
            array(
                "id" => 216,
                "nombre" => "CHIVATA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15187"
            ),
            array(
                "id" => 217,
                "nombre" => "CIENEGA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15189"
            ),
            array(
                "id" => 218,
                "nombre" => "COMBITA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15204"
            ),
            array(
                "id" => 219,
                "nombre" => "COPER",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15212"
            ),
            array(
                "id" => 220,
                "nombre" => "CORRALES",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15215"
            ),
            array(
                "id" => 221,
                "nombre" => "COVARACHIA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15218"
            ),
            array(
                "id" => 222,
                "nombre" => "CUBARA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15223"
            ),
            array(
                "id" => 223,
                "nombre" => "CUCAITA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15224"
            ),
            array(
                "id" => 224,
                "nombre" => "CUITIVA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15226"
            ),
            array(
                "id" => 225,
                "nombre" => "CHIQUIZA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15232"
            ),
            array(
                "id" => 226,
                "nombre" => "CHIVOR",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15236"
            ),
            array(
                "id" => 227,
                "nombre" => "DUITAMA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15238"
            ),
            array(
                "id" => 228,
                "nombre" => "EL COCUY",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15244"
            ),
            array(
                "id" => 229,
                "nombre" => "EL ESPINO",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15248"
            ),
            array(
                "id" => 230,
                "nombre" => "FIRAVITOBA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15272"
            ),
            array(
                "id" => 231,
                "nombre" => "FLORESTA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15276"
            ),
            array(
                "id" => 232,
                "nombre" => "GACHANTIVA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15293"
            ),
            array(
                "id" => 233,
                "nombre" => "GAMEZA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15296"
            ),
            array(
                "id" => 234,
                "nombre" => "GARAGOA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15299"
            ),
            array(
                "id" => 235,
                "nombre" => "GUACAMAYAS",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15317"
            ),
            array(
                "id" => 236,
                "nombre" => "GUATEQUE",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15322"
            ),
            array(
                "id" => 237,
                "nombre" => "GUAYATA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15325"
            ),
            array(
                "id" => 238,
                "nombre" => "GÜICAN",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15332"
            ),
            array(
                "id" => 239,
                "nombre" => "IZA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15362"
            ),
            array(
                "id" => 240,
                "nombre" => "JENESANO",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15367"
            ),
            array(
                "id" => 241,
                "nombre" => "JERICO",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15368"
            ),
            array(
                "id" => 242,
                "nombre" => "LABRANZAGRANDE",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15377"
            ),
            array(
                "id" => 243,
                "nombre" => "LA CAPILLA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15380"
            ),
            array(
                "id" => 244,
                "nombre" => "LA VICTORIA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15401"
            ),
            array(
                "id" => 245,
                "nombre" => "LA UVITA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15403"
            ),
            array(
                "id" => 246,
                "nombre" => "VILLA DE LEYVA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15407"
            ),
            array(
                "id" => 247,
                "nombre" => "MACANAL",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15425"
            ),
            array(
                "id" => 248,
                "nombre" => "MARIPI",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15442"
            ),
            array(
                "id" => 249,
                "nombre" => "MIRAFLORES",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15455"
            ),
            array(
                "id" => 250,
                "nombre" => "MONGUA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15464"
            ),
            array(
                "id" => 251,
                "nombre" => "MONGUI",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15466"
            ),
            array(
                "id" => 252,
                "nombre" => "MONIQUIRA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15469"
            ),
            array(
                "id" => 253,
                "nombre" => "MOTAVITA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15476"
            ),
            array(
                "id" => 254,
                "nombre" => "MUZO",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15480"
            ),
            array(
                "id" => 255,
                "nombre" => "NOBSA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15491"
            ),
            array(
                "id" => 256,
                "nombre" => "NUEVO COLON",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15494"
            ),
            array(
                "id" => 257,
                "nombre" => "OICATA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15500"
            ),
            array(
                "id" => 258,
                "nombre" => "OTANCHE",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15507"
            ),
            array(
                "id" => 259,
                "nombre" => "PACHAVITA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15511"
            ),
            array(
                "id" => 260,
                "nombre" => "PAEZ",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15514"
            ),
            array(
                "id" => 261,
                "nombre" => "PAIPA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15516"
            ),
            array(
                "id" => 262,
                "nombre" => "PAJARITO",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15518"
            ),
            array(
                "id" => 263,
                "nombre" => "PANQUEBA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15522"
            ),
            array(
                "id" => 264,
                "nombre" => "PAUNA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15531"
            ),
            array(
                "id" => 265,
                "nombre" => "PAYA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15533"
            ),
            array(
                "id" => 266,
                "nombre" => "PAZ DE RIO",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15537"
            ),
            array(
                "id" => 267,
                "nombre" => "PESCA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15542"
            ),
            array(
                "id" => 268,
                "nombre" => "PISBA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15550"
            ),
            array(
                "id" => 269,
                "nombre" => "PUERTO BOYACA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15572"
            ),
            array(
                "id" => 270,
                "nombre" => "QUIPAMA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15580"
            ),
            array(
                "id" => 271,
                "nombre" => "RAMIRIQUI",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15599"
            ),
            array(
                "id" => 272,
                "nombre" => "RAQUIRA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15600"
            ),
            array(
                "id" => 273,
                "nombre" => "RONDON",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15621"
            ),
            array(
                "id" => 274,
                "nombre" => "SABOYA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15632"
            ),
            array(
                "id" => 275,
                "nombre" => "SACHICA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15638"
            ),
            array(
                "id" => 276,
                "nombre" => "SAMACA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15646"
            ),
            array(
                "id" => 277,
                "nombre" => "SAN EDUARDO",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15660"
            ),
            array(
                "id" => 278,
                "nombre" => "SAN JOSE DE PARE",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15664"
            ),
            array(
                "id" => 279,
                "nombre" => "SAN LUIS DE GACENO",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15667"
            ),
            array(
                "id" => 280,
                "nombre" => "SAN MATEO",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15673"
            ),
            array(
                "id" => 281,
                "nombre" => "SAN MIGUEL DE SEMA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15676"
            ),
            array(
                "id" => 282,
                "nombre" => "SAN PABLO DE BORBUR",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15681"
            ),
            array(
                "id" => 283,
                "nombre" => "SANTANA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15686"
            ),
            array(
                "id" => 284,
                "nombre" => "SANTA MARIA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15690"
            ),
            array(
                "id" => 285,
                "nombre" => "SANTA ROSA DE VITERBO",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15693"
            ),
            array(
                "id" => 286,
                "nombre" => "SANTA SOFIA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15696"
            ),
            array(
                "id" => 287,
                "nombre" => "SATIVANORTE",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15720"
            ),
            array(
                "id" => 288,
                "nombre" => "SATIVASUR",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15723"
            ),
            array(
                "id" => 289,
                "nombre" => "SIACHOQUE",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15740"
            ),
            array(
                "id" => 290,
                "nombre" => "SOATA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15753"
            ),
            array(
                "id" => 291,
                "nombre" => "SOCOTA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15755"
            ),
            array(
                "id" => 292,
                "nombre" => "SOCHA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15757"
            ),
            array(
                "id" => 293,
                "nombre" => "SOGAMOSO",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15759"
            ),
            array(
                "id" => 294,
                "nombre" => "SOMONDOCO",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15761"
            ),
            array(
                "id" => 295,
                "nombre" => "SORA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15762"
            ),
            array(
                "id" => 296,
                "nombre" => "SOTAQUIRA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15763"
            ),
            array(
                "id" => 297,
                "nombre" => "SORACA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15764"
            ),
            array(
                "id" => 298,
                "nombre" => "SUSACON",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15774"
            ),
            array(
                "id" => 299,
                "nombre" => "SUTAMARCHAN",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15776"
            ),
            array(
                "id" => 300,
                "nombre" => "SUTATENZA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15778"
            ),
            array(
                "id" => 301,
                "nombre" => "TASCO",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15790"
            ),
            array(
                "id" => 302,
                "nombre" => "TENZA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15798"
            ),
            array(
                "id" => 303,
                "nombre" => "TIBANA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15804"
            ),
            array(
                "id" => 304,
                "nombre" => "TIBASOSA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15806"
            ),
            array(
                "id" => 305,
                "nombre" => "TINJACA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15808"
            ),
            array(
                "id" => 306,
                "nombre" => "TIPACOQUE",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15810"
            ),
            array(
                "id" => 307,
                "nombre" => "TOCA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15814"
            ),
            array(
                "id" => 308,
                "nombre" => "TOGÜI",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15816"
            ),
            array(
                "id" => 309,
                "nombre" => "TOPAGA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15820"
            ),
            array(
                "id" => 310,
                "nombre" => "TOTA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15822"
            ),
            array(
                "id" => 311,
                "nombre" => "TUNUNGUA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15832"
            ),
            array(
                "id" => 312,
                "nombre" => "TURMEQUE",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15835"
            ),
            array(
                "id" => 313,
                "nombre" => "TUTA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15837"
            ),
            array(
                "id" => 314,
                "nombre" => "TUTAZA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15839"
            ),
            array(
                "id" => 315,
                "nombre" => "UMBITA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15842"
            ),
            array(
                "id" => 316,
                "nombre" => "VENTAQUEMADA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15861"
            ),
            array(
                "id" => 317,
                "nombre" => "VIRACACHA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15879"
            ),
            array(
                "id" => 318,
                "nombre" => "ZETAQUIRA",
                "departamento_id" => 7,
                "estado" => 1,
                "codigo_dane" => "15897"
            ),
            array(
                "id" => 319,
                "nombre" => "MANIZALES",
                "departamento_id" => 8,
                "estado" => 1,
                "codigo_dane" => "17001"
            ),
            array(
                "id" => 320,
                "nombre" => "AGUADAS",
                "departamento_id" => 8,
                "estado" => 1,
                "codigo_dane" => "17013"
            ),
            array(
                "id" => 321,
                "nombre" => "ANSERMA",
                "departamento_id" => 8,
                "estado" => 1,
                "codigo_dane" => "17042"
            ),
            array(
                "id" => 322,
                "nombre" => "ARANZAZU",
                "departamento_id" => 8,
                "estado" => 1,
                "codigo_dane" => "17050"
            ),
            array(
                "id" => 323,
                "nombre" => "BELALCAZAR",
                "departamento_id" => 8,
                "estado" => 1,
                "codigo_dane" => "17088"
            ),
            array(
                "id" => 324,
                "nombre" => "CHINCHINA",
                "departamento_id" => 8,
                "estado" => 1,
                "codigo_dane" => "17174"
            ),
            array(
                "id" => 325,
                "nombre" => "FILADELFIA",
                "departamento_id" => 8,
                "estado" => 1,
                "codigo_dane" => "17272"
            ),
            array(
                "id" => 326,
                "nombre" => "LA DORADA",
                "departamento_id" => 8,
                "estado" => 1,
                "codigo_dane" => "17380"
            ),
            array(
                "id" => 327,
                "nombre" => "LA MERCED",
                "departamento_id" => 8,
                "estado" => 1,
                "codigo_dane" => "17388"
            ),
            array(
                "id" => 328,
                "nombre" => "MANZANARES",
                "departamento_id" => 8,
                "estado" => 1,
                "codigo_dane" => "17433"
            ),
            array(
                "id" => 329,
                "nombre" => "MARMATO",
                "departamento_id" => 8,
                "estado" => 1,
                "codigo_dane" => "17442"
            ),
            array(
                "id" => 330,
                "nombre" => "MARQUETALIA",
                "departamento_id" => 8,
                "estado" => 1,
                "codigo_dane" => "17444"
            ),
            array(
                "id" => 331,
                "nombre" => "MARULANDA",
                "departamento_id" => 8,
                "estado" => 1,
                "codigo_dane" => "17446"
            ),
            array(
                "id" => 332,
                "nombre" => "NEIRA",
                "departamento_id" => 8,
                "estado" => 1,
                "codigo_dane" => "17486"
            ),
            array(
                "id" => 333,
                "nombre" => "NORCASIA",
                "departamento_id" => 8,
                "estado" => 1,
                "codigo_dane" => "17495"
            ),
            array(
                "id" => 334,
                "nombre" => "PACORA",
                "departamento_id" => 8,
                "estado" => 1,
                "codigo_dane" => "17513"
            ),
            array(
                "id" => 335,
                "nombre" => "PALESTINA",
                "departamento_id" => 8,
                "estado" => 1,
                "codigo_dane" => "17524"
            ),
            array(
                "id" => 336,
                "nombre" => "PENSILVANIA",
                "departamento_id" => 8,
                "estado" => 1,
                "codigo_dane" => "17541"
            ),
            array(
                "id" => 337,
                "nombre" => "RIOSUCIO",
                "departamento_id" => 8,
                "estado" => 1,
                "codigo_dane" => "17614"
            ),
            array(
                "id" => 338,
                "nombre" => "RISARALDA",
                "departamento_id" => 8,
                "estado" => 1,
                "codigo_dane" => "17616"
            ),
            array(
                "id" => 339,
                "nombre" => "SALAMINA",
                "departamento_id" => 8,
                "estado" => 1,
                "codigo_dane" => "17653"
            ),
            array(
                "id" => 340,
                "nombre" => "SAMANA",
                "departamento_id" => 8,
                "estado" => 1,
                "codigo_dane" => "17662"
            ),
            array(
                "id" => 341,
                "nombre" => "SAN JOSE",
                "departamento_id" => 8,
                "estado" => 1,
                "codigo_dane" => "17665"
            ),
            array(
                "id" => 342,
                "nombre" => "SUPIA",
                "departamento_id" => 8,
                "estado" => 1,
                "codigo_dane" => "17777"
            ),
            array(
                "id" => 343,
                "nombre" => "VICTORIA",
                "departamento_id" => 8,
                "estado" => 1,
                "codigo_dane" => "17867"
            ),
            array(
                "id" => 344,
                "nombre" => "VILLAMARIA",
                "departamento_id" => 8,
                "estado" => 1,
                "codigo_dane" => "17873"
            ),
            array(
                "id" => 345,
                "nombre" => "VITERBO",
                "departamento_id" => 8,
                "estado" => 1,
                "codigo_dane" => "17877"
            ),
            array(
                "id" => 346,
                "nombre" => "FLORENCIA",
                "departamento_id" => 9,
                "estado" => 1,
                "codigo_dane" => "18001"
            ),
            array(
                "id" => 347,
                "nombre" => "ALBANIA",
                "departamento_id" => 9,
                "estado" => 1,
                "codigo_dane" => "18029"
            ),
            array(
                "id" => 348,
                "nombre" => "BELEN DE LOS ANDAQUIES",
                "departamento_id" => 9,
                "estado" => 1,
                "codigo_dane" => "18094"
            ),
            array(
                "id" => 349,
                "nombre" => "CARTAGENA DEL CHAIRA",
                "departamento_id" => 9,
                "estado" => 1,
                "codigo_dane" => "18150"
            ),
            array(
                "id" => 350,
                "nombre" => "CURILLO",
                "departamento_id" => 9,
                "estado" => 1,
                "codigo_dane" => "18205"
            ),
            array(
                "id" => 351,
                "nombre" => "EL DONCELLO",
                "departamento_id" => 9,
                "estado" => 1,
                "codigo_dane" => "18247"
            ),
            array(
                "id" => 352,
                "nombre" => "EL PAUJIL",
                "departamento_id" => 9,
                "estado" => 1,
                "codigo_dane" => "18256"
            ),
            array(
                "id" => 353,
                "nombre" => "LA MONTAÑITA",
                "departamento_id" => 9,
                "estado" => 1,
                "codigo_dane" => "18410"
            ),
            array(
                "id" => 354,
                "nombre" => "MILAN",
                "departamento_id" => 9,
                "estado" => 1,
                "codigo_dane" => "18460"
            ),
            array(
                "id" => 355,
                "nombre" => "MORELIA",
                "departamento_id" => 9,
                "estado" => 1,
                "codigo_dane" => "18479"
            ),
            array(
                "id" => 356,
                "nombre" => "PUERTO RICO",
                "departamento_id" => 9,
                "estado" => 1,
                "codigo_dane" => "18592"
            ),
            array(
                "id" => 357,
                "nombre" => "SAN JOSE DEL FRAGUA",
                "departamento_id" => 9,
                "estado" => 1,
                "codigo_dane" => "18610"
            ),
            array(
                "id" => 358,
                "nombre" => "SAN VICENTE DEL CAGUAN",
                "departamento_id" => 9,
                "estado" => 1,
                "codigo_dane" => "18753"
            ),
            array(
                "id" => 359,
                "nombre" => "SOLANO",
                "departamento_id" => 9,
                "estado" => 1,
                "codigo_dane" => "18756"
            ),
            array(
                "id" => 360,
                "nombre" => "SOLITA",
                "departamento_id" => 9,
                "estado" => 1,
                "codigo_dane" => "18785"
            ),
            array(
                "id" => 361,
                "nombre" => "VALPARAISO",
                "departamento_id" => 9,
                "estado" => 1,
                "codigo_dane" => "18860"
            ),
            array(
                "id" => 362,
                "nombre" => "POPAYAN",
                "departamento_id" => 11,
                "estado" => 1,
                "codigo_dane" => "19001"
            ),
            array(
                "id" => 363,
                "nombre" => "ALMAGUER",
                "departamento_id" => 11,
                "estado" => 1,
                "codigo_dane" => "19022"
            ),
            array(
                "id" => 364,
                "nombre" => "ARGELIA",
                "departamento_id" => 11,
                "estado" => 1,
                "codigo_dane" => "19050"
            ),
            array(
                "id" => 365,
                "nombre" => "BALBOA",
                "departamento_id" => 11,
                "estado" => 1,
                "codigo_dane" => "19075"
            ),
            array(
                "id" => 366,
                "nombre" => "BOLIVAR",
                "departamento_id" => 11,
                "estado" => 1,
                "codigo_dane" => "19100"
            ),
            array(
                "id" => 367,
                "nombre" => "BUENOS AIRES",
                "departamento_id" => 11,
                "estado" => 1,
                "codigo_dane" => "19110"
            ),
            array(
                "id" => 368,
                "nombre" => "CAJIBIO",
                "departamento_id" => 11,
                "estado" => 1,
                "codigo_dane" => "19130"
            ),
            array(
                "id" => 369,
                "nombre" => "CALDONO",
                "departamento_id" => 11,
                "estado" => 1,
                "codigo_dane" => "19137"
            ),
            array(
                "id" => 370,
                "nombre" => "CALOTO",
                "departamento_id" => 11,
                "estado" => 1,
                "codigo_dane" => "19142"
            ),
            array(
                "id" => 371,
                "nombre" => "CORINTO",
                "departamento_id" => 11,
                "estado" => 1,
                "codigo_dane" => "19212"
            ),
            array(
                "id" => 372,
                "nombre" => "EL TAMBO",
                "departamento_id" => 11,
                "estado" => 1,
                "codigo_dane" => "19256"
            ),
            array(
                "id" => 373,
                "nombre" => "FLORENCIA",
                "departamento_id" => 11,
                "estado" => 1,
                "codigo_dane" => "19290"
            ),
            array(
                "id" => 374,
                "nombre" => "GUACHENE",
                "departamento_id" => 11,
                "estado" => 1,
                "codigo_dane" => "19300"
            ),
            array(
                "id" => 375,
                "nombre" => "GUAPI",
                "departamento_id" => 11,
                "estado" => 1,
                "codigo_dane" => "19318"
            ),
            array(
                "id" => 376,
                "nombre" => "INZA",
                "departamento_id" => 11,
                "estado" => 1,
                "codigo_dane" => "19355"
            ),
            array(
                "id" => 377,
                "nombre" => "JAMBALO",
                "departamento_id" => 11,
                "estado" => 1,
                "codigo_dane" => "19364"
            ),
            array(
                "id" => 378,
                "nombre" => "LA SIERRA",
                "departamento_id" => 11,
                "estado" => 1,
                "codigo_dane" => "19392"
            ),
            array(
                "id" => 379,
                "nombre" => "LA VEGA",
                "departamento_id" => 11,
                "estado" => 1,
                "codigo_dane" => "19397"
            ),
            array(
                "id" => 380,
                "nombre" => "LOPEZ",
                "departamento_id" => 11,
                "estado" => 1,
                "codigo_dane" => "19418"
            ),
            array(
                "id" => 381,
                "nombre" => "MERCADERES",
                "departamento_id" => 11,
                "estado" => 1,
                "codigo_dane" => "19450"
            ),
            array(
                "id" => 382,
                "nombre" => "MIRANDA",
                "departamento_id" => 11,
                "estado" => 1,
                "codigo_dane" => "19455"
            ),
            array(
                "id" => 383,
                "nombre" => "MORALES",
                "departamento_id" => 11,
                "estado" => 1,
                "codigo_dane" => "19473"
            ),
            array(
                "id" => 384,
                "nombre" => "PADILLA",
                "departamento_id" => 11,
                "estado" => 1,
                "codigo_dane" => "19513"
            ),
            array(
                "id" => 385,
                "nombre" => "PAEZ",
                "departamento_id" => 11,
                "estado" => 1,
                "codigo_dane" => "19517"
            ),
            array(
                "id" => 386,
                "nombre" => "PATIA",
                "departamento_id" => 11,
                "estado" => 1,
                "codigo_dane" => "19532"
            ),
            array(
                "id" => 387,
                "nombre" => "PIAMONTE",
                "departamento_id" => 11,
                "estado" => 1,
                "codigo_dane" => "19533"
            ),
            array(
                "id" => 388,
                "nombre" => "PIENDAMO",
                "departamento_id" => 11,
                "estado" => 1,
                "codigo_dane" => "19548"
            ),
            array(
                "id" => 389,
                "nombre" => "PUERTO TEJADA",
                "departamento_id" => 11,
                "estado" => 1,
                "codigo_dane" => "19573"
            ),
            array(
                "id" => 390,
                "nombre" => "PURACE",
                "departamento_id" => 11,
                "estado" => 1,
                "codigo_dane" => "19585"
            ),
            array(
                "id" => 391,
                "nombre" => "ROSAS",
                "departamento_id" => 11,
                "estado" => 1,
                "codigo_dane" => "19622"
            ),
            array(
                "id" => 392,
                "nombre" => "SAN SEBASTIAN",
                "departamento_id" => 11,
                "estado" => 1,
                "codigo_dane" => "19693"
            ),
            array(
                "id" => 393,
                "nombre" => "SANTANDER DE QUILICHAO",
                "departamento_id" => 11,
                "estado" => 1,
                "codigo_dane" => "19698"
            ),
            array(
                "id" => 394,
                "nombre" => "SANTA ROSA",
                "departamento_id" => 11,
                "estado" => 1,
                "codigo_dane" => "19701"
            ),
            array(
                "id" => 395,
                "nombre" => "SILVIA",
                "departamento_id" => 11,
                "estado" => 1,
                "codigo_dane" => "19743"
            ),
            array(
                "id" => 396,
                "nombre" => "SOTARA",
                "departamento_id" => 11,
                "estado" => 1,
                "codigo_dane" => "19760"
            ),
            array(
                "id" => 397,
                "nombre" => "SUAREZ",
                "departamento_id" => 11,
                "estado" => 1,
                "codigo_dane" => "19780"
            ),
            array(
                "id" => 398,
                "nombre" => "SUCRE",
                "departamento_id" => 11,
                "estado" => 1,
                "codigo_dane" => "19785"
            ),
            array(
                "id" => 399,
                "nombre" => "TIMBIO",
                "departamento_id" => 11,
                "estado" => 1,
                "codigo_dane" => "19807"
            ),
            array(
                "id" => 400,
                "nombre" => "TIMBIQUI",
                "departamento_id" => 11,
                "estado" => 1,
                "codigo_dane" => "19809"
            ),
            array(
                "id" => 401,
                "nombre" => "TORIBIO",
                "departamento_id" => 11,
                "estado" => 1,
                "codigo_dane" => "19821"
            ),
            array(
                "id" => 402,
                "nombre" => "TOTORO",
                "departamento_id" => 11,
                "estado" => 1,
                "codigo_dane" => "19824"
            ),
            array(
                "id" => 403,
                "nombre" => "VILLA RICA",
                "departamento_id" => 11,
                "estado" => 1,
                "codigo_dane" => "19845"
            ),
            array(
                "id" => 404,
                "nombre" => "VALLEDUPAR",
                "departamento_id" => 12,
                "estado" => 1,
                "codigo_dane" => "20001"
            ),
            array(
                "id" => 405,
                "nombre" => "AGUACHICA",
                "departamento_id" => 12,
                "estado" => 1,
                "codigo_dane" => "20011"
            ),
            array(
                "id" => 406,
                "nombre" => "AGUSTIN CODAZZI",
                "departamento_id" => 12,
                "estado" => 1,
                "codigo_dane" => "20013"
            ),
            array(
                "id" => 407,
                "nombre" => "ASTREA",
                "departamento_id" => 12,
                "estado" => 1,
                "codigo_dane" => "20032"
            ),
            array(
                "id" => 408,
                "nombre" => "BECERRIL",
                "departamento_id" => 12,
                "estado" => 1,
                "codigo_dane" => "20045"
            ),
            array(
                "id" => 409,
                "nombre" => "BOSCONIA",
                "departamento_id" => 12,
                "estado" => 1,
                "codigo_dane" => "20060"
            ),
            array(
                "id" => 410,
                "nombre" => "CHIMICHAGUA",
                "departamento_id" => 12,
                "estado" => 1,
                "codigo_dane" => "20175"
            ),
            array(
                "id" => 411,
                "nombre" => "CHIRIGUANA",
                "departamento_id" => 12,
                "estado" => 1,
                "codigo_dane" => "20178"
            ),
            array(
                "id" => 412,
                "nombre" => "CURUMANI",
                "departamento_id" => 12,
                "estado" => 1,
                "codigo_dane" => "20228"
            ),
            array(
                "id" => 413,
                "nombre" => "EL COPEY",
                "departamento_id" => 12,
                "estado" => 1,
                "codigo_dane" => "20238"
            ),
            array(
                "id" => 414,
                "nombre" => "EL PASO",
                "departamento_id" => 12,
                "estado" => 1,
                "codigo_dane" => "20250"
            ),
            array(
                "id" => 415,
                "nombre" => "GAMARRA",
                "departamento_id" => 12,
                "estado" => 1,
                "codigo_dane" => "20295"
            ),
            array(
                "id" => 416,
                "nombre" => "GONZALEZ",
                "departamento_id" => 12,
                "estado" => 1,
                "codigo_dane" => "20310"
            ),
            array(
                "id" => 417,
                "nombre" => "LA GLORIA",
                "departamento_id" => 12,
                "estado" => 1,
                "codigo_dane" => "20383"
            ),
            array(
                "id" => 418,
                "nombre" => "LA JAGUA DE IBIRICO",
                "departamento_id" => 12,
                "estado" => 1,
                "codigo_dane" => "20400"
            ),
            array(
                "id" => 419,
                "nombre" => "MANAURE",
                "departamento_id" => 12,
                "estado" => 1,
                "codigo_dane" => "20443"
            ),
            array(
                "id" => 420,
                "nombre" => "PAILITAS",
                "departamento_id" => 12,
                "estado" => 1,
                "codigo_dane" => "20517"
            ),
            array(
                "id" => 421,
                "nombre" => "PELAYA",
                "departamento_id" => 12,
                "estado" => 1,
                "codigo_dane" => "20550"
            ),
            array(
                "id" => 422,
                "nombre" => "PUEBLO BELLO",
                "departamento_id" => 12,
                "estado" => 1,
                "codigo_dane" => "20570"
            ),
            array(
                "id" => 423,
                "nombre" => "RIO DE ORO",
                "departamento_id" => 12,
                "estado" => 1,
                "codigo_dane" => "20614"
            ),
            array(
                "id" => 424,
                "nombre" => "LA PAZ",
                "departamento_id" => 12,
                "estado" => 1,
                "codigo_dane" => "20621"
            ),
            array(
                "id" => 425,
                "nombre" => "SAN ALBERTO",
                "departamento_id" => 12,
                "estado" => 1,
                "codigo_dane" => "20710"
            ),
            array(
                "id" => 426,
                "nombre" => "SAN DIEGO",
                "departamento_id" => 12,
                "estado" => 1,
                "codigo_dane" => "20750"
            ),
            array(
                "id" => 427,
                "nombre" => "SAN MARTIN",
                "departamento_id" => 12,
                "estado" => 1,
                "codigo_dane" => "20770"
            ),
            array(
                "id" => 428,
                "nombre" => "TAMALAMEQUE",
                "departamento_id" => 12,
                "estado" => 1,
                "codigo_dane" => "20787"
            ),
            array(
                "id" => 429,
                "nombre" => "MONTERIA",
                "departamento_id" => 14,
                "estado" => 1,
                "codigo_dane" => "23001"
            ),
            array(
                "id" => 430,
                "nombre" => "AYAPEL",
                "departamento_id" => 14,
                "estado" => 1,
                "codigo_dane" => "23068"
            ),
            array(
                "id" => 431,
                "nombre" => "BUENAVISTA",
                "departamento_id" => 14,
                "estado" => 1,
                "codigo_dane" => "23079"
            ),
            array(
                "id" => 432,
                "nombre" => "CANALETE",
                "departamento_id" => 14,
                "estado" => 1,
                "codigo_dane" => "23090"
            ),
            array(
                "id" => 433,
                "nombre" => "CERETE",
                "departamento_id" => 14,
                "estado" => 1,
                "codigo_dane" => "23162"
            ),
            array(
                "id" => 434,
                "nombre" => "CHIMA",
                "departamento_id" => 14,
                "estado" => 1,
                "codigo_dane" => "23168"
            ),
            array(
                "id" => 435,
                "nombre" => "CHINU",
                "departamento_id" => 14,
                "estado" => 1,
                "codigo_dane" => "23182"
            ),
            array(
                "id" => 436,
                "nombre" => "CIENAGA DE ORO",
                "departamento_id" => 14,
                "estado" => 1,
                "codigo_dane" => "23189"
            ),
            array(
                "id" => 437,
                "nombre" => "COTORRA",
                "departamento_id" => 14,
                "estado" => 1,
                "codigo_dane" => "23300"
            ),
            array(
                "id" => 438,
                "nombre" => "LA APARTADA",
                "departamento_id" => 14,
                "estado" => 1,
                "codigo_dane" => "23350"
            ),
            array(
                "id" => 439,
                "nombre" => "LORICA",
                "departamento_id" => 14,
                "estado" => 1,
                "codigo_dane" => "23417"
            ),
            array(
                "id" => 440,
                "nombre" => "LOS CORDOBAS",
                "departamento_id" => 14,
                "estado" => 1,
                "codigo_dane" => "23419"
            ),
            array(
                "id" => 441,
                "nombre" => "MOMIL",
                "departamento_id" => 14,
                "estado" => 1,
                "codigo_dane" => "23464"
            ),
            array(
                "id" => 442,
                "nombre" => "MONTELIBANO",
                "departamento_id" => 14,
                "estado" => 1,
                "codigo_dane" => "23466"
            ),
            array(
                "id" => 443,
                "nombre" => "MOÑITOS",
                "departamento_id" => 14,
                "estado" => 1,
                "codigo_dane" => "23500"
            ),
            array(
                "id" => 444,
                "nombre" => "PLANETA RICA",
                "departamento_id" => 14,
                "estado" => 1,
                "codigo_dane" => "23555"
            ),
            array(
                "id" => 445,
                "nombre" => "PUEBLO NUEVO",
                "departamento_id" => 14,
                "estado" => 1,
                "codigo_dane" => "23570"
            ),
            array(
                "id" => 446,
                "nombre" => "PUERTO ESCONDIDO",
                "departamento_id" => 14,
                "estado" => 1,
                "codigo_dane" => "23574"
            ),
            array(
                "id" => 447,
                "nombre" => "PUERTO LIBERTADOR",
                "departamento_id" => 14,
                "estado" => 1,
                "codigo_dane" => "23580"
            ),
            array(
                "id" => 448,
                "nombre" => "PURISIMA",
                "departamento_id" => 14,
                "estado" => 1,
                "codigo_dane" => "23586"
            ),
            array(
                "id" => 449,
                "nombre" => "SAHAGUN",
                "departamento_id" => 14,
                "estado" => 1,
                "codigo_dane" => "23660"
            ),
            array(
                "id" => 450,
                "nombre" => "SAN ANDRES SOTAVENTO",
                "departamento_id" => 14,
                "estado" => 1,
                "codigo_dane" => "23670"
            ),
            array(
                "id" => 451,
                "nombre" => "SAN ANTERO",
                "departamento_id" => 14,
                "estado" => 1,
                "codigo_dane" => "23672"
            ),
            array(
                "id" => 452,
                "nombre" => "SAN BERNARDO DEL VIENTO",
                "departamento_id" => 14,
                "estado" => 1,
                "codigo_dane" => "23675"
            ),
            array(
                "id" => 453,
                "nombre" => "SAN CARLOS",
                "departamento_id" => 14,
                "estado" => 1,
                "codigo_dane" => "23678"
            ),
            array(
                "id" => 454,
                "nombre" => "SAN JOSE DE URE",
                "departamento_id" => 14,
                "estado" => 1,
                "codigo_dane" => "23682"
            ),
            array(
                "id" => 455,
                "nombre" => "SAN PELAYO",
                "departamento_id" => 14,
                "estado" => 1,
                "codigo_dane" => "23686"
            ),
            array(
                "id" => 456,
                "nombre" => "TIERRALTA",
                "departamento_id" => 14,
                "estado" => 1,
                "codigo_dane" => "23807"
            ),
            array(
                "id" => 457,
                "nombre" => "TUCHIN",
                "departamento_id" => 14,
                "estado" => 1,
                "codigo_dane" => "23815"
            ),
            array(
                "id" => 458,
                "nombre" => "VALENCIA",
                "departamento_id" => 14,
                "estado" => 1,
                "codigo_dane" => "23855"
            ),
            array(
                "id" => 459,
                "nombre" => "AGUA DE DIOS",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25001"
            ),
            array(
                "id" => 460,
                "nombre" => "ALBAN",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25019"
            ),
            array(
                "id" => 461,
                "nombre" => "ANAPOIMA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25035"
            ),
            array(
                "id" => 462,
                "nombre" => "ANOLAIMA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25040"
            ),
            array(
                "id" => 463,
                "nombre" => "ARBELAEZ",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25053"
            ),
            array(
                "id" => 464,
                "nombre" => "BELTRAN",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25086"
            ),
            array(
                "id" => 465,
                "nombre" => "BITUIMA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25095"
            ),
            array(
                "id" => 466,
                "nombre" => "BOJACA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25099"
            ),
            array(
                "id" => 467,
                "nombre" => "CABRERA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25120"
            ),
            array(
                "id" => 468,
                "nombre" => "CACHIPAY",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25123"
            ),
            array(
                "id" => 469,
                "nombre" => "CAJICA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25126"
            ),
            array(
                "id" => 470,
                "nombre" => "CAPARRAPI",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25148"
            ),
            array(
                "id" => 471,
                "nombre" => "CAQUEZA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25151"
            ),
            array(
                "id" => 472,
                "nombre" => "CARMEN DE CARUPA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25154"
            ),
            array(
                "id" => 473,
                "nombre" => "CHAGUANI",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25168"
            ),
            array(
                "id" => 474,
                "nombre" => "CHIA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25175"
            ),
            array(
                "id" => 475,
                "nombre" => "CHIPAQUE",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25178"
            ),
            array(
                "id" => 476,
                "nombre" => "CHOACHI",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25181"
            ),
            array(
                "id" => 477,
                "nombre" => "CHOCONTA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25183"
            ),
            array(
                "id" => 478,
                "nombre" => "COGUA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25200"
            ),
            array(
                "id" => 479,
                "nombre" => "COTA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25214"
            ),
            array(
                "id" => 480,
                "nombre" => "CUCUNUBA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25224"
            ),
            array(
                "id" => 481,
                "nombre" => "EL COLEGIO",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25245"
            ),
            array(
                "id" => 482,
                "nombre" => "EL PEÑON",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25258"
            ),
            array(
                "id" => 483,
                "nombre" => "EL ROSAL",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25260"
            ),
            array(
                "id" => 484,
                "nombre" => "FACATATIVA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25269"
            ),
            array(
                "id" => 485,
                "nombre" => "FOMEQUE",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25279"
            ),
            array(
                "id" => 486,
                "nombre" => "FOSCA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25281"
            ),
            array(
                "id" => 487,
                "nombre" => "FUNZA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25286"
            ),
            array(
                "id" => 488,
                "nombre" => "FUQUENE",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25288"
            ),
            array(
                "id" => 489,
                "nombre" => "FUSAGASUGA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25290"
            ),
            array(
                "id" => 490,
                "nombre" => "GACHALA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25293"
            ),
            array(
                "id" => 491,
                "nombre" => "GACHANCIPA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25295"
            ),
            array(
                "id" => 492,
                "nombre" => "GACHETA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25297"
            ),
            array(
                "id" => 493,
                "nombre" => "GAMA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25299"
            ),
            array(
                "id" => 494,
                "nombre" => "GIRARDOT",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25307"
            ),
            array(
                "id" => 495,
                "nombre" => "GRANADA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25312"
            ),
            array(
                "id" => 496,
                "nombre" => "GUACHETA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25317"
            ),
            array(
                "id" => 497,
                "nombre" => "GUADUAS",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25320"
            ),
            array(
                "id" => 498,
                "nombre" => "GUASCA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25322"
            ),
            array(
                "id" => 499,
                "nombre" => "GUATAQUI",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25324"
            ),
            array(
                "id" => 500,
                "nombre" => "GUATAVITA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25326"
            ),
            array(
                "id" => 501,
                "nombre" => "GUAYABAL DE SIQUIMA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25328"
            ),
            array(
                "id" => 502,
                "nombre" => "GUAYABETAL",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25335"
            ),
            array(
                "id" => 503,
                "nombre" => "GUTIERREZ",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25339"
            ),
            array(
                "id" => 504,
                "nombre" => "JERUSALEN",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25368"
            ),
            array(
                "id" => 505,
                "nombre" => "JUNIN",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25372"
            ),
            array(
                "id" => 506,
                "nombre" => "LA CALERA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25377"
            ),
            array(
                "id" => 507,
                "nombre" => "LA MESA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25386"
            ),
            array(
                "id" => 508,
                "nombre" => "LA PALMA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25394"
            ),
            array(
                "id" => 509,
                "nombre" => "LA PEÑA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25398"
            ),
            array(
                "id" => 510,
                "nombre" => "LA VEGA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25402"
            ),
            array(
                "id" => 511,
                "nombre" => "LENGUAZAQUE",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25407"
            ),
            array(
                "id" => 512,
                "nombre" => "MACHETA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25426"
            ),
            array(
                "id" => 513,
                "nombre" => "MADRID",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25430"
            ),
            array(
                "id" => 514,
                "nombre" => "MANTA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25436"
            ),
            array(
                "id" => 515,
                "nombre" => "MEDINA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25438"
            ),
            array(
                "id" => 516,
                "nombre" => "MOSQUERA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25473"
            ),
            array(
                "id" => 517,
                "nombre" => "NARIÑO",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25483"
            ),
            array(
                "id" => 518,
                "nombre" => "NEMOCON",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25486"
            ),
            array(
                "id" => 519,
                "nombre" => "NILO",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25488"
            ),
            array(
                "id" => 520,
                "nombre" => "NIMAIMA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25489"
            ),
            array(
                "id" => 521,
                "nombre" => "NOCAIMA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25491"
            ),
            array(
                "id" => 522,
                "nombre" => "VENECIA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25506"
            ),
            array(
                "id" => 523,
                "nombre" => "PACHO",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25513"
            ),
            array(
                "id" => 524,
                "nombre" => "PAIME",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25518"
            ),
            array(
                "id" => 525,
                "nombre" => "PANDI",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25524"
            ),
            array(
                "id" => 526,
                "nombre" => "PARATEBUENO",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25530"
            ),
            array(
                "id" => 527,
                "nombre" => "PASCA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25535"
            ),
            array(
                "id" => 528,
                "nombre" => "PUERTO SALGAR",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25572"
            ),
            array(
                "id" => 529,
                "nombre" => "PULI",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25580"
            ),
            array(
                "id" => 530,
                "nombre" => "QUEBRADANEGRA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25592"
            ),
            array(
                "id" => 531,
                "nombre" => "QUETAME",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25594"
            ),
            array(
                "id" => 532,
                "nombre" => "QUIPILE",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25596"
            ),
            array(
                "id" => 533,
                "nombre" => "APULO",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25599"
            ),
            array(
                "id" => 534,
                "nombre" => "RICAURTE",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25612"
            ),
            array(
                "id" => 535,
                "nombre" => "SAN ANTONIO DEL TEQUENDAMA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25645"
            ),
            array(
                "id" => 536,
                "nombre" => "SAN BERNARDO",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25649"
            ),
            array(
                "id" => 537,
                "nombre" => "SAN CAYETANO",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25653"
            ),
            array(
                "id" => 538,
                "nombre" => "SAN FRANCISCO",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25658"
            ),
            array(
                "id" => 539,
                "nombre" => "SAN JUAN DE RIOSECO",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25662"
            ),
            array(
                "id" => 540,
                "nombre" => "SASAIMA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25718"
            ),
            array(
                "id" => 541,
                "nombre" => "SESQUILE",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25736"
            ),
            array(
                "id" => 542,
                "nombre" => "SIBATE",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25740"
            ),
            array(
                "id" => 543,
                "nombre" => "SILVANIA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25743"
            ),
            array(
                "id" => 544,
                "nombre" => "SIMIJACA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25745"
            ),
            array(
                "id" => 545,
                "nombre" => "SOACHA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25754"
            ),
            array(
                "id" => 546,
                "nombre" => "SOPO",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25758"
            ),
            array(
                "id" => 547,
                "nombre" => "SUBACHOQUE",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25769"
            ),
            array(
                "id" => 548,
                "nombre" => "SUESCA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25772"
            ),
            array(
                "id" => 549,
                "nombre" => "SUPATA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25777"
            ),
            array(
                "id" => 550,
                "nombre" => "SUSA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25779"
            ),
            array(
                "id" => 551,
                "nombre" => "SUTATAUSA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25781"
            ),
            array(
                "id" => 552,
                "nombre" => "TABIO",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25785"
            ),
            array(
                "id" => 553,
                "nombre" => "TAUSA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25793"
            ),
            array(
                "id" => 554,
                "nombre" => "TENA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25797"
            ),
            array(
                "id" => 555,
                "nombre" => "TENJO",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25799"
            ),
            array(
                "id" => 556,
                "nombre" => "TIBACUY",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25805"
            ),
            array(
                "id" => 557,
                "nombre" => "TIBIRITA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25807"
            ),
            array(
                "id" => 558,
                "nombre" => "TOCAIMA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25815"
            ),
            array(
                "id" => 559,
                "nombre" => "TOCANCIPA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25817"
            ),
            array(
                "id" => 560,
                "nombre" => "TOPAIPI",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25823"
            ),
            array(
                "id" => 561,
                "nombre" => "UBALA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25839"
            ),
            array(
                "id" => 562,
                "nombre" => "UBAQUE",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25841"
            ),
            array(
                "id" => 563,
                "nombre" => "UBATE",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25843"
            ),
            array(
                "id" => 564,
                "nombre" => "UNE",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25845"
            ),
            array(
                "id" => 565,
                "nombre" => "UTICA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25851"
            ),
            array(
                "id" => 566,
                "nombre" => "VERGARA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25862"
            ),
            array(
                "id" => 567,
                "nombre" => "VIANI",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25867"
            ),
            array(
                "id" => 568,
                "nombre" => "VILLAGOMEZ",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25871"
            ),
            array(
                "id" => 569,
                "nombre" => "VILLAPINZON",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25873"
            ),
            array(
                "id" => 570,
                "nombre" => "VILLETA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25875"
            ),
            array(
                "id" => 571,
                "nombre" => "VIOTA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25878"
            ),
            array(
                "id" => 572,
                "nombre" => "YACOPI",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25885"
            ),
            array(
                "id" => 573,
                "nombre" => "ZIPACON",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25898"
            ),
            array(
                "id" => 574,
                "nombre" => "ZIPAQUIRA",
                "departamento_id" => 15,
                "estado" => 1,
                "codigo_dane" => "25899"
            ),
            array(
                "id" => 575,
                "nombre" => "QUIBDO",
                "departamento_id" => 13,
                "estado" => 1,
                "codigo_dane" => "27001"
            ),
            array(
                "id" => 576,
                "nombre" => "ACANDI",
                "departamento_id" => 13,
                "estado" => 1,
                "codigo_dane" => "27006"
            ),
            array(
                "id" => 577,
                "nombre" => "ALTO BAUDO",
                "departamento_id" => 13,
                "estado" => 1,
                "codigo_dane" => "27025"
            ),
            array(
                "id" => 578,
                "nombre" => "ATRATO",
                "departamento_id" => 13,
                "estado" => 1,
                "codigo_dane" => "27050"
            ),
            array(
                "id" => 579,
                "nombre" => "BAGADO",
                "departamento_id" => 13,
                "estado" => 1,
                "codigo_dane" => "27073"
            ),
            array(
                "id" => 580,
                "nombre" => "BAHIA SOLANO",
                "departamento_id" => 13,
                "estado" => 1,
                "codigo_dane" => "27075"
            ),
            array(
                "id" => 581,
                "nombre" => "BAJO BAUDO",
                "departamento_id" => 13,
                "estado" => 1,
                "codigo_dane" => "27077"
            ),
            array(
                "id" => 582,
                "nombre" => "BOJAYA",
                "departamento_id" => 13,
                "estado" => 1,
                "codigo_dane" => "27099"
            ),
            array(
                "id" => 583,
                "nombre" => "CANTON DEL SAN PABLO",
                "departamento_id" => 13,
                "estado" => 1,
                "codigo_dane" => "27135"
            ),
            array(
                "id" => 584,
                "nombre" => "CARMEN DEL DARIEN",
                "departamento_id" => 13,
                "estado" => 1,
                "codigo_dane" => "27150"
            ),
            array(
                "id" => 585,
                "nombre" => "CERTEGUI",
                "departamento_id" => 13,
                "estado" => 1,
                "codigo_dane" => "27160"
            ),
            array(
                "id" => 586,
                "nombre" => "CONDOTO",
                "departamento_id" => 13,
                "estado" => 1,
                "codigo_dane" => "27205"
            ),
            array(
                "id" => 587,
                "nombre" => "EL CARMEN DE ATRATO",
                "departamento_id" => 13,
                "estado" => 1,
                "codigo_dane" => "27245"
            ),
            array(
                "id" => 588,
                "nombre" => "LITORAL DEL SAN JUAN",
                "departamento_id" => 13,
                "estado" => 1,
                "codigo_dane" => "27250"
            ),
            array(
                "id" => 589,
                "nombre" => "ISTMINA",
                "departamento_id" => 13,
                "estado" => 1,
                "codigo_dane" => "27361"
            ),
            array(
                "id" => 590,
                "nombre" => "JURADO",
                "departamento_id" => 13,
                "estado" => 1,
                "codigo_dane" => "27372"
            ),
            array(
                "id" => 591,
                "nombre" => "LLORO",
                "departamento_id" => 13,
                "estado" => 1,
                "codigo_dane" => "27413"
            ),
            array(
                "id" => 592,
                "nombre" => "MEDIO ATRATO",
                "departamento_id" => 13,
                "estado" => 1,
                "codigo_dane" => "27425"
            ),
            array(
                "id" => 593,
                "nombre" => "MEDIO BAUDO",
                "departamento_id" => 13,
                "estado" => 1,
                "codigo_dane" => "27430"
            ),
            array(
                "id" => 594,
                "nombre" => "MEDIO SAN JUAN",
                "departamento_id" => 13,
                "estado" => 1,
                "codigo_dane" => "27450"
            ),
            array(
                "id" => 595,
                "nombre" => "NOVITA",
                "departamento_id" => 13,
                "estado" => 1,
                "codigo_dane" => "27491"
            ),
            array(
                "id" => 596,
                "nombre" => "NUQUI",
                "departamento_id" => 13,
                "estado" => 1,
                "codigo_dane" => "27495"
            ),
            array(
                "id" => 597,
                "nombre" => "RIO IRO",
                "departamento_id" => 13,
                "estado" => 1,
                "codigo_dane" => "27580"
            ),
            array(
                "id" => 598,
                "nombre" => "RIO QUITO",
                "departamento_id" => 13,
                "estado" => 1,
                "codigo_dane" => "27600"
            ),
            array(
                "id" => 599,
                "nombre" => "RIOSUCIO",
                "departamento_id" => 13,
                "estado" => 1,
                "codigo_dane" => "27615"
            ),
            array(
                "id" => 600,
                "nombre" => "SAN JOSE DEL PALMAR",
                "departamento_id" => 13,
                "estado" => 1,
                "codigo_dane" => "27660"
            ),
            array(
                "id" => 601,
                "nombre" => "SIPI",
                "departamento_id" => 13,
                "estado" => 1,
                "codigo_dane" => "27745"
            ),
            array(
                "id" => 602,
                "nombre" => "TADO",
                "departamento_id" => 13,
                "estado" => 1,
                "codigo_dane" => "27787"
            ),
            array(
                "id" => 603,
                "nombre" => "UNGUIA",
                "departamento_id" => 13,
                "estado" => 1,
                "codigo_dane" => "27800"
            ),
            array(
                "id" => 604,
                "nombre" => "UNION PANAMERICANA",
                "departamento_id" => 13,
                "estado" => 1,
                "codigo_dane" => "27810"
            ),
            array(
                "id" => 605,
                "nombre" => "NEIVA",
                "departamento_id" => 19,
                "estado" => 1,
                "codigo_dane" => "41001"
            ),
            array(
                "id" => 606,
                "nombre" => "ACEVEDO",
                "departamento_id" => 19,
                "estado" => 1,
                "codigo_dane" => "41006"
            ),
            array(
                "id" => 607,
                "nombre" => "AGRADO",
                "departamento_id" => 19,
                "estado" => 1,
                "codigo_dane" => "41013"
            ),
            array(
                "id" => 608,
                "nombre" => "AIPE",
                "departamento_id" => 19,
                "estado" => 1,
                "codigo_dane" => "41016"
            ),
            array(
                "id" => 609,
                "nombre" => "ALGECIRAS",
                "departamento_id" => 19,
                "estado" => 1,
                "codigo_dane" => "41020"
            ),
            array(
                "id" => 610,
                "nombre" => "ALTAMIRA",
                "departamento_id" => 19,
                "estado" => 1,
                "codigo_dane" => "41026"
            ),
            array(
                "id" => 611,
                "nombre" => "BARAYA",
                "departamento_id" => 19,
                "estado" => 1,
                "codigo_dane" => "41078"
            ),
            array(
                "id" => 612,
                "nombre" => "CAMPOALEGRE",
                "departamento_id" => 19,
                "estado" => 1,
                "codigo_dane" => "41132"
            ),
            array(
                "id" => 613,
                "nombre" => "COLOMBIA",
                "departamento_id" => 19,
                "estado" => 1,
                "codigo_dane" => "41206"
            ),
            array(
                "id" => 614,
                "nombre" => "ELIAS",
                "departamento_id" => 19,
                "estado" => 1,
                "codigo_dane" => "41244"
            ),
            array(
                "id" => 615,
                "nombre" => "GARZON",
                "departamento_id" => 19,
                "estado" => 1,
                "codigo_dane" => "41298"
            ),
            array(
                "id" => 616,
                "nombre" => "GIGANTE",
                "departamento_id" => 19,
                "estado" => 1,
                "codigo_dane" => "41306"
            ),
            array(
                "id" => 617,
                "nombre" => "GUADALUPE",
                "departamento_id" => 19,
                "estado" => 1,
                "codigo_dane" => "41319"
            ),
            array(
                "id" => 618,
                "nombre" => "HOBO",
                "departamento_id" => 19,
                "estado" => 1,
                "codigo_dane" => "41349"
            ),
            array(
                "id" => 619,
                "nombre" => "IQUIRA",
                "departamento_id" => 19,
                "estado" => 1,
                "codigo_dane" => "41357"
            ),
            array(
                "id" => 620,
                "nombre" => "ISNOS",
                "departamento_id" => 19,
                "estado" => 1,
                "codigo_dane" => "41359"
            ),
            array(
                "id" => 621,
                "nombre" => "LA ARGENTINA",
                "departamento_id" => 19,
                "estado" => 1,
                "codigo_dane" => "41378"
            ),
            array(
                "id" => 622,
                "nombre" => "LA PLATA",
                "departamento_id" => 19,
                "estado" => 1,
                "codigo_dane" => "41396"
            ),
            array(
                "id" => 623,
                "nombre" => "NATAGA",
                "departamento_id" => 19,
                "estado" => 1,
                "codigo_dane" => "41483"
            ),
            array(
                "id" => 624,
                "nombre" => "OPORAPA",
                "departamento_id" => 19,
                "estado" => 1,
                "codigo_dane" => "41503"
            ),
            array(
                "id" => 625,
                "nombre" => "PAICOL",
                "departamento_id" => 19,
                "estado" => 1,
                "codigo_dane" => "41518"
            ),
            array(
                "id" => 626,
                "nombre" => "PALERMO",
                "departamento_id" => 19,
                "estado" => 1,
                "codigo_dane" => "41524"
            ),
            array(
                "id" => 627,
                "nombre" => "PALESTINA",
                "departamento_id" => 19,
                "estado" => 1,
                "codigo_dane" => "41530"
            ),
            array(
                "id" => 628,
                "nombre" => "PITAL",
                "departamento_id" => 19,
                "estado" => 1,
                "codigo_dane" => "41548"
            ),
            array(
                "id" => 629,
                "nombre" => "PITALITO",
                "departamento_id" => 19,
                "estado" => 1,
                "codigo_dane" => "41551"
            ),
            array(
                "id" => 630,
                "nombre" => "RIVERA",
                "departamento_id" => 19,
                "estado" => 1,
                "codigo_dane" => "41615"
            ),
            array(
                "id" => 631,
                "nombre" => "SALADOBLANCO",
                "departamento_id" => 19,
                "estado" => 1,
                "codigo_dane" => "41660"
            ),
            array(
                "id" => 632,
                "nombre" => "SAN AGUSTIN",
                "departamento_id" => 19,
                "estado" => 1,
                "codigo_dane" => "41668"
            ),
            array(
                "id" => 633,
                "nombre" => "SANTA MARIA",
                "departamento_id" => 19,
                "estado" => 1,
                "codigo_dane" => "41676"
            ),
            array(
                "id" => 634,
                "nombre" => "SUAZA",
                "departamento_id" => 19,
                "estado" => 1,
                "codigo_dane" => "41770"
            ),
            array(
                "id" => 635,
                "nombre" => "TARQUI",
                "departamento_id" => 19,
                "estado" => 1,
                "codigo_dane" => "41791"
            ),
            array(
                "id" => 636,
                "nombre" => "TESALIA",
                "departamento_id" => 19,
                "estado" => 1,
                "codigo_dane" => "41797"
            ),
            array(
                "id" => 637,
                "nombre" => "TELLO",
                "departamento_id" => 19,
                "estado" => 1,
                "codigo_dane" => "41799"
            ),
            array(
                "id" => 638,
                "nombre" => "TERUEL",
                "departamento_id" => 19,
                "estado" => 1,
                "codigo_dane" => "41801"
            ),
            array(
                "id" => 639,
                "nombre" => "TIMANA",
                "departamento_id" => 19,
                "estado" => 1,
                "codigo_dane" => "41807"
            ),
            array(
                "id" => 640,
                "nombre" => "VILLAVIEJA",
                "departamento_id" => 19,
                "estado" => 1,
                "codigo_dane" => "41872"
            ),
            array(
                "id" => 641,
                "nombre" => "YAGUARA",
                "departamento_id" => 19,
                "estado" => 1,
                "codigo_dane" => "41885"
            ),
            array(
                "id" => 642,
                "nombre" => "RIOHACHA",
                "departamento_id" => 17,
                "estado" => 1,
                "codigo_dane" => "44001"
            ),
            array(
                "id" => 643,
                "nombre" => "ALBANIA",
                "departamento_id" => 17,
                "estado" => 1,
                "codigo_dane" => "44035"
            ),
            array(
                "id" => 644,
                "nombre" => "BARRANCAS",
                "departamento_id" => 17,
                "estado" => 1,
                "codigo_dane" => "44078"
            ),
            array(
                "id" => 645,
                "nombre" => "DIBULLA",
                "departamento_id" => 17,
                "estado" => 1,
                "codigo_dane" => "44090"
            ),
            array(
                "id" => 646,
                "nombre" => "DISTRACCION",
                "departamento_id" => 17,
                "estado" => 1,
                "codigo_dane" => "44098"
            ),
            array(
                "id" => 647,
                "nombre" => "EL MOLINO",
                "departamento_id" => 17,
                "estado" => 1,
                "codigo_dane" => "44110"
            ),
            array(
                "id" => 648,
                "nombre" => "FONSECA",
                "departamento_id" => 17,
                "estado" => 1,
                "codigo_dane" => "44279"
            ),
            array(
                "id" => 649,
                "nombre" => "HATONUEVO",
                "departamento_id" => 17,
                "estado" => 1,
                "codigo_dane" => "44378"
            ),
            array(
                "id" => 650,
                "nombre" => "LA JAGUA DEL PILAR",
                "departamento_id" => 17,
                "estado" => 1,
                "codigo_dane" => "44420"
            ),
            array(
                "id" => 651,
                "nombre" => "MAICAO",
                "departamento_id" => 17,
                "estado" => 1,
                "codigo_dane" => "44430"
            ),
            array(
                "id" => 652,
                "nombre" => "MANAURE",
                "departamento_id" => 17,
                "estado" => 1,
                "codigo_dane" => "44560"
            ),
            array(
                "id" => 653,
                "nombre" => "SAN JUAN DEL CESAR",
                "departamento_id" => 17,
                "estado" => 1,
                "codigo_dane" => "44650"
            ),
            array(
                "id" => 654,
                "nombre" => "URIBIA",
                "departamento_id" => 17,
                "estado" => 1,
                "codigo_dane" => "44847"
            ),
            array(
                "id" => 655,
                "nombre" => "URUMITA",
                "departamento_id" => 17,
                "estado" => 1,
                "codigo_dane" => "44855"
            ),
            array(
                "id" => 656,
                "nombre" => "VILLANUEVA",
                "departamento_id" => 17,
                "estado" => 1,
                "codigo_dane" => "44874"
            ),
            array(
                "id" => 657,
                "nombre" => "SANTA MARTA",
                "departamento_id" => 20,
                "estado" => 1,
                "codigo_dane" => "47001"
            ),
            array(
                "id" => 658,
                "nombre" => "ALGARROBO",
                "departamento_id" => 20,
                "estado" => 1,
                "codigo_dane" => "47030"
            ),
            array(
                "id" => 659,
                "nombre" => "ARACATACA",
                "departamento_id" => 20,
                "estado" => 1,
                "codigo_dane" => "47053"
            ),
            array(
                "id" => 660,
                "nombre" => "ARIGUANI",
                "departamento_id" => 20,
                "estado" => 1,
                "codigo_dane" => "47058"
            ),
            array(
                "id" => 661,
                "nombre" => "CERRO SAN ANTONIO",
                "departamento_id" => 20,
                "estado" => 1,
                "codigo_dane" => "47161"
            ),
            array(
                "id" => 662,
                "nombre" => "CHIBOLO",
                "departamento_id" => 20,
                "estado" => 1,
                "codigo_dane" => "47170"
            ),
            array(
                "id" => 663,
                "nombre" => "CIENAGA",
                "departamento_id" => 20,
                "estado" => 1,
                "codigo_dane" => "47189"
            ),
            array(
                "id" => 664,
                "nombre" => "CONCORDIA",
                "departamento_id" => 20,
                "estado" => 1,
                "codigo_dane" => "47205"
            ),
            array(
                "id" => 665,
                "nombre" => "EL BANCO",
                "departamento_id" => 20,
                "estado" => 1,
                "codigo_dane" => "47245"
            ),
            array(
                "id" => 666,
                "nombre" => "EL PIÑON",
                "departamento_id" => 20,
                "estado" => 1,
                "codigo_dane" => "47258"
            ),
            array(
                "id" => 667,
                "nombre" => "EL RETEN",
                "departamento_id" => 20,
                "estado" => 1,
                "codigo_dane" => "47268"
            ),
            array(
                "id" => 668,
                "nombre" => "FUNDACION",
                "departamento_id" => 20,
                "estado" => 1,
                "codigo_dane" => "47288"
            ),
            array(
                "id" => 669,
                "nombre" => "GUAMAL",
                "departamento_id" => 20,
                "estado" => 1,
                "codigo_dane" => "47318"
            ),
            array(
                "id" => 670,
                "nombre" => "NUEVA GRANADA",
                "departamento_id" => 20,
                "estado" => 1,
                "codigo_dane" => "47460"
            ),
            array(
                "id" => 671,
                "nombre" => "PEDRAZA",
                "departamento_id" => 20,
                "estado" => 1,
                "codigo_dane" => "47541"
            ),
            array(
                "id" => 672,
                "nombre" => "PIJIÑO DEL CARMEN",
                "departamento_id" => 20,
                "estado" => 1,
                "codigo_dane" => "47545"
            ),
            array(
                "id" => 673,
                "nombre" => "PIVIJAY",
                "departamento_id" => 20,
                "estado" => 1,
                "codigo_dane" => "47551"
            ),
            array(
                "id" => 674,
                "nombre" => "PLATO",
                "departamento_id" => 20,
                "estado" => 1,
                "codigo_dane" => "47555"
            ),
            array(
                "id" => 675,
                "nombre" => "PUEBLOVIEJO",
                "departamento_id" => 20,
                "estado" => 1,
                "codigo_dane" => "47570"
            ),
            array(
                "id" => 676,
                "nombre" => "REMOLINO",
                "departamento_id" => 20,
                "estado" => 1,
                "codigo_dane" => "47605"
            ),
            array(
                "id" => 677,
                "nombre" => "SABANAS DE SAN ANGEL",
                "departamento_id" => 20,
                "estado" => 1,
                "codigo_dane" => "47660"
            ),
            array(
                "id" => 678,
                "nombre" => "SALAMINA",
                "departamento_id" => 20,
                "estado" => 1,
                "codigo_dane" => "47675"
            ),
            array(
                "id" => 679,
                "nombre" => "SAN SEBASTIAN DE BUENAVISTA",
                "departamento_id" => 20,
                "estado" => 1,
                "codigo_dane" => "47692"
            ),
            array(
                "id" => 680,
                "nombre" => "SAN ZENON",
                "departamento_id" => 20,
                "estado" => 1,
                "codigo_dane" => "47703"
            ),
            array(
                "id" => 681,
                "nombre" => "SANTA ANA",
                "departamento_id" => 20,
                "estado" => 1,
                "codigo_dane" => "47707"
            ),
            array(
                "id" => 682,
                "nombre" => "SANTA BARBARA DE PINTO",
                "departamento_id" => 20,
                "estado" => 1,
                "codigo_dane" => "47720"
            ),
            array(
                "id" => 683,
                "nombre" => "SITIONUEVO",
                "departamento_id" => 20,
                "estado" => 1,
                "codigo_dane" => "47745"
            ),
            array(
                "id" => 684,
                "nombre" => "TENERIFE",
                "departamento_id" => 20,
                "estado" => 1,
                "codigo_dane" => "47798"
            ),
            array(
                "id" => 685,
                "nombre" => "ZAPAYAN",
                "departamento_id" => 20,
                "estado" => 1,
                "codigo_dane" => "47960"
            ),
            array(
                "id" => 686,
                "nombre" => "ZONA BANANERA",
                "departamento_id" => 20,
                "estado" => 1,
                "codigo_dane" => "47980"
            ),
            array(
                "id" => 687,
                "nombre" => "VILLAVICENCIO",
                "departamento_id" => 21,
                "estado" => 1,
                "codigo_dane" => "50001"
            ),
            array(
                "id" => 688,
                "nombre" => "ACACIAS",
                "departamento_id" => 21,
                "estado" => 1,
                "codigo_dane" => "50006"
            ),
            array(
                "id" => 689,
                "nombre" => "BARRANCA DE UPIA",
                "departamento_id" => 21,
                "estado" => 1,
                "codigo_dane" => "50110"
            ),
            array(
                "id" => 690,
                "nombre" => "CABUYARO",
                "departamento_id" => 21,
                "estado" => 1,
                "codigo_dane" => "50124"
            ),
            array(
                "id" => 691,
                "nombre" => "CASTILLA LA NUEVA",
                "departamento_id" => 21,
                "estado" => 1,
                "codigo_dane" => "50150"
            ),
            array(
                "id" => 692,
                "nombre" => "CUBARRAL",
                "departamento_id" => 21,
                "estado" => 1,
                "codigo_dane" => "50223"
            ),
            array(
                "id" => 693,
                "nombre" => "CUMARAL",
                "departamento_id" => 21,
                "estado" => 1,
                "codigo_dane" => "50226"
            ),
            array(
                "id" => 694,
                "nombre" => "EL CALVARIO",
                "departamento_id" => 21,
                "estado" => 1,
                "codigo_dane" => "50245"
            ),
            array(
                "id" => 695,
                "nombre" => "EL CASTILLO",
                "departamento_id" => 21,
                "estado" => 1,
                "codigo_dane" => "50251"
            ),
            array(
                "id" => 696,
                "nombre" => "EL DORADO",
                "departamento_id" => 21,
                "estado" => 1,
                "codigo_dane" => "50270"
            ),
            array(
                "id" => 697,
                "nombre" => "FUENTE DE ORO",
                "departamento_id" => 21,
                "estado" => 1,
                "codigo_dane" => "50287"
            ),
            array(
                "id" => 698,
                "nombre" => "GRANADA",
                "departamento_id" => 21,
                "estado" => 1,
                "codigo_dane" => "50313"
            ),
            array(
                "id" => 699,
                "nombre" => "GUAMAL",
                "departamento_id" => 21,
                "estado" => 1,
                "codigo_dane" => "50318"
            ),
            array(
                "id" => 700,
                "nombre" => "MAPIRIPAN",
                "departamento_id" => 21,
                "estado" => 1,
                "codigo_dane" => "50325"
            ),
            array(
                "id" => 701,
                "nombre" => "MESETAS",
                "departamento_id" => 21,
                "estado" => 1,
                "codigo_dane" => "50330"
            ),
            array(
                "id" => 702,
                "nombre" => "LA MACARENA",
                "departamento_id" => 21,
                "estado" => 1,
                "codigo_dane" => "50350"
            ),
            array(
                "id" => 703,
                "nombre" => "URIBE",
                "departamento_id" => 21,
                "estado" => 1,
                "codigo_dane" => "50370"
            ),
            array(
                "id" => 704,
                "nombre" => "LEJANIAS",
                "departamento_id" => 21,
                "estado" => 1,
                "codigo_dane" => "50400"
            ),
            array(
                "id" => 705,
                "nombre" => "PUERTO CONCORDIA",
                "departamento_id" => 21,
                "estado" => 1,
                "codigo_dane" => "50450"
            ),
            array(
                "id" => 706,
                "nombre" => "PUERTO GAITAN",
                "departamento_id" => 21,
                "estado" => 1,
                "codigo_dane" => "50568"
            ),
            array(
                "id" => 707,
                "nombre" => "PUERTO LOPEZ",
                "departamento_id" => 21,
                "estado" => 1,
                "codigo_dane" => "50573"
            ),
            array(
                "id" => 708,
                "nombre" => "PUERTO LLERAS",
                "departamento_id" => 21,
                "estado" => 1,
                "codigo_dane" => "50577"
            ),
            array(
                "id" => 709,
                "nombre" => "PUERTO RICO",
                "departamento_id" => 21,
                "estado" => 1,
                "codigo_dane" => "50590"
            ),
            array(
                "id" => 710,
                "nombre" => "RESTREPO",
                "departamento_id" => 21,
                "estado" => 1,
                "codigo_dane" => "50606"
            ),
            array(
                "id" => 711,
                "nombre" => "SAN CARLOS DE GUAROA",
                "departamento_id" => 21,
                "estado" => 1,
                "codigo_dane" => "50680"
            ),
            array(
                "id" => 712,
                "nombre" => "SAN JUAN DE ARAMA",
                "departamento_id" => 21,
                "estado" => 1,
                "codigo_dane" => "50683"
            ),
            array(
                "id" => 713,
                "nombre" => "SAN JUANITO",
                "departamento_id" => 21,
                "estado" => 1,
                "codigo_dane" => "50686"
            ),
            array(
                "id" => 714,
                "nombre" => "SAN MARTIN",
                "departamento_id" => 21,
                "estado" => 1,
                "codigo_dane" => "50689"
            ),
            array(
                "id" => 715,
                "nombre" => "VISTA HERMOSA",
                "departamento_id" => 21,
                "estado" => 1,
                "codigo_dane" => "50711"
            ),
            array(
                "id" => 716,
                "nombre" => "PASTO",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52001"
            ),
            array(
                "id" => 717,
                "nombre" => "ALBAN",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52019"
            ),
            array(
                "id" => 718,
                "nombre" => "ALDANA",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52022"
            ),
            array(
                "id" => 719,
                "nombre" => "ANCUYA",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52036"
            ),
            array(
                "id" => 720,
                "nombre" => "ARBOLEDA",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52051"
            ),
            array(
                "id" => 721,
                "nombre" => "BARBACOAS",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52079"
            ),
            array(
                "id" => 722,
                "nombre" => "BELEN",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52083"
            ),
            array(
                "id" => 723,
                "nombre" => "BUESACO",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52110"
            ),
            array(
                "id" => 724,
                "nombre" => "COLON",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52203"
            ),
            array(
                "id" => 725,
                "nombre" => "CONSACA",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52207"
            ),
            array(
                "id" => 726,
                "nombre" => "CONTADERO",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52210"
            ),
            array(
                "id" => 727,
                "nombre" => "CORDOBA",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52215"
            ),
            array(
                "id" => 728,
                "nombre" => "CUASPUD",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52224"
            ),
            array(
                "id" => 729,
                "nombre" => "CUMBAL",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52227"
            ),
            array(
                "id" => 730,
                "nombre" => "CUMBITARA",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52233"
            ),
            array(
                "id" => 731,
                "nombre" => "CHACHAGUI",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52240"
            ),
            array(
                "id" => 732,
                "nombre" => "EL CHARCO",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52250"
            ),
            array(
                "id" => 733,
                "nombre" => "EL PEÑOL",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52254"
            ),
            array(
                "id" => 734,
                "nombre" => "EL ROSARIO",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52256"
            ),
            array(
                "id" => 735,
                "nombre" => "EL TABLON DE GOMEZ",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52258"
            ),
            array(
                "id" => 736,
                "nombre" => "EL TAMBO",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52260"
            ),
            array(
                "id" => 737,
                "nombre" => "FUNES",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52287"
            ),
            array(
                "id" => 738,
                "nombre" => "GUACHUCAL",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52317"
            ),
            array(
                "id" => 739,
                "nombre" => "GUAITARILLA",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52320"
            ),
            array(
                "id" => 740,
                "nombre" => "GUALMATAN",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52323"
            ),
            array(
                "id" => 741,
                "nombre" => "ILES",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52352"
            ),
            array(
                "id" => 742,
                "nombre" => "IMUES",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52354"
            ),
            array(
                "id" => 743,
                "nombre" => "IPIALES",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52356"
            ),
            array(
                "id" => 744,
                "nombre" => "LA CRUZ",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52378"
            ),
            array(
                "id" => 745,
                "nombre" => "LA FLORIDA",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52381"
            ),
            array(
                "id" => 746,
                "nombre" => "LA LLANADA",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52385"
            ),
            array(
                "id" => 747,
                "nombre" => "LA TOLA",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52390"
            ),
            array(
                "id" => 748,
                "nombre" => "LA UNION",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52399"
            ),
            array(
                "id" => 749,
                "nombre" => "LEIVA",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52405"
            ),
            array(
                "id" => 750,
                "nombre" => "LINARES",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52411"
            ),
            array(
                "id" => 751,
                "nombre" => "LOS ANDES",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52418"
            ),
            array(
                "id" => 752,
                "nombre" => "MAGUI",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52427"
            ),
            array(
                "id" => 753,
                "nombre" => "MALLAMA",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52435"
            ),
            array(
                "id" => 754,
                "nombre" => "MOSQUERA",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52473"
            ),
            array(
                "id" => 755,
                "nombre" => "NARIÑO",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52480"
            ),
            array(
                "id" => 756,
                "nombre" => "OLAYA HERRERA",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52490"
            ),
            array(
                "id" => 757,
                "nombre" => "OSPINA",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52506"
            ),
            array(
                "id" => 758,
                "nombre" => "FRANCISCO PIZARRO",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52520"
            ),
            array(
                "id" => 759,
                "nombre" => "POLICARPA",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52540"
            ),
            array(
                "id" => 760,
                "nombre" => "POTOSI",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52560"
            ),
            array(
                "id" => 761,
                "nombre" => "PROVIDENCIA",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52565"
            ),
            array(
                "id" => 762,
                "nombre" => "PUERRES",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52573"
            ),
            array(
                "id" => 763,
                "nombre" => "PUPIALES",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52585"
            ),
            array(
                "id" => 764,
                "nombre" => "RICAURTE",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52612"
            ),
            array(
                "id" => 765,
                "nombre" => "ROBERTO PAYAN",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52621"
            ),
            array(
                "id" => 766,
                "nombre" => "SAMANIEGO",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52678"
            ),
            array(
                "id" => 767,
                "nombre" => "SANDONA",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52683"
            ),
            array(
                "id" => 768,
                "nombre" => "SAN BERNARDO",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52685"
            ),
            array(
                "id" => 769,
                "nombre" => "SAN LORENZO",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52687"
            ),
            array(
                "id" => 770,
                "nombre" => "SAN PABLO",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52693"
            ),
            array(
                "id" => 771,
                "nombre" => "SAN PEDRO DE CARTAGO",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52694"
            ),
            array(
                "id" => 772,
                "nombre" => "SANTA BARBARA",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52696"
            ),
            array(
                "id" => 773,
                "nombre" => "SANTA CRUZ",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52699"
            ),
            array(
                "id" => 774,
                "nombre" => "SAPUYES",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52720"
            ),
            array(
                "id" => 775,
                "nombre" => "TAMINANGO",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52786"
            ),
            array(
                "id" => 776,
                "nombre" => "TANGUA",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52788"
            ),
            array(
                "id" => 777,
                "nombre" => "SAN ANDRES DE TUMACO",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52835"
            ),
            array(
                "id" => 778,
                "nombre" => "TUQUERRES",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52838"
            ),
            array(
                "id" => 779,
                "nombre" => "YACUANQUER",
                "departamento_id" => 22,
                "estado" => 1,
                "codigo_dane" => "52885"
            ),
            array(
                "id" => 780,
                "nombre" => "CUCUTA",
                "departamento_id" => 23,
                "estado" => 1,
                "codigo_dane" => "54001"
            ),
            array(
                "id" => 781,
                "nombre" => "ABREGO",
                "departamento_id" => 23,
                "estado" => 1,
                "codigo_dane" => "54003"
            ),
            array(
                "id" => 782,
                "nombre" => "ARBOLEDAS",
                "departamento_id" => 23,
                "estado" => 1,
                "codigo_dane" => "54051"
            ),
            array(
                "id" => 783,
                "nombre" => "BOCHALEMA",
                "departamento_id" => 23,
                "estado" => 1,
                "codigo_dane" => "54099"
            ),
            array(
                "id" => 784,
                "nombre" => "BUCARASICA",
                "departamento_id" => 23,
                "estado" => 1,
                "codigo_dane" => "54109"
            ),
            array(
                "id" => 785,
                "nombre" => "CACOTA",
                "departamento_id" => 23,
                "estado" => 1,
                "codigo_dane" => "54125"
            ),
            array(
                "id" => 786,
                "nombre" => "CACHIRA",
                "departamento_id" => 23,
                "estado" => 1,
                "codigo_dane" => "54128"
            ),
            array(
                "id" => 787,
                "nombre" => "CHINACOTA",
                "departamento_id" => 23,
                "estado" => 1,
                "codigo_dane" => "54172"
            ),
            array(
                "id" => 788,
                "nombre" => "CHITAGA",
                "departamento_id" => 23,
                "estado" => 1,
                "codigo_dane" => "54174"
            ),
            array(
                "id" => 789,
                "nombre" => "CONVENCION",
                "departamento_id" => 23,
                "estado" => 1,
                "codigo_dane" => "54206"
            ),
            array(
                "id" => 790,
                "nombre" => "CUCUTILLA",
                "departamento_id" => 23,
                "estado" => 1,
                "codigo_dane" => "54223"
            ),
            array(
                "id" => 791,
                "nombre" => "DURANIA",
                "departamento_id" => 23,
                "estado" => 1,
                "codigo_dane" => "54239"
            ),
            array(
                "id" => 792,
                "nombre" => "EL CARMEN",
                "departamento_id" => 23,
                "estado" => 1,
                "codigo_dane" => "54245"
            ),
            array(
                "id" => 793,
                "nombre" => "EL TARRA",
                "departamento_id" => 23,
                "estado" => 1,
                "codigo_dane" => "54250"
            ),
            array(
                "id" => 794,
                "nombre" => "EL ZULIA",
                "departamento_id" => 23,
                "estado" => 1,
                "codigo_dane" => "54261"
            ),
            array(
                "id" => 795,
                "nombre" => "GRAMALOTE",
                "departamento_id" => 23,
                "estado" => 1,
                "codigo_dane" => "54313"
            ),
            array(
                "id" => 796,
                "nombre" => "HACARI",
                "departamento_id" => 23,
                "estado" => 1,
                "codigo_dane" => "54344"
            ),
            array(
                "id" => 797,
                "nombre" => "HERRAN",
                "departamento_id" => 23,
                "estado" => 1,
                "codigo_dane" => "54347"
            ),
            array(
                "id" => 798,
                "nombre" => "LABATECA",
                "departamento_id" => 23,
                "estado" => 1,
                "codigo_dane" => "54377"
            ),
            array(
                "id" => 799,
                "nombre" => "LA ESPERANZA",
                "departamento_id" => 23,
                "estado" => 1,
                "codigo_dane" => "54385"
            ),
            array(
                "id" => 800,
                "nombre" => "LA PLAYA",
                "departamento_id" => 23,
                "estado" => 1,
                "codigo_dane" => "54398"
            ),
            array(
                "id" => 801,
                "nombre" => "LOS PATIOS",
                "departamento_id" => 23,
                "estado" => 1,
                "codigo_dane" => "54405"
            ),
            array(
                "id" => 802,
                "nombre" => "LOURDES",
                "departamento_id" => 23,
                "estado" => 1,
                "codigo_dane" => "54418"
            ),
            array(
                "id" => 803,
                "nombre" => "MUTISCUA",
                "departamento_id" => 23,
                "estado" => 1,
                "codigo_dane" => "54480"
            ),
            array(
                "id" => 804,
                "nombre" => "OCAÑA",
                "departamento_id" => 23,
                "estado" => 1,
                "codigo_dane" => "54498"
            ),
            array(
                "id" => 805,
                "nombre" => "PAMPLONA",
                "departamento_id" => 23,
                "estado" => 1,
                "codigo_dane" => "54518"
            ),
            array(
                "id" => 806,
                "nombre" => "PAMPLONITA",
                "departamento_id" => 23,
                "estado" => 1,
                "codigo_dane" => "54520"
            ),
            array(
                "id" => 807,
                "nombre" => "PUERTO SANTANDER",
                "departamento_id" => 23,
                "estado" => 1,
                "codigo_dane" => "54553"
            ),
            array(
                "id" => 808,
                "nombre" => "RAGONVALIA",
                "departamento_id" => 23,
                "estado" => 1,
                "codigo_dane" => "54599"
            ),
            array(
                "id" => 809,
                "nombre" => "SALAZAR",
                "departamento_id" => 23,
                "estado" => 1,
                "codigo_dane" => "54660"
            ),
            array(
                "id" => 810,
                "nombre" => "SAN CALIXTO",
                "departamento_id" => 23,
                "estado" => 1,
                "codigo_dane" => "54670"
            ),
            array(
                "id" => 811,
                "nombre" => "SAN CAYETANO",
                "departamento_id" => 23,
                "estado" => 1,
                "codigo_dane" => "54673"
            ),
            array(
                "id" => 812,
                "nombre" => "SANTIAGO",
                "departamento_id" => 23,
                "estado" => 1,
                "codigo_dane" => "54680"
            ),
            array(
                "id" => 813,
                "nombre" => "SARDINATA",
                "departamento_id" => 23,
                "estado" => 1,
                "codigo_dane" => "54720"
            ),
            array(
                "id" => 814,
                "nombre" => "SILOS",
                "departamento_id" => 23,
                "estado" => 1,
                "codigo_dane" => "54743"
            ),
            array(
                "id" => 815,
                "nombre" => "TEORAMA",
                "departamento_id" => 23,
                "estado" => 1,
                "codigo_dane" => "54800"
            ),
            array(
                "id" => 816,
                "nombre" => "TIBU",
                "departamento_id" => 23,
                "estado" => 1,
                "codigo_dane" => "54810"
            ),
            array(
                "id" => 817,
                "nombre" => "TOLEDO",
                "departamento_id" => 23,
                "estado" => 1,
                "codigo_dane" => "54820"
            ),
            array(
                "id" => 818,
                "nombre" => "VILLA CARO",
                "departamento_id" => 23,
                "estado" => 1,
                "codigo_dane" => "54871"
            ),
            array(
                "id" => 819,
                "nombre" => "VILLA DEL ROSARIO",
                "departamento_id" => 23,
                "estado" => 1,
                "codigo_dane" => "54874"
            ),
            array(
                "id" => 820,
                "nombre" => "ARMENIA",
                "departamento_id" => 25,
                "estado" => 1,
                "codigo_dane" => "63001"
            ),
            array(
                "id" => 821,
                "nombre" => "BUENAVISTA",
                "departamento_id" => 25,
                "estado" => 1,
                "codigo_dane" => "63111"
            ),
            array(
                "id" => 822,
                "nombre" => "CALARCA",
                "departamento_id" => 25,
                "estado" => 1,
                "codigo_dane" => "63130"
            ),
            array(
                "id" => 823,
                "nombre" => "CIRCASIA",
                "departamento_id" => 25,
                "estado" => 1,
                "codigo_dane" => "63190"
            ),
            array(
                "id" => 824,
                "nombre" => "CORDOBA",
                "departamento_id" => 25,
                "estado" => 1,
                "codigo_dane" => "63212"
            ),
            array(
                "id" => 825,
                "nombre" => "FILANDIA",
                "departamento_id" => 25,
                "estado" => 1,
                "codigo_dane" => "63272"
            ),
            array(
                "id" => 826,
                "nombre" => "GENOVA",
                "departamento_id" => 25,
                "estado" => 1,
                "codigo_dane" => "63302"
            ),
            array(
                "id" => 827,
                "nombre" => "LA TEBAIDA",
                "departamento_id" => 25,
                "estado" => 1,
                "codigo_dane" => "63401"
            ),
            array(
                "id" => 828,
                "nombre" => "MONTENEGRO",
                "departamento_id" => 25,
                "estado" => 1,
                "codigo_dane" => "63470"
            ),
            array(
                "id" => 829,
                "nombre" => "PIJAO",
                "departamento_id" => 25,
                "estado" => 1,
                "codigo_dane" => "63548"
            ),
            array(
                "id" => 830,
                "nombre" => "QUIMBAYA",
                "departamento_id" => 25,
                "estado" => 1,
                "codigo_dane" => "63594"
            ),
            array(
                "id" => 831,
                "nombre" => "SALENTO",
                "departamento_id" => 25,
                "estado" => 1,
                "codigo_dane" => "63690"
            ),
            array(
                "id" => 832,
                "nombre" => "PEREIRA",
                "departamento_id" => 26,
                "estado" => 1,
                "codigo_dane" => "66001"
            ),
            array(
                "id" => 833,
                "nombre" => "APIA",
                "departamento_id" => 26,
                "estado" => 1,
                "codigo_dane" => "66045"
            ),
            array(
                "id" => 834,
                "nombre" => "BALBOA",
                "departamento_id" => 26,
                "estado" => 1,
                "codigo_dane" => "66075"
            ),
            array(
                "id" => 835,
                "nombre" => "BELEN DE UMBRIA",
                "departamento_id" => 26,
                "estado" => 1,
                "codigo_dane" => "66088"
            ),
            array(
                "id" => 836,
                "nombre" => "DOSQUEBRADAS",
                "departamento_id" => 26,
                "estado" => 1,
                "codigo_dane" => "66170"
            ),
            array(
                "id" => 837,
                "nombre" => "GUATICA",
                "departamento_id" => 26,
                "estado" => 1,
                "codigo_dane" => "66318"
            ),
            array(
                "id" => 838,
                "nombre" => "LA CELIA",
                "departamento_id" => 26,
                "estado" => 1,
                "codigo_dane" => "66383"
            ),
            array(
                "id" => 839,
                "nombre" => "LA VIRGINIA",
                "departamento_id" => 26,
                "estado" => 1,
                "codigo_dane" => "66400"
            ),
            array(
                "id" => 840,
                "nombre" => "MARSELLA",
                "departamento_id" => 26,
                "estado" => 1,
                "codigo_dane" => "66440"
            ),
            array(
                "id" => 841,
                "nombre" => "MISTRATO",
                "departamento_id" => 26,
                "estado" => 1,
                "codigo_dane" => "66456"
            ),
            array(
                "id" => 842,
                "nombre" => "PUEBLO RICO",
                "departamento_id" => 26,
                "estado" => 1,
                "codigo_dane" => "66572"
            ),
            array(
                "id" => 843,
                "nombre" => "QUINCHIA",
                "departamento_id" => 26,
                "estado" => 1,
                "codigo_dane" => "66594"
            ),
            array(
                "id" => 844,
                "nombre" => "SANTA ROSA DE CABAL",
                "departamento_id" => 26,
                "estado" => 1,
                "codigo_dane" => "66682"
            ),
            array(
                "id" => 845,
                "nombre" => "SANTUARIO",
                "departamento_id" => 26,
                "estado" => 1,
                "codigo_dane" => "66687"
            ),
            array(
                "id" => 846,
                "nombre" => "BUCARAMANGA",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68001"
            ),
            array(
                "id" => 847,
                "nombre" => "AGUADA",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68013"
            ),
            array(
                "id" => 848,
                "nombre" => "ALBANIA",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68020"
            ),
            array(
                "id" => 849,
                "nombre" => "ARATOCA",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68051"
            ),
            array(
                "id" => 850,
                "nombre" => "BARBOSA",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68077"
            ),
            array(
                "id" => 851,
                "nombre" => "BARICHARA",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68079"
            ),
            array(
                "id" => 852,
                "nombre" => "BARRANCABERMEJA",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68081"
            ),
            array(
                "id" => 853,
                "nombre" => "BETULIA",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68092"
            ),
            array(
                "id" => 854,
                "nombre" => "BOLIVAR",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68101"
            ),
            array(
                "id" => 855,
                "nombre" => "CABRERA",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68121"
            ),
            array(
                "id" => 856,
                "nombre" => "CALIFORNIA",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68132"
            ),
            array(
                "id" => 857,
                "nombre" => "CAPITANEJO",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68147"
            ),
            array(
                "id" => 858,
                "nombre" => "CARCASI",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68152"
            ),
            array(
                "id" => 859,
                "nombre" => "CEPITA",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68160"
            ),
            array(
                "id" => 860,
                "nombre" => "CERRITO",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68162"
            ),
            array(
                "id" => 861,
                "nombre" => "CHARALA",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68167"
            ),
            array(
                "id" => 862,
                "nombre" => "CHARTA",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68169"
            ),
            array(
                "id" => 863,
                "nombre" => "CHIMA",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68176"
            ),
            array(
                "id" => 864,
                "nombre" => "CHIPATA",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68179"
            ),
            array(
                "id" => 865,
                "nombre" => "CIMITARRA",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68190"
            ),
            array(
                "id" => 866,
                "nombre" => "CONCEPCION",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68207"
            ),
            array(
                "id" => 867,
                "nombre" => "CONFINES",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68209"
            ),
            array(
                "id" => 868,
                "nombre" => "CONTRATACION",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68211"
            ),
            array(
                "id" => 869,
                "nombre" => "COROMORO",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68217"
            ),
            array(
                "id" => 870,
                "nombre" => "CURITI",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68229"
            ),
            array(
                "id" => 871,
                "nombre" => "EL CARMEN DE CHUCURI",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68235"
            ),
            array(
                "id" => 872,
                "nombre" => "EL GUACAMAYO",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68245"
            ),
            array(
                "id" => 873,
                "nombre" => "EL PEÑON",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68250"
            ),
            array(
                "id" => 874,
                "nombre" => "EL PLAYON",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68255"
            ),
            array(
                "id" => 875,
                "nombre" => "ENCINO",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68264"
            ),
            array(
                "id" => 876,
                "nombre" => "ENCISO",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68266"
            ),
            array(
                "id" => 877,
                "nombre" => "FLORIAN",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68271"
            ),
            array(
                "id" => 878,
                "nombre" => "FLORIDABLANCA",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68276"
            ),
            array(
                "id" => 879,
                "nombre" => "GALAN",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68296"
            ),
            array(
                "id" => 880,
                "nombre" => "GAMBITA",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68298"
            ),
            array(
                "id" => 881,
                "nombre" => "GIRON",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68307"
            ),
            array(
                "id" => 882,
                "nombre" => "GUACA",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68318"
            ),
            array(
                "id" => 883,
                "nombre" => "GUADALUPE",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68320"
            ),
            array(
                "id" => 884,
                "nombre" => "GUAPOTA",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68322"
            ),
            array(
                "id" => 885,
                "nombre" => "GUAVATA",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68324"
            ),
            array(
                "id" => 886,
                "nombre" => "GUEPSA",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68327"
            ),
            array(
                "id" => 887,
                "nombre" => "HATO",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68344"
            ),
            array(
                "id" => 888,
                "nombre" => "JESUS MARIA",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68368"
            ),
            array(
                "id" => 889,
                "nombre" => "JORDAN",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68370"
            ),
            array(
                "id" => 890,
                "nombre" => "LA BELLEZA",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68377"
            ),
            array(
                "id" => 891,
                "nombre" => "LANDAZURI",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68385"
            ),
            array(
                "id" => 892,
                "nombre" => "LA PAZ",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68397"
            ),
            array(
                "id" => 893,
                "nombre" => "LEBRIJA",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68406"
            ),
            array(
                "id" => 894,
                "nombre" => "LOS SANTOS",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68418"
            ),
            array(
                "id" => 895,
                "nombre" => "MACARAVITA",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68425"
            ),
            array(
                "id" => 896,
                "nombre" => "MALAGA",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68432"
            ),
            array(
                "id" => 897,
                "nombre" => "MATANZA",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68444"
            ),
            array(
                "id" => 898,
                "nombre" => "MOGOTES",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68464"
            ),
            array(
                "id" => 899,
                "nombre" => "MOLAGAVITA",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68468"
            ),
            array(
                "id" => 900,
                "nombre" => "OCAMONTE",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68498"
            ),
            array(
                "id" => 901,
                "nombre" => "OIBA",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68500"
            ),
            array(
                "id" => 902,
                "nombre" => "ONZAGA",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68502"
            ),
            array(
                "id" => 903,
                "nombre" => "PALMAR",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68522"
            ),
            array(
                "id" => 904,
                "nombre" => "PALMAS DEL SOCORRO",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68524"
            ),
            array(
                "id" => 905,
                "nombre" => "PARAMO",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68533"
            ),
            array(
                "id" => 906,
                "nombre" => "PIEDECUESTA",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68547"
            ),
            array(
                "id" => 907,
                "nombre" => "PINCHOTE",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68549"
            ),
            array(
                "id" => 908,
                "nombre" => "PUENTE NACIONAL",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68572"
            ),
            array(
                "id" => 909,
                "nombre" => "PUERTO PARRA",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68573"
            ),
            array(
                "id" => 910,
                "nombre" => "PUERTO WILCHES",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68575"
            ),
            array(
                "id" => 911,
                "nombre" => "RIONEGRO",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68615"
            ),
            array(
                "id" => 912,
                "nombre" => "SABANA DE TORRES",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68655"
            ),
            array(
                "id" => 913,
                "nombre" => "SAN ANDRES",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68669"
            ),
            array(
                "id" => 914,
                "nombre" => "SAN BENITO",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68673"
            ),
            array(
                "id" => 915,
                "nombre" => "SAN GIL",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68679"
            ),
            array(
                "id" => 916,
                "nombre" => "SAN JOAQUIN",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68682"
            ),
            array(
                "id" => 917,
                "nombre" => "SAN JOSE DE MIRANDA",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68684"
            ),
            array(
                "id" => 918,
                "nombre" => "SAN MIGUEL",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68686"
            ),
            array(
                "id" => 919,
                "nombre" => "SAN VICENTE DE CHUCURI",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68689"
            ),
            array(
                "id" => 920,
                "nombre" => "SANTA BARBARA",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68705"
            ),
            array(
                "id" => 921,
                "nombre" => "SANTA HELENA DEL OPON",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68720"
            ),
            array(
                "id" => 922,
                "nombre" => "SIMACOTA",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68745"
            ),
            array(
                "id" => 923,
                "nombre" => "SOCORRO",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68755"
            ),
            array(
                "id" => 924,
                "nombre" => "SUAITA",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68770"
            ),
            array(
                "id" => 925,
                "nombre" => "SUCRE",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68773"
            ),
            array(
                "id" => 926,
                "nombre" => "SURATA",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68780"
            ),
            array(
                "id" => 927,
                "nombre" => "TONA",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68820"
            ),
            array(
                "id" => 928,
                "nombre" => "VALLE DE SAN JOSE",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68855"
            ),
            array(
                "id" => 929,
                "nombre" => "VELEZ",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68861"
            ),
            array(
                "id" => 930,
                "nombre" => "VETAS",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68867"
            ),
            array(
                "id" => 931,
                "nombre" => "VILLANUEVA",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68872"
            ),
            array(
                "id" => 932,
                "nombre" => "ZAPATOCA",
                "departamento_id" => 28,
                "estado" => 1,
                "codigo_dane" => "68895"
            ),
            array(
                "id" => 933,
                "nombre" => "SINCELEJO",
                "departamento_id" => 29,
                "estado" => 1,
                "codigo_dane" => "70001"
            ),
            array(
                "id" => 934,
                "nombre" => "BUENAVISTA",
                "departamento_id" => 29,
                "estado" => 1,
                "codigo_dane" => "70110"
            ),
            array(
                "id" => 935,
                "nombre" => "CAIMITO",
                "departamento_id" => 29,
                "estado" => 1,
                "codigo_dane" => "70124"
            ),
            array(
                "id" => 936,
                "nombre" => "COLOSO",
                "departamento_id" => 29,
                "estado" => 1,
                "codigo_dane" => "70204"
            ),
            array(
                "id" => 937,
                "nombre" => "COROZAL",
                "departamento_id" => 29,
                "estado" => 1,
                "codigo_dane" => "70215"
            ),
            array(
                "id" => 938,
                "nombre" => "COVEÑAS",
                "departamento_id" => 29,
                "estado" => 1,
                "codigo_dane" => "70221"
            ),
            array(
                "id" => 939,
                "nombre" => "CHALAN",
                "departamento_id" => 29,
                "estado" => 1,
                "codigo_dane" => "70230"
            ),
            array(
                "id" => 940,
                "nombre" => "EL ROBLE",
                "departamento_id" => 29,
                "estado" => 1,
                "codigo_dane" => "70233"
            ),
            array(
                "id" => 941,
                "nombre" => "GALERAS",
                "departamento_id" => 29,
                "estado" => 1,
                "codigo_dane" => "70235"
            ),
            array(
                "id" => 942,
                "nombre" => "GUARANDA",
                "departamento_id" => 29,
                "estado" => 1,
                "codigo_dane" => "70265"
            ),
            array(
                "id" => 943,
                "nombre" => "LA UNION",
                "departamento_id" => 29,
                "estado" => 1,
                "codigo_dane" => "70400"
            ),
            array(
                "id" => 944,
                "nombre" => "LOS PALMITOS",
                "departamento_id" => 29,
                "estado" => 1,
                "codigo_dane" => "70418"
            ),
            array(
                "id" => 945,
                "nombre" => "MAJAGUAL",
                "departamento_id" => 29,
                "estado" => 1,
                "codigo_dane" => "70429"
            ),
            array(
                "id" => 946,
                "nombre" => "MORROA",
                "departamento_id" => 29,
                "estado" => 1,
                "codigo_dane" => "70473"
            ),
            array(
                "id" => 947,
                "nombre" => "OVEJAS",
                "departamento_id" => 29,
                "estado" => 1,
                "codigo_dane" => "70508"
            ),
            array(
                "id" => 948,
                "nombre" => "PALMITO",
                "departamento_id" => 29,
                "estado" => 1,
                "codigo_dane" => "70523"
            ),
            array(
                "id" => 949,
                "nombre" => "SAMPUES",
                "departamento_id" => 29,
                "estado" => 1,
                "codigo_dane" => "70670"
            ),
            array(
                "id" => 950,
                "nombre" => "SAN BENITO ABAD",
                "departamento_id" => 29,
                "estado" => 1,
                "codigo_dane" => "70678"
            ),
            array(
                "id" => 951,
                "nombre" => "SAN JUAN DE BETULIA",
                "departamento_id" => 29,
                "estado" => 1,
                "codigo_dane" => "70702"
            ),
            array(
                "id" => 952,
                "nombre" => "SAN MARCOS",
                "departamento_id" => 29,
                "estado" => 1,
                "codigo_dane" => "70708"
            ),
            array(
                "id" => 953,
                "nombre" => "SAN ONOFRE",
                "departamento_id" => 29,
                "estado" => 1,
                "codigo_dane" => "70713"
            ),
            array(
                "id" => 954,
                "nombre" => "SAN PEDRO",
                "departamento_id" => 29,
                "estado" => 1,
                "codigo_dane" => "70717"
            ),
            array(
                "id" => 955,
                "nombre" => "SAN LUIS DE SINCE",
                "departamento_id" => 29,
                "estado" => 1,
                "codigo_dane" => "70742"
            ),
            array(
                "id" => 956,
                "nombre" => "SUCRE",
                "departamento_id" => 29,
                "estado" => 1,
                "codigo_dane" => "70771"
            ),
            array(
                "id" => 957,
                "nombre" => "SANTIAGO DE TOLU",
                "departamento_id" => 29,
                "estado" => 1,
                "codigo_dane" => "70820"
            ),
            array(
                "id" => 958,
                "nombre" => "TOLU VIEJO",
                "departamento_id" => 29,
                "estado" => 1,
                "codigo_dane" => "70823"
            ),
            array(
                "id" => 959,
                "nombre" => "IBAGUE",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73001"
            ),
            array(
                "id" => 960,
                "nombre" => "ALPUJARRA",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73024"
            ),
            array(
                "id" => 961,
                "nombre" => "ALVARADO",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73026"
            ),
            array(
                "id" => 962,
                "nombre" => "AMBALEMA",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73030"
            ),
            array(
                "id" => 963,
                "nombre" => "ANZOATEGUI",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73043"
            ),
            array(
                "id" => 964,
                "nombre" => "ARMERO",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73055"
            ),
            array(
                "id" => 965,
                "nombre" => "ATACO",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73067"
            ),
            array(
                "id" => 966,
                "nombre" => "CAJAMARCA",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73124"
            ),
            array(
                "id" => 967,
                "nombre" => "CARMEN DE APICALA",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73148"
            ),
            array(
                "id" => 968,
                "nombre" => "CASABIANCA",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73152"
            ),
            array(
                "id" => 969,
                "nombre" => "CHAPARRAL",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73168"
            ),
            array(
                "id" => 970,
                "nombre" => "COELLO",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73200"
            ),
            array(
                "id" => 971,
                "nombre" => "COYAIMA",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73217"
            ),
            array(
                "id" => 972,
                "nombre" => "CUNDAY",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73226"
            ),
            array(
                "id" => 973,
                "nombre" => "DOLORES",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73236"
            ),
            array(
                "id" => 974,
                "nombre" => "ESPINAL",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73268"
            ),
            array(
                "id" => 975,
                "nombre" => "FALAN",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73270"
            ),
            array(
                "id" => 976,
                "nombre" => "FLANDES",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73275"
            ),
            array(
                "id" => 977,
                "nombre" => "FRESNO",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73283"
            ),
            array(
                "id" => 978,
                "nombre" => "GUAMO",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73319"
            ),
            array(
                "id" => 979,
                "nombre" => "HERVEO",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73347"
            ),
            array(
                "id" => 980,
                "nombre" => "HONDA",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73349"
            ),
            array(
                "id" => 981,
                "nombre" => "ICONONZO",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73352"
            ),
            array(
                "id" => 982,
                "nombre" => "LERIDA",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73408"
            ),
            array(
                "id" => 983,
                "nombre" => "LIBANO",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73411"
            ),
            array(
                "id" => 984,
                "nombre" => "MARIQUITA",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73443"
            ),
            array(
                "id" => 985,
                "nombre" => "MELGAR",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73449"
            ),
            array(
                "id" => 986,
                "nombre" => "MURILLO",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73461"
            ),
            array(
                "id" => 987,
                "nombre" => "NATAGAIMA",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73483"
            ),
            array(
                "id" => 988,
                "nombre" => "ORTEGA",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73504"
            ),
            array(
                "id" => 989,
                "nombre" => "PALOCABILDO",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73520"
            ),
            array(
                "id" => 990,
                "nombre" => "PIEDRAS",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73547"
            ),
            array(
                "id" => 991,
                "nombre" => "PLANADAS",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73555"
            ),
            array(
                "id" => 992,
                "nombre" => "PRADO",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73563"
            ),
            array(
                "id" => 993,
                "nombre" => "PURIFICACION",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73585"
            ),
            array(
                "id" => 994,
                "nombre" => "RIOBLANCO",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73616"
            ),
            array(
                "id" => 995,
                "nombre" => "RONCESVALLES",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73622"
            ),
            array(
                "id" => 996,
                "nombre" => "ROVIRA",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73624"
            ),
            array(
                "id" => 997,
                "nombre" => "SALDAÑA",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73671"
            ),
            array(
                "id" => 998,
                "nombre" => "SAN ANTONIO",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73675"
            ),
            array(
                "id" => 999,
                "nombre" => "SAN LUIS",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73678"
            ),
            array(
                "id" => 1000,
                "nombre" => "SANTA ISABEL",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73686"
            ),
            array(
                "id" => 1001,
                "nombre" => "SUAREZ",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73770"
            ),
            array(
                "id" => 1002,
                "nombre" => "VALLE DE SAN JUAN",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73854"
            ),
            array(
                "id" => 1003,
                "nombre" => "VENADILLO",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73861"
            ),
            array(
                "id" => 1004,
                "nombre" => "VILLAHERMOSA",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73870"
            ),
            array(
                "id" => 1005,
                "nombre" => "VILLARRICA",
                "departamento_id" => 30,
                "estado" => 1,
                "codigo_dane" => "73873"
            ),
            array(
                "id" => 1006,
                "nombre" => "CALI",
                "departamento_id" => 31,
                "estado" => 1,
                "codigo_dane" => "76001"
            ),
            array(
                "id" => 1007,
                "nombre" => "ALCALA",
                "departamento_id" => 31,
                "estado" => 1,
                "codigo_dane" => "76020"
            ),
            array(
                "id" => 1008,
                "nombre" => "ANDALUCIA",
                "departamento_id" => 31,
                "estado" => 1,
                "codigo_dane" => "76036"
            ),
            array(
                "id" => 1009,
                "nombre" => "ANSERMANUEVO",
                "departamento_id" => 31,
                "estado" => 1,
                "codigo_dane" => "76041"
            ),
            array(
                "id" => 1010,
                "nombre" => "ARGELIA",
                "departamento_id" => 31,
                "estado" => 1,
                "codigo_dane" => "76054"
            ),
            array(
                "id" => 1011,
                "nombre" => "BOLIVAR",
                "departamento_id" => 31,
                "estado" => 1,
                "codigo_dane" => "76100"
            ),
            array(
                "id" => 1012,
                "nombre" => "BUENAVENTURA",
                "departamento_id" => 31,
                "estado" => 1,
                "codigo_dane" => "76109"
            ),
            array(
                "id" => 1013,
                "nombre" => "BUGA",
                "departamento_id" => 31,
                "estado" => 1,
                "codigo_dane" => "76111"
            ),
            array(
                "id" => 1014,
                "nombre" => "BUGALAGRANDE",
                "departamento_id" => 31,
                "estado" => 1,
                "codigo_dane" => "76113"
            ),
            array(
                "id" => 1015,
                "nombre" => "CAICEDONIA",
                "departamento_id" => 31,
                "estado" => 1,
                "codigo_dane" => "76122"
            ),
            array(
                "id" => 1016,
                "nombre" => "CALIMA",
                "departamento_id" => 31,
                "estado" => 1,
                "codigo_dane" => "76126"
            ),
            array(
                "id" => 1017,
                "nombre" => "CANDELARIA",
                "departamento_id" => 31,
                "estado" => 1,
                "codigo_dane" => "76130"
            ),
            array(
                "id" => 1018,
                "nombre" => "CARTAGO",
                "departamento_id" => 31,
                "estado" => 1,
                "codigo_dane" => "76147"
            ),
            array(
                "id" => 1019,
                "nombre" => "DAGUA",
                "departamento_id" => 31,
                "estado" => 1,
                "codigo_dane" => "76233"
            ),
            array(
                "id" => 1020,
                "nombre" => "EL AGUILA",
                "departamento_id" => 31,
                "estado" => 1,
                "codigo_dane" => "76243"
            ),
            array(
                "id" => 1021,
                "nombre" => "EL CAIRO",
                "departamento_id" => 31,
                "estado" => 1,
                "codigo_dane" => "76246"
            ),
            array(
                "id" => 1022,
                "nombre" => "EL CERRITO",
                "departamento_id" => 31,
                "estado" => 1,
                "codigo_dane" => "76248"
            ),
            array(
                "id" => 1023,
                "nombre" => "EL DOVIO",
                "departamento_id" => 31,
                "estado" => 1,
                "codigo_dane" => "76250"
            ),
            array(
                "id" => 1024,
                "nombre" => "FLORIDA",
                "departamento_id" => 31,
                "estado" => 1,
                "codigo_dane" => "76275"
            ),
            array(
                "id" => 1025,
                "nombre" => "GINEBRA",
                "departamento_id" => 31,
                "estado" => 1,
                "codigo_dane" => "76306"
            ),
            array(
                "id" => 1026,
                "nombre" => "GUACARI",
                "departamento_id" => 31,
                "estado" => 1,
                "codigo_dane" => "76318"
            ),
            array(
                "id" => 1027,
                "nombre" => "JAMUNDI",
                "departamento_id" => 31,
                "estado" => 1,
                "codigo_dane" => "76364"
            ),
            array(
                "id" => 1028,
                "nombre" => "LA CUMBRE",
                "departamento_id" => 31,
                "estado" => 1,
                "codigo_dane" => "76377"
            ),
            array(
                "id" => 1029,
                "nombre" => "LA UNION",
                "departamento_id" => 31,
                "estado" => 1,
                "codigo_dane" => "76400"
            ),
            array(
                "id" => 1030,
                "nombre" => "LA VICTORIA",
                "departamento_id" => 31,
                "estado" => 1,
                "codigo_dane" => "76403"
            ),
            array(
                "id" => 1031,
                "nombre" => "OBANDO",
                "departamento_id" => 31,
                "estado" => 1,
                "codigo_dane" => "76497"
            ),
            array(
                "id" => 1032,
                "nombre" => "PALMIRA",
                "departamento_id" => 31,
                "estado" => 1,
                "codigo_dane" => "76520"
            ),
            array(
                "id" => 1033,
                "nombre" => "PRADERA",
                "departamento_id" => 31,
                "estado" => 1,
                "codigo_dane" => "76563"
            ),
            array(
                "id" => 1034,
                "nombre" => "RESTREPO",
                "departamento_id" => 31,
                "estado" => 1,
                "codigo_dane" => "76606"
            ),
            array(
                "id" => 1035,
                "nombre" => "RIOFRIO",
                "departamento_id" => 31,
                "estado" => 1,
                "codigo_dane" => "76616"
            ),
            array(
                "id" => 1036,
                "nombre" => "ROLDANILLO",
                "departamento_id" => 31,
                "estado" => 1,
                "codigo_dane" => "76622"
            ),
            array(
                "id" => 1037,
                "nombre" => "SAN PEDRO",
                "departamento_id" => 31,
                "estado" => 1,
                "codigo_dane" => "76670"
            ),
            array(
                "id" => 1038,
                "nombre" => "SEVILLA",
                "departamento_id" => 31,
                "estado" => 1,
                "codigo_dane" => "76736"
            ),
            array(
                "id" => 1039,
                "nombre" => "TORO",
                "departamento_id" => 31,
                "estado" => 1,
                "codigo_dane" => "76823"
            ),
            array(
                "id" => 1040,
                "nombre" => "TRUJILLO",
                "departamento_id" => 31,
                "estado" => 1,
                "codigo_dane" => "76828"
            ),
            array(
                "id" => 1041,
                "nombre" => "TULUA",
                "departamento_id" => 31,
                "estado" => 1,
                "codigo_dane" => "76834"
            ),
            array(
                "id" => 1042,
                "nombre" => "ULLOA",
                "departamento_id" => 31,
                "estado" => 1,
                "codigo_dane" => "76845"
            ),
            array(
                "id" => 1043,
                "nombre" => "VERSALLES",
                "departamento_id" => 31,
                "estado" => 1,
                "codigo_dane" => "76863"
            ),
            array(
                "id" => 1044,
                "nombre" => "VIJES",
                "departamento_id" => 31,
                "estado" => 1,
                "codigo_dane" => "76869"
            ),
            array(
                "id" => 1045,
                "nombre" => "YOTOCO",
                "departamento_id" => 31,
                "estado" => 1,
                "codigo_dane" => "76890"
            ),
            array(
                "id" => 1046,
                "nombre" => "YUMBO",
                "departamento_id" => 31,
                "estado" => 1,
                "codigo_dane" => "76892"
            ),
            array(
                "id" => 1047,
                "nombre" => "ZARZAL",
                "departamento_id" => 31,
                "estado" => 1,
                "codigo_dane" => "76895"
            ),
            array(
                "id" => 1048,
                "nombre" => "ARAUCA",
                "departamento_id" => 3,
                "estado" => 1,
                "codigo_dane" => "81001"
            ),
            array(
                "id" => 1049,
                "nombre" => "ARAUQUITA",
                "departamento_id" => 3,
                "estado" => 1,
                "codigo_dane" => "81065"
            ),
            array(
                "id" => 1050,
                "nombre" => "CRAVO NORTE",
                "departamento_id" => 3,
                "estado" => 1,
                "codigo_dane" => "81220"
            ),
            array(
                "id" => 1051,
                "nombre" => "FORTUL",
                "departamento_id" => 3,
                "estado" => 1,
                "codigo_dane" => "81300"
            ),
            array(
                "id" => 1052,
                "nombre" => "PUERTO RONDON",
                "departamento_id" => 3,
                "estado" => 1,
                "codigo_dane" => "81591"
            ),
            array(
                "id" => 1053,
                "nombre" => "SARAVENA",
                "departamento_id" => 3,
                "estado" => 1,
                "codigo_dane" => "81736"
            ),
            array(
                "id" => 1054,
                "nombre" => "TAME",
                "departamento_id" => 3,
                "estado" => 1,
                "codigo_dane" => "81794"
            ),
            array(
                "id" => 1055,
                "nombre" => "YOPAL",
                "departamento_id" => 10,
                "estado" => 1,
                "codigo_dane" => "85001"
            ),
            array(
                "id" => 1056,
                "nombre" => "AGUAZUL",
                "departamento_id" => 10,
                "estado" => 1,
                "codigo_dane" => "85010"
            ),
            array(
                "id" => 1057,
                "nombre" => "CHAMEZA",
                "departamento_id" => 10,
                "estado" => 1,
                "codigo_dane" => "85015"
            ),
            array(
                "id" => 1058,
                "nombre" => "HATO COROZAL",
                "departamento_id" => 10,
                "estado" => 1,
                "codigo_dane" => "85125"
            ),
            array(
                "id" => 1059,
                "nombre" => "LA SALINA",
                "departamento_id" => 10,
                "estado" => 1,
                "codigo_dane" => "85136"
            ),
            array(
                "id" => 1060,
                "nombre" => "MANI",
                "departamento_id" => 10,
                "estado" => 1,
                "codigo_dane" => "85139"
            ),
            array(
                "id" => 1061,
                "nombre" => "MONTERREY",
                "departamento_id" => 10,
                "estado" => 1,
                "codigo_dane" => "85162"
            ),
            array(
                "id" => 1062,
                "nombre" => "NUNCHIA",
                "departamento_id" => 10,
                "estado" => 1,
                "codigo_dane" => "85225"
            ),
            array(
                "id" => 1063,
                "nombre" => "OROCUE",
                "departamento_id" => 10,
                "estado" => 1,
                "codigo_dane" => "85230"
            ),
            array(
                "id" => 1064,
                "nombre" => "PAZ DE ARIPORO",
                "departamento_id" => 10,
                "estado" => 1,
                "codigo_dane" => "85250"
            ),
            array(
                "id" => 1065,
                "nombre" => "PORE",
                "departamento_id" => 10,
                "estado" => 1,
                "codigo_dane" => "85263"
            ),
            array(
                "id" => 1066,
                "nombre" => "RECETOR",
                "departamento_id" => 10,
                "estado" => 1,
                "codigo_dane" => "85279"
            ),
            array(
                "id" => 1067,
                "nombre" => "SABANALARGA",
                "departamento_id" => 10,
                "estado" => 1,
                "codigo_dane" => "85300"
            ),
            array(
                "id" => 1068,
                "nombre" => "SACAMA",
                "departamento_id" => 10,
                "estado" => 1,
                "codigo_dane" => "85315"
            ),
            array(
                "id" => 1069,
                "nombre" => "SAN LUIS DE PALENQUE",
                "departamento_id" => 10,
                "estado" => 1,
                "codigo_dane" => "85325"
            ),
            array(
                "id" => 1070,
                "nombre" => "TAMARA",
                "departamento_id" => 10,
                "estado" => 1,
                "codigo_dane" => "85400"
            ),
            array(
                "id" => 1071,
                "nombre" => "TAURAMENA",
                "departamento_id" => 10,
                "estado" => 1,
                "codigo_dane" => "85410"
            ),
            array(
                "id" => 1072,
                "nombre" => "TRINIDAD",
                "departamento_id" => 10,
                "estado" => 1,
                "codigo_dane" => "85430"
            ),
            array(
                "id" => 1073,
                "nombre" => "VILLANUEVA",
                "departamento_id" => 10,
                "estado" => 1,
                "codigo_dane" => "85440"
            ),
            array(
                "id" => 1074,
                "nombre" => "MOCOA",
                "departamento_id" => 24,
                "estado" => 1,
                "codigo_dane" => "86001"
            ),
            array(
                "id" => 1075,
                "nombre" => "COLON",
                "departamento_id" => 24,
                "estado" => 1,
                "codigo_dane" => "86219"
            ),
            array(
                "id" => 1076,
                "nombre" => "ORITO",
                "departamento_id" => 24,
                "estado" => 1,
                "codigo_dane" => "86320"
            ),
            array(
                "id" => 1077,
                "nombre" => "PUERTO ASIS",
                "departamento_id" => 24,
                "estado" => 1,
                "codigo_dane" => "86568"
            ),
            array(
                "id" => 1078,
                "nombre" => "PUERTO CAICEDO",
                "departamento_id" => 24,
                "estado" => 1,
                "codigo_dane" => "86569"
            ),
            array(
                "id" => 1079,
                "nombre" => "PUERTO GUZMAN",
                "departamento_id" => 24,
                "estado" => 1,
                "codigo_dane" => "86571"
            ),
            array(
                "id" => 1080,
                "nombre" => "PUERTO LEGUIZAMO",
                "departamento_id" => 24,
                "estado" => 1,
                "codigo_dane" => "86573"
            ),
            array(
                "id" => 1081,
                "nombre" => "SIBUNDOY",
                "departamento_id" => 24,
                "estado" => 1,
                "codigo_dane" => "86749"
            ),
            array(
                "id" => 1082,
                "nombre" => "SAN FRANCISCO",
                "departamento_id" => 24,
                "estado" => 1,
                "codigo_dane" => "86755"
            ),
            array(
                "id" => 1083,
                "nombre" => "SAN MIGUEL",
                "departamento_id" => 24,
                "estado" => 1,
                "codigo_dane" => "86757"
            ),
            array(
                "id" => 1084,
                "nombre" => "SANTIAGO",
                "departamento_id" => 24,
                "estado" => 1,
                "codigo_dane" => "86760"
            ),
            array(
                "id" => 1085,
                "nombre" => "VALLE DEL GUAMUEZ",
                "departamento_id" => 24,
                "estado" => 1,
                "codigo_dane" => "86865"
            ),
            array(
                "id" => 1086,
                "nombre" => "VILLAGARZON",
                "departamento_id" => 24,
                "estado" => 1,
                "codigo_dane" => "86885"
            ),
            array(
                "id" => 1087,
                "nombre" => "SAN ANDRES",
                "departamento_id" => 27,
                "estado" => 1,
                "codigo_dane" => "88001"
            ),
            array(
                "id" => 1088,
                "nombre" => "PROVIDENCIA",
                "departamento_id" => 27,
                "estado" => 1,
                "codigo_dane" => "88564"
            ),
            array(
                "id" => 1089,
                "nombre" => "LETICIA",
                "departamento_id" => 1,
                "estado" => 1,
                "codigo_dane" => "91001"
            ),
            array(
                "id" => 1090,
                "nombre" => "EL ENCANTO",
                "departamento_id" => 1,
                "estado" => 1,
                "codigo_dane" => "91263"
            ),
            array(
                "id" => 1091,
                "nombre" => "LA CHORRERA",
                "departamento_id" => 1,
                "estado" => 1,
                "codigo_dane" => "91405"
            ),
            array(
                "id" => 1092,
                "nombre" => "LA PEDRERA",
                "departamento_id" => 1,
                "estado" => 1,
                "codigo_dane" => "91407"
            ),
            array(
                "id" => 1093,
                "nombre" => "LA VICTORIA",
                "departamento_id" => 1,
                "estado" => 1,
                "codigo_dane" => "91430"
            ),
            array(
                "id" => 1094,
                "nombre" => "MIRITI-PARANA",
                "departamento_id" => 1,
                "estado" => 1,
                "codigo_dane" => "91460"
            ),
            array(
                "id" => 1095,
                "nombre" => "PUERTO ALEGRIA",
                "departamento_id" => 1,
                "estado" => 1,
                "codigo_dane" => "91530"
            ),
            array(
                "id" => 1096,
                "nombre" => "PUERTO ARICA",
                "departamento_id" => 1,
                "estado" => 1,
                "codigo_dane" => "91536"
            ),
            array(
                "id" => 1097,
                "nombre" => "PUERTO NARIÑO",
                "departamento_id" => 1,
                "estado" => 1,
                "codigo_dane" => "91540"
            ),
            array(
                "id" => 1098,
                "nombre" => "PUERTO SANTANDER",
                "departamento_id" => 1,
                "estado" => 1,
                "codigo_dane" => "91669"
            ),
            array(
                "id" => 1099,
                "nombre" => "TARAPACA",
                "departamento_id" => 1,
                "estado" => 1,
                "codigo_dane" => "91798"
            ),
            array(
                "id" => 1100,
                "nombre" => "INIRIDA",
                "departamento_id" => 16,
                "estado" => 1,
                "codigo_dane" => "94001"
            ),
            array(
                "id" => 1101,
                "nombre" => "BARRANCO MINAS",
                "departamento_id" => 16,
                "estado" => 1,
                "codigo_dane" => "94343"
            ),
            array(
                "id" => 1102,
                "nombre" => "MAPIRIPANA",
                "departamento_id" => 16,
                "estado" => 1,
                "codigo_dane" => "94663"
            ),
            array(
                "id" => 1103,
                "nombre" => "SAN FELIPE",
                "departamento_id" => 16,
                "estado" => 1,
                "codigo_dane" => "94883"
            ),
            array(
                "id" => 1104,
                "nombre" => "PUERTO COLOMBIA",
                "departamento_id" => 16,
                "estado" => 1,
                "codigo_dane" => "94884"
            ),
            array(
                "id" => 1105,
                "nombre" => "LA GUADALUPE",
                "departamento_id" => 16,
                "estado" => 1,
                "codigo_dane" => "94885"
            ),
            array(
                "id" => 1106,
                "nombre" => "CACAHUAL",
                "departamento_id" => 16,
                "estado" => 1,
                "codigo_dane" => "94886"
            ),
            array(
                "id" => 1107,
                "nombre" => "PANA PANA",
                "departamento_id" => 16,
                "estado" => 1,
                "codigo_dane" => "94887"
            ),
            array(
                "id" => 1108,
                "nombre" => "MORICHAL",
                "departamento_id" => 16,
                "estado" => 1,
                "codigo_dane" => "94888"
            ),
            array(
                "id" => 1109,
                "nombre" => "SAN JOSE DEL GUAVIARE",
                "departamento_id" => 18,
                "estado" => 1,
                "codigo_dane" => "95001"
            ),
            array(
                "id" => 1110,
                "nombre" => "CALAMAR",
                "departamento_id" => 18,
                "estado" => 1,
                "codigo_dane" => "95015"
            ),
            array(
                "id" => 1111,
                "nombre" => "EL RETORNO",
                "departamento_id" => 18,
                "estado" => 1,
                "codigo_dane" => "95025"
            ),
            array(
                "id" => 1112,
                "nombre" => "MIRAFLORES",
                "departamento_id" => 18,
                "estado" => 1,
                "codigo_dane" => "95200"
            ),
            array(
                "id" => 1113,
                "nombre" => "MITU",
                "departamento_id" => 32,
                "estado" => 1,
                "codigo_dane" => "97001"
            ),
            array(
                "id" => 1114,
                "nombre" => "CARURU",
                "departamento_id" => 32,
                "estado" => 1,
                "codigo_dane" => "97161"
            ),
            array(
                "id" => 1115,
                "nombre" => "PACOA",
                "departamento_id" => 32,
                "estado" => 1,
                "codigo_dane" => "97511"
            ),
            array(
                "id" => 1116,
                "nombre" => "TARAIRA",
                "departamento_id" => 32,
                "estado" => 1,
                "codigo_dane" => "97666"
            ),
            array(
                "id" => 1117,
                "nombre" => "PAPUNAUA",
                "departamento_id" => 32,
                "estado" => 1,
                "codigo_dane" => "97777"
            ),
            array(
                "id" => 1118,
                "nombre" => "YAVARATE",
                "departamento_id" => 32,
                "estado" => 1,
                "codigo_dane" => "97889"
            ),
            array(
                "id" => 1119,
                "nombre" => "PUERTO CARREÑO",
                "departamento_id" => 33,
                "estado" => 1,
                "codigo_dane" => "99001"
            ),
            array(
                "id" => 1120,
                "nombre" => "LA PRIMAVERA",
                "departamento_id" => 33,
                "estado" => 1,
                "codigo_dane" => "99524"
            ),
            array(
                "id" => 1121,
                "nombre" => "SANTA ROSALIA",
                "departamento_id" => 33,
                "estado" => 1,
                "codigo_dane" => "99624"
            ),
            array(
                "id" => 1122,
                "nombre" => "CUMARIBO",
                "departamento_id" => 33,
                "estado" => 1,
                "codigo_dane" => "99773"
            ),
            array(
                "id" => 1152,
                "nombre" => "NUEVA CIUDADD",
                "departamento_id" => 1,
                "estado" => 1,
                "codigo_dane" => "11112"
            )
        ));
    }
}
