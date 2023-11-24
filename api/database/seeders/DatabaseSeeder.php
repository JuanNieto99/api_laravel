<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            TipoHabitacionSeeder::class,
            HotelSeeder::class,
            InventarioSeeder::class,
        ]);
    }
}
