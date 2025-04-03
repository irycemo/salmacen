<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(ArticulosTableSeeder::class);
        $this->call(EntradasTableSeeder::class);
        $this->call(ArticuloDisponiblesTableSeeder::class);
        $this->call(PrecioStocksTableSeeder::class);
    }
}
