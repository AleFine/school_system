<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Nivel;
use App\Models\Grado;
use App\Models\Seccion;
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
    public function run()
    {
        $this->call([
            NivelSeeder::class,
            GradoSeeder::class,
            SeccionSeeder::class,
            DepartamentoSeeder::class,
            UserSeeder::class,
            EstudianteSeeder::class,
            PersonalSeeder::class,
            CursoSeeder::class,
        ]);
    }
}
