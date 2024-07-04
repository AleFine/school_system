<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Departamento;
use App\Models\Personal;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    // User::factory(10)->create();

    public function run(): void
    {

        /*$departamentos = [
            ['nombre' => 'Matemáticas', 'descripcion' => 'Departamento de Matemáticas'],
            ['nombre' => 'Ciencias Naturales', 'descripcion' => 'Departamento de Ciencias Naturales'],
            ['nombre' => 'Lengua y Literatura', 'descripcion' => 'Departamento de Lengua y Literatura'],
            ['nombre' => 'Idiomas Extranjeros', 'descripcion' => 'Departamento de Idiomas Extranjeros'],
            ['nombre' => 'Historia y Ciencias Sociales', 'descripcion' => 'Departamento de Historia y Ciencias Sociales'],
            ['nombre' => 'Educación Física', 'descripcion' => 'Departamento de Educación Física'],
            ['nombre' => 'Artes', 'descripcion' => 'Departamento de Artes'],
            ['nombre' => 'Tecnología e Informática', 'descripcion' => 'Departamento de Tecnología e Informática'],
            ['nombre' => 'Educación Especial', 'descripcion' => 'Departamento de Educación Especial'],
            ['nombre' => 'Orientación y Consejería', 'descripcion' => 'Departamento de Orientación y Consejería'],
        ];

        foreach ($departamentos as $departamento) {
            DB::table('departamentos')->insert([
                'nombre_departamento' => $departamento['nombre'],
                'descripcion' => $departamento['descripcion'],
            ]);
        }*/

        Personal::factory(10)->create();

    }
}
