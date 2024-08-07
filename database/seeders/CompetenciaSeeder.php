<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Competencia;
use App\Models\DetalleCurso;
use App\Models\Curso;

class CompetenciaSeeder extends Seeder
{
    public function run()
    {
        /*$competencia1 = Competencia::create(['descripcion' => 'Competencia 1']);
        $competencia2 = Competencia::create(['descripcion' => 'Competencia 2']);

        $curso = Curso::first(); // Suponiendo que ya tienes un curso creado

        DetalleCurso::create(['id_curso' => $curso->id, 'id_competencia' => $competencia1->id, 'nro_orden' => 1]);
        DetalleCurso::create(['id_curso' => $curso->id, 'id_competencia' => $competencia2->id, 'nro_orden' => 2]);
        */
        Competencia::factory()->count(10)->create();
    }
}

