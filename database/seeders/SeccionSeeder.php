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
        $aula_primaria = 101;
        $aula_secundaria = 201;

        foreach ($grados as $grado) {
            if ($grado->id_nivel == 1) { // primaria
                for ($i = 0; $i < 3; $i++) {
                    DB::table('secciones')->insert([
                        'numero_aula' => $aula_primaria++,
                        'aforo' => 30,
                        'id_grado' => $grado->id_grado
                    ]);
                }
            } elseif ($grado->id_nivel == 2) { // secundaria
                for ($i = 0; $i < 3; $i++) {
                    DB::table('secciones')->insert([
                        'numero_aula' => $aula_secundaria++,
                        'aforo' => 30,
                        'id_grado' => $grado->id_grado
                    ]);
                }
            }
        }
    }
}
