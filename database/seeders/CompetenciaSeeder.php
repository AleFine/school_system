<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Competencia;
use App\Models\Curso;
use App\Models\DetalleCurso;

class CompetenciaSeeder extends Seeder
{
    public function run()
    {
        $cursos = Curso::all();
        if ($cursos->isEmpty()) {
            $cursos = Curso::factory()->count(10)->create();
        }

        Competencia::factory()->count(10)->create()->each(function ($competencia) use ($cursos) {
            $randomCurso = $cursos->random();

            DetalleCurso::create([
                'id_curso' => $randomCurso->id_curso,
                'id_competencia' => $competencia->id_competencia,
                'nro_orden' => rand(1, 10), 
            ]);
        });
    }
}

