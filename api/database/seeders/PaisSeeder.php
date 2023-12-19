<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("pais")->insert(array(
            array(
                "id" => 12,
                "nombre" => "COLOMBIA",
                "estado" => 1,
                "abreviatura" => "COL",
                "extension" => 'CO',
                "codigo_telefono" => "57",
                "codigo_dian" => "169"
            ),
            array(
                "id" => 13,
                "nombre" => "MÉXICO",
                "estado" => 0,
                "abreviatura" => "MEX",
                "extension" => '',
                "codigo_telefono" => "52",
                "codigo_dian" => "493"
            ),
            array(
                "id" => 14,
                "nombre" => "CANADÁ",
                "estado" => 0,
                "abreviatura" => "CAN",
                "extension" => '',
                "codigo_telefono" => "1",
                "codigo_dian" => "149"
            ),
            array(
                "id" => 15,
                "nombre" => "PERÚ",
                "estado" => 0,
                "abreviatura" => "PER",
                "extension" => '',
                "codigo_telefono" => "51",
                "codigo_dian" => "589"
            ),
            array(
                "id" => 16,
                "nombre" => "ARGENTINA",
                "estado" => 0,
                "abreviatura" => "ARG",
                "extension" => '',
                "codigo_telefono" => "74",
                "codigo_dian" => "063"
            ),
            array(
                "id" => 18,
                "nombre" => "BRASIL",
                "estado" => 0,
                "abreviatura" => "BRA",
                "extension" => '',
                "codigo_telefono" => "55",
                "codigo_dian" => "105"
            ),
            array(
                "id" => 19,
                "nombre" => "ITALIA",
                "estado" => 0,
                "abreviatura" => "ITA",
                "extension" => '',
                "codigo_telefono" => "39",
                "codigo_dian" => "386"
            ),
            array(
                "id" => 20,
                "nombre" => "CHINA",
                "estado" => 0,
                "abreviatura" => "CHN",
                "extension" => '',
                "codigo_telefono" => "86",
                "codigo_dian" => "215"
            ),
            array(
                "id" => 21,
                "nombre" => "CHILE",
                "estado" => 0,
                "abreviatura" => "CHL",
                "extension" => '',
                "codigo_telefono" => "56",
                "codigo_dian" => "211"
            ),
            array(
                "id" => 22,
                "nombre" => "ECUADOR",
                "estado" => 0,
                "abreviatura" => "ECU",
                "extension" => '',
                "codigo_telefono" => "593",
                "codigo_dian" => "239"
            ),
            array(
                "id" => 23,
                "nombre" => "CUBA",
                "estado" => 0,
                "abreviatura" => "CUB",
                "extension" => '',
                "codigo_telefono" => "53",
                "codigo_dian" => "199"
            ),
            array(
                "id" => 26,
                "nombre" => "COSTA RICA",
                "estado" => 0,
                "abreviatura" => "CRI",
                "extension" => '',
                "codigo_telefono" => "506",
                "codigo_dian" => "196"
            ),
            array(
                "id" => 27,
                "nombre" => "ALEMANIA",
                "estado" => 0,
                "abreviatura" => "DEU",
                "extension" => '',
                "codigo_telefono" => "49",
                "codigo_dian" => "023"
            ),
            array(
                "id" => 29,
                "nombre" => "ARUBA",
                "estado" => 0,
                "abreviatura" => "ABW",
                "extension" => '',
                "codigo_telefono" => "297",
                "codigo_dian" => "027"
            ),
            array(
                "id" => 31,
                "nombre" => "AUSTRALIA",
                "estado" => 0,
                "abreviatura" => "AUS",
                "extension" => '',
                "codigo_telefono" => "61",
                "codigo_dian" => "069"
            ),
            array(
                "id" => 32,
                "nombre" => "AUSTRIA",
                "estado" => 0,
                "abreviatura" => "AUT",
                "extension" => '',
                "codigo_telefono" => "43",
                "codigo_dian" => "072"
            ),
            array(
                "id" => 33,
                "nombre" => "BAHAMAS",
                "estado" => 0,
                "abreviatura" => "BHS",
                "extension" => '',
                "codigo_telefono" => "1002",
                "codigo_dian" => "077"
            ),
            array(
                "id" => 34,
                "nombre" => "BELGICA",
                "estado" => 0,
                "abreviatura" => "BEL",
                "extension" => '',
                "codigo_telefono" => "32",
                "codigo_dian" => "087"
            ),
            array(
                "id" => 35,
                "nombre" => "BELICE",
                "estado" => 0,
                "abreviatura" => "BLZ",
                "extension" => '',
                "codigo_telefono" => "501",
                "codigo_dian" => "088"
            ),
            array(
                "id" => 36,
                "nombre" => "BOLIVIA",
                "estado" => 0,
                "abreviatura" => "BOL",
                "extension" => '',
                "codigo_telefono" => "591",
                "codigo_dian" => "097"
            ),
            array(
                "id" => 38,
                "nombre" => "EGIPTO",
                "estado" => 0,
                "abreviatura" => "EGY",
                "extension" => '',
                "codigo_telefono" => "20",
                "codigo_dian" => "240"
            ),
            array(
                "id" => 39,
                "nombre" => "EL SALVADOR",
                "estado" => 0,
                "abreviatura" => "SLV",
                "extension" => '',
                "codigo_telefono" => "503",
                "codigo_dian" => "242"
            ),
            array(
                "id" => 40,
                "nombre" => "ESPAÑA",
                "estado" => 0,
                "abreviatura" => "ESP",
                "extension" => '',
                "codigo_telefono" => "34",
                "codigo_dian" => "245"
            ),
            array(
                "id" => 41,
                "nombre" => "ESTADOS UNIDOS (USA)",
                "estado" => 0,
                "abreviatura" => "USA",
                "extension" => '',
                "codigo_telefono" => "1",
                "codigo_dian" => "249"
            ),
            array(
                "id" => 42,
                "nombre" => "FILIPINAS",
                "estado" => 0,
                "abreviatura" => "PHL",
                "extension" => '',
                "codigo_telefono" => "63",
                "codigo_dian" => "267"
            ),
            array(
                "id" => 43,
                "nombre" => "FRANCIA",
                "estado" => 0,
                "abreviatura" => "FRA",
                "extension" => '',
                "codigo_telefono" => "33",
                "codigo_dian" => "275"
            ),
            array(
                "id" => 44,
                "nombre" => "GRECIA",
                "estado" => 0,
                "abreviatura" => "GRC",
                "extension" => '',
                "codigo_telefono" => "30",
                "codigo_dian" => "301"
            ),
            array(
                "id" => 45,
                "nombre" => "GUATEMALA",
                "estado" => 0,
                "abreviatura" => "GTM",
                "extension" => '',
                "codigo_telefono" => "502",
                "codigo_dian" => "317"
            ),
            array(
                "id" => 46,
                "nombre" => "GUAYANA FRANCESA",
                "estado" => 0,
                "abreviatura" => "GUF",
                "extension" => '',
                "codigo_telefono" => "594",
                "codigo_dian" => "325"
            ),
            array(
                "id" => 47,
                "nombre" => "HAITI",
                "estado" => 0,
                "abreviatura" => "HTI",
                "extension" => '',
                "codigo_telefono" => "509",
                "codigo_dian" => "341"
            ),
            array(
                "id" => 50,
                "nombre" => "JAMAICA",
                "estado" => 0,
                "abreviatura" => "JAM",
                "extension" => '',
                "codigo_telefono" => "1010",
                "codigo_dian" => "391"
            ),
            array(
                "id" => 51,
                "nombre" => "JAPON",
                "estado" => 0,
                "abreviatura" => "JPN",
                "extension" => '',
                "codigo_telefono" => "81",
                "codigo_dian" => "399"
            ),
            array(
                "id" => 53,
                "nombre" => "MONACO",
                "estado" => 0,
                "abreviatura" => "MCO",
                "extension" => '',
                "codigo_telefono" => "377",
                "codigo_dian" => "498"
            ),
            array(
                "id" => 54,
                "nombre" => "NORUEGA",
                "estado" => 0,
                "abreviatura" => "NOR",
                "extension" => '',
                "codigo_telefono" => "47",
                "codigo_dian" => "538"
            ),
            array(
                "id" => 55,
                "nombre" => "PANAMA",
                "estado" => 0,
                "abreviatura" => "PAN",
                "extension" => '',
                "codigo_telefono" => "507",
                "codigo_dian" => "580"
            ),
            array(
                "id" => 56,
                "nombre" => "PARAGUAY",
                "estado" => 0,
                "abreviatura" => "PRY",
                "extension" => '',
                "codigo_telefono" => "595",
                "codigo_dian" => "586"
            ),
            array(
                "id" => 58,
                "nombre" => "PORTUGAL",
                "estado" => 0,
                "abreviatura" => "PRT",
                "extension" => '',
                "codigo_telefono" => "351",
                "codigo_dian" => "607"
            ),
            array(
                "id" => 59,
                "nombre" => "REPUBLICA CHECA",
                "estado" => 0,
                "abreviatura" => "CZE",
                "extension" => '',
                "codigo_telefono" => "42",
                "codigo_dian" => "644"
            ),
            array(
                "id" => 60,
                "nombre" => "SUECIA",
                "estado" => 0,
                "abreviatura" => "SWE",
                "extension" => '',
                "codigo_telefono" => "46",
                "codigo_dian" => "764"
            ),
            array(
                "id" => 61,
                "nombre" => "TURQUIA",
                "estado" => 0,
                "abreviatura" => "TUR",
                "extension" => '',
                "codigo_telefono" => "90",
                "codigo_dian" => "827"
            ),
            array(
                "id" => 62,
                "nombre" => "VENEZUELA",
                "estado" => 0,
                "abreviatura" => "VEN",
                "extension" => '',
                "codigo_telefono" => "58",
                "codigo_dian" => "850"
            ),
            array(
                "id" => 63,
                "nombre" => "AFGANISTAN",
                "estado" => 0,
                "abreviatura" => "AFG",
                "extension" => '',
                "codigo_telefono" => "93",
                "codigo_dian" => "013"
            ),
            array(
                "id" => 64,
                "nombre" => "ANGOLA",
                "estado" => 0,
                "abreviatura" => "AGO",
                "extension" => '',
                "codigo_telefono" => "244",
                "codigo_dian" => "040"
            ),
            array(
                "id" => 65,
                "nombre" => "ALBANIA",
                "estado" => 0,
                "abreviatura" => "ALB",
                "extension" => '',
                "codigo_telefono" => "355",
                "codigo_dian" => "017"
            ),
            array(
                "id" => 66,
                "nombre" => "ANDORRA",
                "estado" => 0,
                "abreviatura" => '',
                "extension" => '',
                "codigo_telefono" => "376",
                "codigo_dian" => "037"
            ),
            array(
                "id" => 67,
                "nombre" => "ANTILLAS HOLANDESAS",
                "estado" => 0,
                "abreviatura" => "ANT",
                "extension" => '',
                "codigo_telefono" => "599",
                "codigo_dian" => "047"
            ),
            array(
                "id" => 68,
                "nombre" => "EMIRATOS ARABES UNIDOS",
                "estado" => 0,
                "abreviatura" => "ARE",
                "extension" => '',
                "codigo_telefono" => "971",
                "codigo_dian" => "244"
            ),
            array(
                "id" => 69,
                "nombre" => "ARMENIA",
                "estado" => 0,
                "abreviatura" => "ARM",
                "codigo_telefono" => "374",
                "extension" => '',
                "codigo_dian" => "026"
            ),
            array(
                "id" => 70,
                "nombre" => "ANTIGUA Y BARBUDA",
                "estado" => 0,
                "abreviatura" => "ATG",
                "extension" => '',
                "codigo_telefono" => "1001",
                "codigo_dian" => "043"
            ),
            array(
                "id" => 71,
                "nombre" => "BURUNDI",
                "estado" => 0,
                "abreviatura" => "BDI",
                "extension" => '',
                "codigo_telefono" => "257",
                "codigo_dian" => "115"
            ),
            array(
                "id" => 72,
                "nombre" => "BENIN",
                "estado" => 0,
                "abreviatura" => "BEN",
                "extension" => '',
                "codigo_telefono" => "229",
                "codigo_dian" => "229"
            ),
            array(
                "id" => 73,
                "nombre" => "BANGLADESH",
                "estado" => 0,
                "abreviatura" => "BGD",
                "extension" => '',
                "codigo_telefono" => "880",
                "codigo_dian" => "081"
            ),
            array(
                "id" => 74,
                "nombre" => "BULGARIA",
                "estado" => 0,
                "abreviatura" => "BGR",
                "extension" => '',
                "codigo_telefono" => "359",
                "codigo_dian" => "111"
            ),
            array(
                "id" => 75,
                "nombre" => "BERMUDAS",
                "estado" => 0,
                "abreviatura" => "BMU",
                "extension" => '',
                "codigo_telefono" => "1004",
                "codigo_dian" => "090"
            ),
            array(
                "id" => 76,
                "nombre" => "BARBADOS",
                "estado" => 0,
                "abreviatura" => "BRB",
                "extension" => '',
                "codigo_telefono" => "1003",
                "codigo_dian" => "083"
            ),
            array(
                "id" => 77,
                "nombre" => "BUTAN",
                "estado" => 0,
                "abreviatura" => "BTN",
                "extension" => '',
                "codigo_telefono" => "975",
                "codigo_dian" => "119"
            ),
            array(
                "id" => 78,
                "nombre" => "SUIZA",
                "estado" => 0,
                "abreviatura" => "CHE",
                "extension" => '',
                "codigo_telefono" => "41",
                "codigo_dian" => "767"
            ),
            array(
                "id" => 79,
                "nombre" => "COSTA DE MARFIL",
                "estado" => 0,
                "abreviatura" => "CIV",
                "extension" => '',
                "codigo_telefono" => "225",
                "codigo_dian" => "193"
            ),
            array(
                "id" => 80,
                "nombre" => "CAMERUN",
                "estado" => 0,
                "abreviatura" => "CMR",
                "extension" => '',
                "codigo_telefono" => "237",
                "codigo_dian" => "145"
            ),
            array(
                "id" => 81,
                "nombre" => "ISLAS COOK",
                "estado" => 0,
                "abreviatura" => "COK",
                "extension" => '',
                "codigo_telefono" => "682",
                "codigo_dian" => "183"
            ),
            array(
                "id" => 82,
                "nombre" => "COMORAS",
                "estado" => 0,
                "abreviatura" => "COM",
                "extension" => '',
                "codigo_telefono" => "269",
                "codigo_dian" => "173"
            ),
            array(
                "id" => 83,
                "nombre" => "CABO VERDE",
                "estado" => 0,
                "abreviatura" => "CPV",
                "extension" => '',
                "codigo_telefono" => "238",
                "codigo_dian" => "127"
            ),
            array(
                "id" => 84,
                "nombre" => "ISLAS CAIMAN",
                "estado" => 0,
                "abreviatura" => "CYM",
                "extension" => '',
                "codigo_telefono" => "1006",
                "codigo_dian" => "137"
            ),
            array(
                "id" => 85,
                "nombre" => "CHIPRE",
                "estado" => 0,
                "abreviatura" => "CYP",
                "extension" => '',
                "codigo_telefono" => "357",
                "codigo_dian" => "221"
            ),
            array(
                "id" => 86,
                "nombre" => "DOMINICA",
                "estado" => 0,
                "abreviatura" => "DMA",
                "extension" => '',
                "codigo_telefono" => "1007",
                "codigo_dian" => "235"
            ),
            array(
                "id" => 87,
                "nombre" => "DINAMARCA",
                "estado" => 0,
                "abreviatura" => "DNK",
                "extension" => '',
                "codigo_telefono" => "45",
                "codigo_dian" => "232"
            ),
            array(
                "id" => 88,
                "nombre" => "REPUBLICA DOMINICANA",
                "estado" => 0,
                "abreviatura" => "DOM",
                "extension" => '',
                "codigo_telefono" => "1008",
                "codigo_dian" => "647"
            ),
            array(
                "id" => 89,
                "nombre" => "ARGELIA",
                "estado" => 0,
                "abreviatura" => "DZA",
                "extension" => '',
                "codigo_telefono" => "213",
                "codigo_dian" => "059"
            ),
            array(
                "id" => 90,
                "nombre" => "ERITREA",
                "estado" => 0,
                "abreviatura" => "ERI",
                "extension" => '',
                "codigo_telefono" => "291",
                "codigo_dian" => "243"
            ),
            array(
                "id" => 91,
                "nombre" => "SAHARA OCCIDENTAL",
                "estado" => 0,
                "abreviatura" => "ESH",
                "extension" => '',
                "codigo_telefono" => "212",
                "codigo_dian" => "685"
            ),
            array(
                "id" => 92,
                "nombre" => "ESTONIA",
                "estado" => 0,
                "abreviatura" => "EST",
                "extension" => '',
                "codigo_telefono" => "372",
                "codigo_dian" => "251"
            ),
            array(
                "id" => 93,
                "nombre" => "ETIOPIA",
                "estado" => 0,
                "abreviatura" => "ETH",
                "extension" => '',
                "codigo_telefono" => "251",
                "codigo_dian" => "253"
            ),
            array(
                "id" => 94,
                "nombre" => "FINLANDIA",
                "estado" => 0,
                "abreviatura" => "FIN",
                "extension" => '',
                "codigo_telefono" => "358",
                "codigo_dian" => "271"
            ),
            array(
                "id" => 95,
                "nombre" => "FIJI",
                "estado" => 0,
                "abreviatura" => "FJI",
                "extension" => '',
                "codigo_telefono" => "679",
                "codigo_dian" => "870"
            ),
            array(
                "id" => 96,
                "nombre" => "MICRONESIA",
                "estado" => 0,
                "abreviatura" => "FSM",
                "extension" => '',
                "codigo_telefono" => "691",
                "codigo_dian" => "494"
            ),
            array(
                "id" => 97,
                "nombre" => "GABON",
                "estado" => 0,
                "abreviatura" => "GAB",
                "extension" => '',
                "codigo_telefono" => "241",
                "codigo_dian" => "281"
            ),
            array(
                "id" => 98,
                "nombre" => "REINO UNIDO",
                "estado" => 0,
                "abreviatura" => "GBR",
                "extension" => '',
                "codigo_telefono" => "44",
                "codigo_dian" => "628"
            ),
            array(
                "id" => 99,
                "nombre" => "GEORGIA",
                "estado" => 0,
                "abreviatura" => "GEO",
                "extension" => '',
                "codigo_telefono" => "995",
                "codigo_dian" => "287"
            ),
            array(
                "id" => 100,
                "nombre" => "GHANA",
                "estado" => 0,
                "abreviatura" => "GHA",
                "extension" => '',
                "codigo_telefono" => "233",
                "codigo_dian" => "289"
            ),
            array(
                "id" => 101,
                "nombre" => "GIBRALTAR",
                "estado" => 0,
                "abreviatura" => "GIB",
                "extension" => '',
                "codigo_telefono" => "350",
                "codigo_dian" => "293"
            ),
            array(
                "id" => 102,
                "nombre" => "GUINEA",
                "estado" => 0,
                "abreviatura" => "GIN",
                "extension" => '',
                "codigo_telefono" => "224",
                "codigo_dian" => "329"
            ),
            array(
                "id" => 103,
                "nombre" => "GUADALUPE",
                "estado" => 0,
                "abreviatura" => "GLP",
                "extension" => '',
                "codigo_telefono" => "590",
                "codigo_dian" => "309"
            ),
            array(
                "id" => 104,
                "nombre" => "GAMBIA",
                "estado" => 0,
                "abreviatura" => "GMB",
                "extension" => '',
                "codigo_telefono" => "220",
                "codigo_dian" => "285"
            ),
            array(
                "id" => 105,
                "nombre" => "GUINEA ECUATORIAL",
                "estado" => 0,
                "abreviatura" => "GNQ",
                "extension" => '',
                "codigo_telefono" => "240",
                "codigo_dian" => "331"
            ),
            array(
                "id" => 106,
                "nombre" => "GRANADA",
                "estado" => 0,
                "abreviatura" => "GRD",
                "extension" => '',
                "codigo_telefono" => "1009",
                "codigo_dian" => "297"
            ),
            array(
                "id" => 107,
                "nombre" => "GROENLANDIA",
                "estado" => 0,
                "abreviatura" => "GRL",
                "extension" => '',
                "codigo_telefono" => "299",
                "codigo_dian" => "305"
            ),
            array(
                "id" => 108,
                "nombre" => "GUAM",
                "estado" => 0,
                "abreviatura" => "GUM",
                "extension" => '',
                "codigo_telefono" => "1671",
                "codigo_dian" => "313"
            ),
            array(
                "id" => 109,
                "nombre" => "HONG KONG",
                "estado" => 0,
                "abreviatura" => "HKG",
                "extension" => '',
                "codigo_telefono" => "852",
                "codigo_dian" => "351"
            ),
            array(
                "id" => 110,
                "nombre" => "HONDURAS",
                "estado" => 0,
                "abreviatura" => "HND",
                "extension" => '',
                "codigo_telefono" => "504",
                "codigo_dian" => "345"
            ),
            array(
                "id" => 111,
                "nombre" => "CROACIA",
                "estado" => 0,
                "abreviatura" => "HRV",
                "extension" => '',
                "codigo_telefono" => "385",
                "codigo_dian" => "198"
            ),
            array(
                "id" => 112,
                "nombre" => "HUNGRIA",
                "estado" => 0,
                "abreviatura" => "HUN",
                "extension" => '',
                "codigo_telefono" => "36",
                "codigo_dian" => "355"
            ),
            array(
                "id" => 113,
                "nombre" => "INDONESIA",
                "estado" => 0,
                "abreviatura" => "IDN",
                "extension" => '',
                "codigo_telefono" => "62",
                "codigo_dian" => "365"
            ),
            array(
                "id" => 114,
                "nombre" => "INDIA",
                "estado" => 0,
                "abreviatura" => "IND",
                "extension" => '',
                "codigo_telefono" => "91",
                "codigo_dian" => "361"
            ),
            array(
                "id" => 115,
                "nombre" => "IRLANDA",
                "estado" => 0,
                "abreviatura" => "IRL",
                "extension" => '',
                "codigo_telefono" => "353",
                "codigo_dian" => "375"
            ),
            array(
                "id" => 116,
                "nombre" => "IRAN",
                "estado" => 0,
                "abreviatura" => "IRN",
                "extension" => '',
                "codigo_telefono" => "98",
                "codigo_dian" => "372"
            ),
            array(
                "id" => 117,
                "nombre" => "ISLANDIA",
                "estado" => 0,
                "abreviatura" => "ISL",
                "extension" => '',
                "codigo_telefono" => "354",
                "codigo_dian" => "379"
            ),
            array(
                "id" => 118,
                "nombre" => "ISRAEL",
                "estado" => 0,
                "abreviatura" => "ISR",
                "extension" => '',
                "codigo_telefono" => "972",
                "codigo_dian" => "383"
            ),
            array(
                "id" => 119,
                "nombre" => "JORDANIA",
                "estado" => 0,
                "abreviatura" => "JOR",
                "extension" => '',
                "codigo_telefono" => "962",
                "codigo_dian" => "403"
            ),
            array(
                "id" => 120,
                "nombre" => "KENIA",
                "estado" => 0,
                "abreviatura" => "KEN",
                "extension" => '',
                "codigo_telefono" => "254",
                "codigo_dian" => "410"
            ),
            array(
                "id" => 121,
                "nombre" => "KIRIBATI",
                "estado" => 0,
                "abreviatura" => "KIR",
                "extension" => '',
                "codigo_telefono" => "686",
                "codigo_dian" => "411"
            ),
            array(
                "id" => 122,
                "nombre" => "SAN CRISTOBAL Y NIEVES",
                "estado" => 0,
                "abreviatura" => "KNA",
                "extension" => '',
                "codigo_telefono" => "1869",
                "codigo_dian" => "695"
            ),
            array(
                "id" => 123,
                "nombre" => "COREA DEL SUR",
                "estado" => 0,
                "abreviatura" => "KOR",
                "extension" => '',
                "codigo_telefono" => "82",
                "codigo_dian" => "190"
            ),
            array(
                "id" => 124,
                "nombre" => "KUWAIT",
                "estado" => 0,
                "abreviatura" => "KWT",
                "extension" => '',
                "codigo_telefono" => "965",
                "codigo_dian" => "413"
            ),
            array(
                "id" => 125,
                "nombre" => "LAOS",
                "estado" => 0,
                "abreviatura" => "LAO",
                "extension" => '',
                "codigo_telefono" => "856",
                "codigo_dian" => "420"
            ),
            array(
                "id" => 126,
                "nombre" => "LIBANO",
                "estado" => 0,
                "abreviatura" => "LBN",
                "extension" => '',
                "codigo_telefono" => "961",
                "codigo_dian" => "431"
            ),
            array(
                "id" => 127,
                "nombre" => "LIBERIA",
                "estado" => 0,
                "abreviatura" => "LBR",
                "extension" => '',
                "codigo_telefono" => "231",
                "codigo_dian" => "434"
            ),
            array(
                "id" => 128,
                "nombre" => "SANTA LUCIA",
                "estado" => 0,
                "abreviatura" => "LCA",
                "extension" => '',
                "codigo_telefono" => "1014",
                "codigo_dian" => "715"
            ),
            array(
                "id" => 129,
                "nombre" => "LIECHTENSTEIN",
                "estado" => 0,
                "abreviatura" => "LIE",
                "extension" => '',
                "codigo_telefono" => "417",
                "codigo_dian" => "440"
            ),
            array(
                "id" => 130,
                "nombre" => "SRI LANKA",
                "estado" => 0,
                "abreviatura" => "LKA",
                "extension" => '',
                "codigo_telefono" => "94",
                "codigo_dian" => "750"
            ),
            array(
                "id" => 131,
                "nombre" => "LITUANIA",
                "estado" => 0,
                "abreviatura" => "LTU",
                "extension" => '',
                "codigo_telefono" => "370",
                "codigo_dian" => "443"
            ),
            array(
                "id" => 132,
                "nombre" => "LUXEMBURGO",
                "estado" => 0,
                "abreviatura" => "LUX",
                "extension" => '',
                "codigo_telefono" => "352",
                "codigo_dian" => "445"
            ),
            array(
                "id" => 133,
                "nombre" => "LETONIA",
                "estado" => 0,
                "abreviatura" => "LVA",
                "extension" => '',
                "codigo_telefono" => "371",
                "codigo_dian" => "429"
            ),
            array(
                "id" => 134,
                "nombre" => "MACAO",
                "estado" => 0,
                "abreviatura" => "MAC",
                "extension" => '',
                "codigo_telefono" => "853",
                "codigo_dian" => "447"
            ),
            array(
                "id" => 135,
                "nombre" => "MARRUECOS",
                "estado" => 0,
                "abreviatura" => "MAR",
                "extension" => '',
                "codigo_telefono" => "212",
                "codigo_dian" => "474"
            ),
            array(
                "id" => 136,
                "nombre" => "MOLDAVIA",
                "estado" => 0,
                "abreviatura" => "MDA",
                "extension" => '',
                "codigo_telefono" => "373",
                "codigo_dian" => "496"
            ),
            array(
                "id" => 137,
                "nombre" => "MADAGASCAR",
                "estado" => 0,
                "abreviatura" => "MDG",
                "extension" => '',
                "codigo_telefono" => "261",
                "codigo_dian" => "450"
            ),
            array(
                "id" => 138,
                "nombre" => "MALDIVAS",
                "estado" => 0,
                "abreviatura" => "MDV",
                "extension" => '',
                "codigo_telefono" => "960",
                "codigo_dian" => "461"
            ),
            array(
                "id" => 139,
                "nombre" => "ISLAS MARSHALL",
                "estado" => 0,
                "abreviatura" => "MHL",
                "extension" => '',
                "codigo_telefono" => "692",
                "codigo_dian" => "472"
            ),
            array(
                "id" => 140,
                "nombre" => "MACEDONIA",
                "estado" => 0,
                "abreviatura" => "MKD",
                "extension" => '',
                "codigo_telefono" => "389",
                "codigo_dian" => "448"
            ),
            array(
                "id" => 141,
                "nombre" => "MALI",
                "estado" => 0,
                "abreviatura" => "MLI",
                "extension" => '',
                "codigo_telefono" => "223",
                "codigo_dian" => "464"
            ),
            array(
                "id" => 142,
                "nombre" => "MALTA",
                "estado" => 0,
                "abreviatura" => "MLT",
                "extension" => '',
                "codigo_telefono" => "356",
                "codigo_dian" => "467"
            ),
            array(
                "id" => 143,
                "nombre" => "MAURITANIA",
                "estado" => 0,
                "abreviatura" => "MRT",
                "extension" => '',
                "codigo_telefono" => "222",
                "codigo_dian" => "488"
            ),
            array(
                "id" => 144,
                "nombre" => "MARTINICA",
                "estado" => 0,
                "abreviatura" => "MTQ",
                "extension" => '',
                "codigo_telefono" => "596",
                "codigo_dian" => "477"
            ),
            array(
                "id" => 145,
                "nombre" => "NUEVA CALEDONIA",
                "estado" => 0,
                "abreviatura" => "NCL",
                "extension" => '',
                "codigo_telefono" => "687",
                "codigo_dian" => "542"
            ),
            array(
                "id" => 146,
                "nombre" => "NIGER",
                "estado" => 0,
                "abreviatura" => "NER",
                "extension" => '',
                "codigo_telefono" => "227",
                "codigo_dian" => "525"
            ),
            array(
                "id" => 147,
                "nombre" => "NIGERIA",
                "estado" => 0,
                "abreviatura" => "NGA",
                "extension" => '',
                "codigo_telefono" => "234",
                "codigo_dian" => "528"
            ),
            array(
                "id" => 148,
                "nombre" => "NICARAGUA",
                "estado" => 0,
                "abreviatura" => "NIC",
                "extension" => '',
                "codigo_telefono" => "505",
                "codigo_dian" => "521"
            ),
            array(
                "id" => 149,
                "nombre" => "OMAN",
                "estado" => 0,
                "abreviatura" => "OMN",
                "extension" => '',
                "codigo_telefono" => "968",
                "codigo_dian" => "556"
            ),
            array(
                "id" => 150,
                "nombre" => "PAKISTAN",
                "estado" => 0,
                "abreviatura" => "PAK",
                "extension" => '',
                "codigo_telefono" => "92",
                "codigo_dian" => "576"
            ),
            array(
                "id" => 151,
                "nombre" => "POLONIA",
                "estado" => 0,
                "abreviatura" => "POL",
                "extension" => '',
                "codigo_telefono" => "48",
                "codigo_dian" => "603"
            ),
            array(
                "id" => 152,
                "nombre" => "PUERTO RICO",
                "estado" => 0,
                "abreviatura" => "PRI",
                "extension" => '',
                "codigo_telefono" => "1787",
                "codigo_dian" => "611"
            ),
            array(
                "id" => 153,
                "nombre" => "COREA DEL NORTE",
                "estado" => 0,
                "abreviatura" => "PRK",
                "extension" => '',
                "codigo_telefono" => "850",
                "codigo_dian" => "187"
            ),
            array(
                "id" => 154,
                "nombre" => "POLINESIA FRANCESA",
                "estado" => 0,
                "abreviatura" => "PYF",
                "extension" => '',
                "codigo_telefono" => "689",
                "codigo_dian" => "599"
            ),
            array(
                "id" => 155,
                "nombre" => "RUMANIA",
                "estado" => 0,
                "abreviatura" => "ROU",
                "extension" => '',
                "codigo_telefono" => "40",
                "codigo_dian" => "670"
            ),
            array(
                "id" => 156,
                "nombre" => "RUSIA",
                "estado" => 0,
                "abreviatura" => "RUS",
                "extension" => '',
                "codigo_telefono" => "7",
                "codigo_dian" => "676"
            ),
            array(
                "id" => 157,
                "nombre" => "RUANDA",
                "estado" => 0,
                "abreviatura" => "RWA",
                "extension" => '',
                "codigo_telefono" => "250",
                "codigo_dian" => "675"
            ),
            array(
                "id" => 158,
                "nombre" => "SUDAN",
                "estado" => 0,
                "abreviatura" => "SDN",
                "extension" => '',
                "codigo_telefono" => "249",
                "codigo_dian" => "759"
            ),
            array(
                "id" => 159,
                "nombre" => "SENEGAL",
                "estado" => 0,
                "abreviatura" => "SEN",
                "extension" => '',
                "codigo_telefono" => "221",
                "codigo_dian" => "728"
            ),
            array(
                "id" => 160,
                "nombre" => "SINGAPUR",
                "estado" => 0,
                "abreviatura" => "SGP",
                "extension" => '',
                "codigo_telefono" => "65",
                "codigo_dian" => "741"
            ),
            array(
                "id" => 161,
                "nombre" => "ISLAS SALOMON",
                "estado" => 0,
                "abreviatura" => "SLB",
                "extension" => '',
                "codigo_telefono" => "677",
                "codigo_dian" => "677"
            ),
            array(
                "id" => 162,
                "nombre" => "SIERRA LEONA",
                "estado" => 0,
                "abreviatura" => "SLE",
                "extension" => '',
                "codigo_telefono" => "232",
                "codigo_dian" => "735"
            ),
            array(
                "id" => 163,
                "nombre" => "SAN MARINO",
                "estado" => 0,
                "abreviatura" => "SMR",
                "extension" => '',
                "codigo_telefono" => "378",
                "codigo_dian" => "697"
            ),
            array(
                "id" => 164,
                "nombre" => "SOMALIA",
                "estado" => 0,
                "abreviatura" => "SOM",
                "extension" => '',
                "codigo_telefono" => "252",
                "codigo_dian" => "748"
            ),
            array(
                "id" => 165,
                "nombre" => "SANTO TOME Y PRINCIPE",
                "estado" => 0,
                "abreviatura" => "STP",
                "extension" => '',
                "codigo_telefono" => "239",
                "codigo_dian" => "720"
            ),
            array(
                "id" => 166,
                "nombre" => "SURINAM",
                "estado" => 0,
                "abreviatura" => "SUR",
                "extension" => '',
                "codigo_telefono" => "597",
                "codigo_dian" => "770"
            ),
            array(
                "id" => 167,
                "nombre" => "ESLOVENIA",
                "estado" => 0,
                "abreviatura" => "SVN",
                "extension" => '',
                "codigo_telefono" => "386",
                "codigo_dian" => "247"
            ),
            array(
                "id" => 168,
                "nombre" => "SIRIA",
                "estado" => 0,
                "abreviatura" => "SYR",
                "extension" => '',
                "codigo_telefono" => "963",
                "codigo_dian" => "744"
            ),
            array(
                "id" => 169,
                "nombre" => "CHAD",
                "estado" => 0,
                "abreviatura" => "TCD",
                "extension" => '',
                "codigo_telefono" => "235",
                "codigo_dian" => "203"
            ),
            array(
                "id" => 170,
                "nombre" => "TAILANDIA",
                "estado" => 0,
                "abreviatura" => "THA",
                "extension" => '',
                "codigo_telefono" => "66",
                "codigo_dian" => "776"
            ),
            array(
                "id" => 171,
                "nombre" => "TURKMENISTAN",
                "estado" => 0,
                "abreviatura" => "TKM",
                "extension" => '',
                "codigo_telefono" => "993",
                "codigo_dian" => "825"
            ),
            array(
                "id" => 172,
                "nombre" => "TRINIDAD Y TOBAGO",
                "estado" => 0,
                "abreviatura" => "TTO",
                "extension" => '',
                "codigo_telefono" => "1016",
                "codigo_dian" => "815"
            ),
            array(
                "id" => 173,
                "nombre" => "TUVALU",
                "estado" => 0,
                "abreviatura" => "TUV",
                "extension" => '',
                "codigo_telefono" => "688",
                "codigo_dian" => "828"
            ),
            array(
                "id" => 174,
                "nombre" => "TANZANIA",
                "estado" => 0,
                "abreviatura" => "TZA",
                "extension" => '',
                "codigo_telefono" => "255",
                "codigo_dian" => "780"
            ),
            array(
                "id" => 175,
                "nombre" => "UGANDA",
                "estado" => 0,
                "abreviatura" => "UGA",
                "extension" => '',
                "codigo_telefono" => "256",
                "codigo_dian" => "833"
            ),
            array(
                "id" => 176,
                "nombre" => "UCRANIA",
                "estado" => 0,
                "abreviatura" => "UKR",
                "extension" => '',
                "codigo_telefono" => "380",
                "codigo_dian" => "830"
            ),
            array(
                "id" => 177,
                "nombre" => "URUGUAY",
                "estado" => 0,
                "abreviatura" => "URY",
                "extension" => '',
                "codigo_telefono" => "598",
                "codigo_dian" => "845"
            ),
            array(
                "id" => 178,
                "nombre" => "UZBEKISTAN",
                "estado" => 0,
                "abreviatura" => "UZB",
                "extension" => '',
                "codigo_telefono" => "737",
                "codigo_dian" => "847"
            ),
            array(
                "id" => 179,
                "nombre" => "SAN VICENTE Y LAS GRANADINAS",
                "estado" => 0,
                "abreviatura" => "VCT",
                "extension" => '',
                "codigo_telefono" => "1015",
                "codigo_dian" => "705"
            ),
            array(
                "id" => 180,
                "nombre" => "VIETNAM",
                "estado" => 0,
                "abreviatura" => "VNM",
                "extension" => '',
                "codigo_telefono" => "84",
                "codigo_dian" => "855"
            ),
            array(
                "id" => 181,
                "nombre" => "VANUATU",
                "estado" => 0,
                "abreviatura" => "VUT",
                "extension" => '',
                "codigo_telefono" => "7377",
                "codigo_dian" => "551"
            ),
            array(
                "id" => 182,
                "nombre" => "YEMEN",
                "estado" => 0,
                "abreviatura" => "YEM",
                "extension" => '',
                "codigo_telefono" => "967",
                "codigo_dian" => "880"
            ),
            array(
                "id" => 183,
                "nombre" => "SUDAFRICA",
                "estado" => 0,
                "abreviatura" => "ZAF",
                "extension" => '',
                "codigo_telefono" => "27",
                "codigo_dian" => "756"
            ),
            array(
                "id" => 184,
                "nombre" => "ANGUILLA",
                "estado" => 0,
                "abreviatura" => "AIA",
                "extension" => '',
                "codigo_telefono" => "1000",
                "codigo_dian" => "041"
            ),
            array(
                "id" => 185,
                "nombre" => "ARABIA SAUDITA",
                "estado" => 0,
                "abreviatura" => "SAU",
                "extension" => '',
                "codigo_telefono" => "966",
                "codigo_dian" => "053"
            ),
            array(
                "id" => 186,
                "nombre" => "AZERBAIJAN",
                "estado" => 0,
                "abreviatura" => "AZE",
                "extension" => '',
                "codigo_telefono" => "994",
                "codigo_dian" => "074"
            ),
            array(
                "id" => 187,
                "nombre" => "BAHREIN",
                "estado" => 0,
                "abreviatura" => "BHR",
                "extension" => '',
                "codigo_telefono" => "973",
                "codigo_dian" => "080"
            ),
            array(
                "id" => 188,
                "nombre" => "BELARUS",
                "estado" => 0,
                "abreviatura" => "BLR",
                "extension" => '',
                "codigo_telefono" => "375",
                "codigo_dian" => "091"
            ),
            array(
                "id" => 189,
                "nombre" => "BIRMANIA (MYANMAR)",
                "estado" => 0,
                "abreviatura" => "MMR",
                "extension" => '',
                "codigo_telefono" => "95",
                "codigo_dian" => "093"
            ),
            array(
                "id" => 190,
                "nombre" => "BOSNIA-HERZEGOVINA",
                "estado" => 0,
                "abreviatura" => "BIH",
                "extension" => '',
                "codigo_telefono" => "387",
                "codigo_dian" => "029"
            ),
            array(
                "id" => 191,
                "nombre" => "BOTSWANA",
                "estado" => 0,
                "abreviatura" => "BWA",
                "extension" => '',
                "codigo_telefono" => "267",
                "codigo_dian" => "101"
            ),
            array(
                "id" => 192,
                "nombre" => "BRUNEI DARUSSALAM",
                "estado" => 0,
                "abreviatura" => "BRN",
                "extension" => '',
                "codigo_telefono" => "673",
                "codigo_dian" => "108"
            ),
            array(
                "id" => 193,
                "nombre" => "BURKINA FASSO",
                "estado" => 0,
                "abreviatura" => "BFA",
                "extension" => '',
                "codigo_telefono" => "226",
                "codigo_dian" => "031"
            ),
            array(
                "id" => 194,
                "nombre" => "CAMBOYA (KAMPUCHEA)",
                "estado" => 0,
                "abreviatura" => "KHM",
                "extension" => '',
                "codigo_telefono" => "855",
                "codigo_dian" => "141"
            ),
            array(
                "id" => 195,
                "nombre" => "CONGO",
                "estado" => 0,
                "abreviatura" => "COG",
                "extension" => '',
                "codigo_telefono" => "242",
                "codigo_dian" => "177"
            ),
            array(
                "id" => 196,
                "nombre" => "DJIBOUTI",
                "estado" => 0,
                "abreviatura" => "DJI",
                "extension" => '',
                "codigo_telefono" => "253",
                "codigo_dian" => "783"
            ),
            array(
                "id" => 197,
                "nombre" => "ESLOVAQUIA",
                "estado" => 0,
                "abreviatura" => "SVK",
                "extension" => '',
                "codigo_telefono" => "421",
                "codigo_dian" => "246"
            ),
            array(
                "id" => 198,
                "nombre" => "GUAYANA",
                "estado" => 0,
                "abreviatura" => "GUY",
                "extension" => '',
                "codigo_telefono" => "592",
                "codigo_dian" => "337"
            ),
            array(
                "id" => 199,
                "nombre" => "GUINEA-BISSAU",
                "estado" => 0,
                "abreviatura" => "GNB",
                "extension" => '',
                "codigo_telefono" => "245",
                "codigo_dian" => "334"
            ),
            array(
                "id" => 200,
                "nombre" => "HOLANDA (PAISES BAJOS)",
                "estado" => 0,
                "abreviatura" => "NLD",
                "extension" => '',
                "codigo_telefono" => "31",
                "codigo_dian" => "573"
            ),
            array(
                "id" => 201,
                "nombre" => "IRAQ",
                "estado" => 0,
                "abreviatura" => "IRQ",
                "extension" => '',
                "codigo_telefono" => "964",
                "codigo_dian" => "369"
            ),
            array(
                "id" => 202,
                "nombre" => "ISLA NAVIDAD",
                "estado" => 0,
                "abreviatura" => "CXR",
                "extension" => '',
                "codigo_telefono" => "6724",
                "codigo_dian" => "511"
            ),
            array(
                "id" => 203,
                "nombre" => "ISLA NIUE",
                "estado" => 0,
                "abreviatura" => "NIU",
                "extension" => '',
                "codigo_telefono" => "683",
                "codigo_dian" => "531"
            ),
            array(
                "id" => 204,
                "nombre" => "ISLA NORFORLK",
                "estado" => 0,
                "abreviatura" => "NFK",
                "extension" => '',
                "codigo_telefono" => "6723",
                "codigo_dian" => "535"
            ),
            array(
                "id" => 205,
                "nombre" => "ISLA PITCAIRN",
                "estado" => 0,
                "abreviatura" => "PCN",
                "extension" => '',
                "codigo_telefono" => "870",
                "codigo_dian" => "593"
            ),
            array(
                "id" => 206,
                "nombre" => "ISLA REUNION",
                "estado" => 0,
                "abreviatura" => "REU",
                "extension" => '',
                "codigo_telefono" => "262",
                "codigo_dian" => "660"
            ),
            array(
                "id" => 207,
                "nombre" => "ISLA SEYCHELLES",
                "estado" => 0,
                "abreviatura" => "SYC",
                "extension" => '',
                "codigo_telefono" => "248",
                "codigo_dian" => "731"
            ),
            array(
                "id" => 208,
                "nombre" => "ISLAS COCOS (KEELING)",
                "estado" => 0,
                "abreviatura" => "CCK",
                "extension" => '',
                "codigo_telefono" => "61",
                "codigo_dian" => "165"
            ),
            array(
                "id" => 209,
                "nombre" => "ISLAS FEROE",
                "estado" => 0,
                "abreviatura" => "FRO",
                "extension" => '',
                "codigo_telefono" => "298",
                "codigo_dian" => "259"
            ),
            array(
                "id" => 210,
                "nombre" => "ISLAS MARIANAS DEL NORTE",
                "estado" => 0,
                "abreviatura" => "MNP",
                "extension" => '',
                "codigo_telefono" => "1670",
                "codigo_dian" => "469"
            ),
            array(
                "id" => 211,
                "nombre" => "ISLAS MAURICIO",
                "estado" => 0,
                "abreviatura" => "MUS",
                "extension" => '',
                "codigo_telefono" => "230",
                "codigo_dian" => "485"
            ),
            array(
                "id" => 212,
                "nombre" => "ISLAS PACIFICO (USA)",
                "estado" => 0,
                "abreviatura" => "PUS",
                "extension" => '',
                "codigo_telefono" => "295",
                "codigo_dian" => "566"
            ),
            array(
                "id" => 213,
                "nombre" => "ISLAS PALAU",
                "estado" => 0,
                "abreviatura" => "PLW",
                "extension" => '',
                "codigo_telefono" => "680",
                "codigo_dian" => "578"
            ),
            array(
                "id" => 214,
                "nombre" => "ISLAS TONGA",
                "estado" => 0,
                "abreviatura" => "TON",
                "extension" => '',
                "codigo_telefono" => "676",
                "codigo_dian" => "810"
            ),
            array(
                "id" => 215,
                "nombre" => "ISLAS TURCAS Y CAICOS",
                "estado" => 0,
                "abreviatura" => "TCA",
                "extension" => '',
                "codigo_telefono" => "1",
                "codigo_dian" => "823"
            ),
            array(
                "id" => 216,
                "nombre" => "ISLAS VIRGENES (BRITANICAS)",
                "estado" => 0,
                "abreviatura" => "VGB",
                "extension" => '',
                "codigo_telefono" => "284",
                "codigo_dian" => "863"
            ),
            array(
                "id" => 217,
                "nombre" => "ISLAS VIRGENES AMERICANAS",
                "estado" => 0,
                "abreviatura" => "VIR",
                "extension" => '',
                "codigo_telefono" => "340",
                "codigo_dian" => "866"
            ),
            array(
                "id" => 218,
                "nombre" => "KASAJSTAN",
                "estado" => 0,
                "abreviatura" => "KAZ",
                "extension" => '',
                "codigo_telefono" => "7",
                "codigo_dian" => "406"
            ),
            array(
                "id" => 219,
                "nombre" => "KIRGUIZISTAN",
                "estado" => 0,
                "abreviatura" => "KGZ",
                "extension" => '',
                "codigo_telefono" => "996",
                "codigo_dian" => "412"
            ),
            array(
                "id" => 220,
                "nombre" => "LESOTHO",
                "estado" => 0,
                "abreviatura" => "LSO",
                "extension" => '',
                "codigo_telefono" => "266",
                "codigo_dian" => "426"
            ),
            array(
                "id" => 221,
                "nombre" => "LIBIA (INCLUYE FEZZAN)",
                "estado" => 0,
                "abreviatura" => "LBY",
                "extension" => '',
                "codigo_telefono" => "218",
                "codigo_dian" => "438"
            ),
            array(
                "id" => 222,
                "nombre" => "MALAWI",
                "estado" => 0,
                "abreviatura" => "MWI",
                "extension" => '',
                "codigo_telefono" => "265",
                "codigo_dian" => "458"
            ),
            array(
                "id" => 223,
                "nombre" => "MALAYSIA",
                "estado" => 0,
                "abreviatura" => "MYS",
                "extension" => '',
                "codigo_telefono" => "60",
                "codigo_dian" => "455"
            ),
            array(
                "id" => 224,
                "nombre" => "MONGOLIA",
                "estado" => 0,
                "abreviatura" => "MNG",
                "extension" => '',
                "codigo_telefono" => "976",
                "codigo_dian" => "497"
            ),
            array(
                "id" => 225,
                "nombre" => "MONSERRAT",
                "estado" => 0,
                "abreviatura" => "MSR",
                "extension" => '',
                "codigo_telefono" => "1011",
                "codigo_dian" => "501"
            ),
            array(
                "id" => 226,
                "nombre" => "MOZAMBIQUE",
                "estado" => 0,
                "abreviatura" => "MOZ",
                "extension" => '',
                "codigo_telefono" => "258",
                "codigo_dian" => "505"
            ),
            array(
                "id" => 227,
                "nombre" => "NAMIBIA",
                "estado" => 0,
                "abreviatura" => "NAM",
                "extension" => '',
                "codigo_telefono" => "264",
                "codigo_dian" => "507"
            ),
            array(
                "id" => 228,
                "nombre" => "NAURU",
                "estado" => 0,
                "abreviatura" => "NRU",
                "extension" => '',
                "codigo_telefono" => "674",
                "codigo_dian" => "508"
            ),
            array(
                "id" => 229,
                "nombre" => "NEPAL",
                "estado" => 0,
                "abreviatura" => "NPL",
                "extension" => '',
                "codigo_telefono" => "977",
                "codigo_dian" => "517"
            ),
            array(
                "id" => 230,
                "nombre" => "NUEVA ZELANDIA",
                "estado" => 0,
                "abreviatura" => "NZL",
                "extension" => '',
                "codigo_telefono" => "64",
                "codigo_dian" => "548"
            ),
            array(
                "id" => 231,
                "nombre" => "PALESTINA",
                "estado" => 0,
                "abreviatura" => "PSE",
                "extension" => '',
                "codigo_telefono" => "970",
                "codigo_dian" => "897"
            ),
            array(
                "id" => 232,
                "nombre" => "PAPUASIA NUEVA GUINEA",
                "estado" => 0,
                "abreviatura" => "PNG",
                "extension" => '',
                "codigo_telefono" => "675",
                "codigo_dian" => "545"
            ),
            array(
                "id" => 233,
                "nombre" => "QATAR",
                "estado" => 0,
                "abreviatura" => "QAT",
                "extension" => '',
                "codigo_telefono" => "974",
                "codigo_dian" => "618"
            ),
            array(
                "id" => 234,
                "nombre" => "REPUBLICA CENTROAFRICANA",
                "estado" => 0,
                "abreviatura" => "CAF",
                "extension" => '',
                "codigo_telefono" => "236",
                "codigo_dian" => "640"
            ),
            array(
                "id" => 235,
                "nombre" => "SAMOA",
                "estado" => 0,
                "abreviatura" => "WSM",
                "extension" => '',
                "codigo_telefono" => "685",
                "codigo_dian" => "687"
            ),
            array(
                "id" => 236,
                "nombre" => "SAMOA NORTEAMERICANA",
                "estado" => 0,
                "abreviatura" => "ASM",
                "extension" => '',
                "codigo_telefono" => "684",
                "codigo_dian" => "690"
            ),
            array(
                "id" => 237,
                "nombre" => "SAN PEDRO Y MIGUELON",
                "estado" => 0,
                "abreviatura" => "SPM",
                "extension" => '',
                "codigo_telefono" => "508",
                "codigo_dian" => "700"
            ),
            array(
                "id" => 238,
                "nombre" => "SANTA ELENA",
                "estado" => 0,
                "abreviatura" => "SHN",
                "extension" => '',
                "codigo_telefono" => "290",
                "codigo_dian" => "710"
            ),
            array(
                "id" => 239,
                "nombre" => "VATICANO",
                "estado" => 0,
                "abreviatura" => "VAT",
                "extension" => '',
                "codigo_telefono" => "379",
                "codigo_dian" => "159"
            ),
            array(
                "id" => 240,
                "nombre" => "SWAZILANDIA",
                "estado" => 0,
                "abreviatura" => "SWZ",
                "extension" => '',
                "codigo_telefono" => "268",
                "codigo_dian" => "773"
            ),
            array(
                "id" => 241,
                "nombre" => "TADJIKISTAN",
                "estado" => 0,
                "abreviatura" => "TJK",
                "extension" => '',
                "codigo_telefono" => "73",
                "codigo_dian" => "774"
            ),
            array(
                "id" => 242,
                "nombre" => "TAIWAN",
                "estado" => 0,
                "abreviatura" => "TWN",
                "extension" => '',
                "codigo_telefono" => "886",
                "codigo_dian" => "218"
            ),
            array(
                "id" => 243,
                "nombre" => "TERRITORIO BRITANICO DEL OCEANO INDICO",
                "estado" => 0,
                "abreviatura" => "IOT",
                "extension" => '',
                "codigo_telefono" => "246",
                "codigo_dian" => "787"
            ),
            array(
                "id" => 244,
                "nombre" => "TIMOR DEL ESTE (ORIENTAL)",
                "estado" => 0,
                "abreviatura" => "TLS",
                "extension" => '',
                "codigo_telefono" => "670",
                "codigo_dian" => "788"
            ),
            array(
                "id" => 245,
                "nombre" => "TOGO",
                "estado" => 0,
                "abreviatura" => "TGO",
                "extension" => '',
                "codigo_telefono" => "228",
                "codigo_dian" => "800"
            ),
            array(
                "id" => 246,
                "nombre" => "TOKELAU",
                "estado" => 0,
                "abreviatura" => "TKL",
                "extension" => '',
                "codigo_telefono" => "690",
                "codigo_dian" => "805"
            ),
            array(
                "id" => 247,
                "nombre" => "TUNICIA",
                "estado" => 0,
                "abreviatura" => "TUN",
                "extension" => '',
                "codigo_telefono" => "216",
                "codigo_dian" => "820"
            ),
            array(
                "id" => 248,
                "nombre" => "WALLIS Y FORTUNA",
                "estado" => 0,
                "abreviatura" => "WLF",
                "extension" => '',
                "codigo_telefono" => "681",
                "codigo_dian" => "875"
            ),
            array(
                "id" => 249,
                "nombre" => "YUGOSLAVIA",
                "estado" => 0,
                "abreviatura" => "YUG",
                "extension" => '',
                "codigo_telefono" => "381",
                "codigo_dian" => "885"
            ),
            array(
                "id" => 250,
                "nombre" => "REPUBLICA DEMOCRATICA CONGO (ZAIRE)",
                "estado" => 0,
                "abreviatura" => "COD",
                "extension" => '',
                "codigo_telefono" => "243",
                "codigo_dian" => "888"
            ),
            array(
                "id" => 251,
                "nombre" => "ZAMBIA",
                "estado" => 0,
                "abreviatura" => "ZMB",
                "extension" => '',
                "codigo_telefono" => "260",
                "codigo_dian" => "890"
            ),
            array(
                "id" => 252,
                "nombre" => "ZIMBABWE",
                "estado" => 0,
                "abreviatura" => "ZWE",
                "extension" => '',
                "codigo_telefono" => "263",
                "codigo_dian" => "665"
            ),
            array(
                "id" => 253,
                "nombre" => "EJEMPLO",
                "estado" => 0,
                "abreviatura" => "EJ",
                "extension" => '',
                "codigo_telefono" => "01",
                "codigo_dian" => "000"
            )
        ));
    }
}
