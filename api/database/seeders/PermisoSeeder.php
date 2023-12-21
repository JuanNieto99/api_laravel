<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class PermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permisos')->insert([
            [
                'id' => '1',
                'codigo' => 'hbs',
                'nombre' => 'habitaciones',
                'descripcion' => 'modulo de habitaciones con filtros y estados',
                'id_padre' => 0,
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '2',
                'codigo' => 'rvs',
                'nombre' => 'reservas',
                'descripcion' => 'modulo de calendario en vivo',
                'id_padre' => 0,
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '3',
                'codigo' => 'gts',
                'nombre' => 'ingresos egresos',
                'descripcion' => 'modulo de gastos generales, ingreso y egreso, otros ingresos, gastos turnos, retiro parcial',
                'id_padre' => 0,
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '4',
                'codigo' => 'inv',
                'nombre' => 'inventarios',
                'descripcion' => 'modulo de inventario, consultar inventario, consumos autorizados, ventas en caja, reportar compras, transferir entre bodegas,',                
                'id_padre' => 0,
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '5',
                'codigo' => 'dinv',
                'nombre' => 'descargar inventario',
                'descripcion' => 'permite descargar productos de inventario solo para admin y super admin',
                'id_padre' => 4,
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '6',
                'codigo' => 'pms',
                'nombre' => 'promociones',
                'descripcion' => 'modulo para crear bonos, cupones o descuentos',
                'id_padre' => 0,
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '7',
                'codigo' => 'ftn',
                'nombre' => 'facturacion',
                'descripcion' => 'modulo de historial de facturas, gestion de cuentas, gestion de remisiones, cuentas por cobrar',
                'id_padre' => 0,
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '8',
                'codigo' => 'infb',
                'nombre' => 'informe-basico',
                'descripcion' => 'modulo para ver informes, a definir cuales',
                'id_padre' => 0,
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '9',
                'codigo' => 'infa',
                'nombre' => 'informe-admin',
                'descripcion' => 'modulo para ver informes, a definir cuales',
                'id_padre' => 0,
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '10',
                'codigo' => 'adr',
                'nombre' => 'auditar',
                'descripcion' => 'modulo para ver logs de todos los movimientos de las sesiones en el software solo admin y super admin',
                'id_padre' => 0,
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '11',
                'codigo' => 'cnfn',
                'nombre' => 'configuraion',
                'descripcion' => 'modulo para admins y super admins donde se configura todo el sistema',
                'id_padre' => 0,
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '12',
                'codigo' => 'clts',
                'nombre' => 'clientes',
                'descripcion' => 'modulo para crear y administrar clientes',
                'id_padre' => 0,
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '13',
                'codigo' => 'pfl',
                'nombre' => 'perfil',
                'descripcion' => 'modulo para ver y administrar el perfil de cada usuario',
                'id_padre' => 0,
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '14',
                'codigo' => 'rol',
                'nombre' => 'roles',
                'descripcion' => 'modulo para ver y administrar los roles',
                'id_padre' => 0,
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '15',
                'codigo' => 'prms',
                'nombre' => 'permisos',
                'descripcion' => 'modulo para ver y administrar los permisos',
                'id_padre' => 0,
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '16',
                'codigo' => 'prms',
                'nombre' => 'permisos',
                'descripcion' => 'modulo para ver y administrar los permisos',
                'id_padre' => 0,
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '17',
                'codigo' => 'ecv',
                'nombre' => 'estado civil',
                'descripcion' => 'modulo para ver y administrar los estados civiles',
                'id_padre' => 0,
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '18',
                'codigo' => 'ndest',
                'nombre' => 'nivel estudio',
                'descripcion' => 'modulo para ver y administrar los niveles de estudio',
                'id_padre' => 0,
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '19',
                'codigo' => 'gro',
                'nombre' => 'genero',
                'descripcion' => 'modulo para ver y administrar los generos',
                'id_padre' => 0,
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '20',
                'codigo' => 'tdoc',
                'nombre' => 'tipo documento',
                'descripcion' => 'modulo para ver y administrar los tipos de documentos',
                'id_padre' => 0,
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '21',
                'codigo' => 'mdp',
                'nombre' => 'medios de pagos',
                'descripcion' => 'modulo para ver y administrar los medios de pagos',
                'id_padre' => 0,
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '22',
                'codigo' => 'pis',
                'nombre' => 'pais',
                'descripcion' => 'modulo para ver y administrar los paises',
                'id_padre' => 0,
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '23',
                'codigo' => 'dep',
                'nombre' => 'departamento',
                'descripcion' => 'modulo para ver y administrar los departamentos',
                'id_padre' => 0,
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '24',
                'codigo' => 'cde',
                'nombre' => 'ciudades',
                'descripcion' => 'modulo para ver y administrar las ciudades',
                'id_padre' => 0,
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '25',
                'codigo' => 'htl',
                'nombre' => 'hotel',
                'descripcion' => 'modulo para ver y administrar los hoteles',
                'id_padre' => 0,
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '26',
                'codigo' => 'pdto',
                'nombre' => 'producto',
                'descripcion' => 'modulo para ver y administrar los productos',
                'id_padre' => 0,
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '27',
                'codigo' => 'pdto',
                'nombre' => 'producto',
                'descripcion' => 'modulo para ver y administrar los productos',
                'id_padre' => 0,
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '28',
                'codigo' => 'thb',
                'nombre' => 'tipo habitacion',
                'descripcion' => 'modulo para ver y administrar los tipos de habitacion',
                'id_padre' => 0,
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '29',
                'codigo' => 'cja',
                'nombre' => 'caja',
                'descripcion' => 'modulo para ver y administrar las cajas',
                'id_padre' => 0,
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '30',
                'codigo' => 'rcta',
                'nombre' => 'recetas',
                'descripcion' => 'modulo para ver y administrar las recetas',
                'id_padre' => 0,
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '31',
                'codigo' => 'umd',
                'nombre' => 'unidad medida',
                'descripcion' => 'modulo para ver y administrar las unidades de medidas',
                'id_padre' => 0,
                'estado' => '1', // activo = 1, inactivo = 0
            ],
            [
                'id' => '32',
                'codigo' => 'csmo',
                'nombre' => 'Consumos ',
                'descripcion' => 'modulo para ver y administrar los consumos ',
                'id_padre' => 0,
                'estado' => '1', // activo = 1, inactivo = 0
            ], 
            [
                'id' => '33',
                'codigo' => 'sce',
                'nombre' => 'Secuencia Externa ',
                'descripcion' => 'modulo para ver y administrar las secuencias externas ',
                'id_padre' => 0,
                'estado' => '1', // activo = 1, inactivo = 0
            ], 
            [
                'id' => '34',
                'codigo' => 'sci',
                'nombre' => 'Secuencia Interna ',
                'descripcion' => 'modulo para ver y administrar las secuencias ineternas',
                'id_padre' => 0,
                'estado' => '1', // activo = 1, inactivo = 0
            ], 
        ]);
    }
}
