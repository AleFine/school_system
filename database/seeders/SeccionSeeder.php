<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $grados = DB::table('grados')->get();
        $secciones = ['A', 'B', 'C', 'D', 'E'];

        foreach ($grados as $grado) {
            foreach ($secciones as $seccion) {
                DB::table('secciones')->insert([
                    'nombre_seccion' => $seccion,
                    'aforo' => 30,
                    'id_grado' => $grado->id_grado,
                ]);
            }
        }
    }
}
