<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Nivel;
use App\Models\Grado;
use App\Models\Seccion;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Seccion::factory()->count(1)->create();

        
    }
}
