<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Grados para Primaria
        DB::table('grados')->insert([
            'id_grado' => 1,
            'nombre_grado' => 'Primero',
            'id_nivel' => 1
        ]);
        DB::table('grados')->insert([
            'id_grado' => 2,
            'nombre_grado' => 'Segundo',
            'id_nivel' => 1
        ]);
        DB::table('grados')->insert([
            'id_grado' => 3,
            'nombre_grado' => 'Tercero',
            'id_nivel' => 1
        ]);
        DB::table('grados')->insert([
            'id_grado' => 4,
            'nombre_grado' => 'Cuarto',
            'id_nivel' => 1
        ]);
        DB::table('grados')->insert([
            'id_grado' => 5,
            'nombre_grado' => 'Quinto',
            'id_nivel' => 1
        ]);
        DB::table('grados')->insert([
            'id_grado' => 6,
            'nombre_grado' => 'Sexto',
            'id_nivel' => 1
        ]);

        // Grados para Secundaria
        DB::table('grados')->insert([
            'id_grado' => 7,
            'nombre_grado' => 'Primero',
            'id_nivel' => 2
        ]);
        DB::table('grados')->insert([
            'id_grado' => 8,
            'nombre_grado' => 'Segundo',
            'id_nivel' => 2
        ]);
        DB::table('grados')->insert([
            'id_grado' => 9,
            'nombre_grado' => 'Tercero',
            'id_nivel' => 2
        ]);
        DB::table('grados')->insert([
            'id_grado' => 10,
            'nombre_grado' => 'Cuarto',
            'id_nivel' => 2
        ]);
        DB::table('grados')->insert([
            'id_grado' => 11,
            'nombre_grado' => 'Quinto',
            'id_nivel' => 2
        ]);
    }
    
}
