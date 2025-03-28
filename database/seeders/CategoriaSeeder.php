<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Categoria::create([
            'nombre' => 'Material y utiles de oficina',
        ]);

        Categoria::create([
            'nombre' => 'Material y utiles equipo información',
        ]);

        Categoria::create([
            'nombre' => 'Material de limpieza',
        ]);

    }
}
