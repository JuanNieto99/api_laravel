<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\TipoCliente;
use App\Models\TiposHabitaciones;
use GuzzleHttp\Client;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            RolSeeder::class,
            UsuarioSeeder::class,
            PaisSeeder::class,
            DepartamentoSeeder::class,
            CiudadSeeder::class,
            PermisoSeeder::class, 
            TipoDocumentoSeeder::class,
            EstadoCivilSeeder::class,
            GeneroSeeder::class,
            NivelEstudioSeeder::class,
            MetodosPagoSeeder::class,
            MedidaSeeder::class,
            TipoContribuyenteSeeder::class,
            HotelSeeder::class,
            InventarioSeeder::class,
            TipoHabitacionSeeder::class,
            PermisosDetalleSeeder::class,
            ClienteSeeder::class,
            TipoCajaSeeder::class,
            EstadosSeeder::class,
            DetalleHotelUsuario::class,
            ImpuestoSeeder::class,
            TipoClienteSeeder::class,
        ]);
    }
}
