<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            'name' => 'Enrique',
            'ubicacion' => 'General',
            'estado' => 'activo',
            'email' => 'enrique_j_@hotmail.com',
            'password' => Hash::make('sistema'),
            'area' => 'Departamento de Operación y Desarrollode Sistemas',
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Jesus Manriquez Vargas',
            'ubicacion' => 'General',
            'estado' => 'activo',
            'email' => 'subdirti.irycem@correo.michoacan.gob.mx',
            'password' => Hash::make('sistema'),
            'area' => 'Subdirección de Tecnologías de la Información',
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Sergio Arturo Calvillo Corral',
            'ubicacion' => 'General',
            'estado' => 'activo',
            'email' => 'directorcat@correo.michoacan.gob.mx',
            'password' => Hash::make('sistema'),
            'area' => 'Dirección de Catastro',
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Omar Alejandro',
            'ubicacion' => 'General',
            'estado' => 'activo',
            'email' => 'directorrpp@correo.michoacan.gob.mx',
            'password' => Hash::make('sistema'),
            'area' => 'Dirección del Registro Público de la Propiedad',
        ])->assignRole('Administrador');

    }
}
