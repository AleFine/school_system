<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NivelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('niveles')->insert([
            'id_nivel' => 1,
            'turno' => 'Mañana',
            'nombre_nivel' => 'Primaria'
        ]);

        DB::table('niveles')->insert([
            'id_nivel' => 2,
            'turno' => 'Tarde',
            'nombre_nivel' => 'Secundaria'
        ]);
    }
}
