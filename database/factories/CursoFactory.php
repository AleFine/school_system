<?php

namespace Database\Factories;

use App\Models\Curso;
use App\Models\Grado;
use App\Models\Personal;
use App\Models\Departamento;
use Illuminate\Database\Eloquent\Factories\Factory;

class CursoFactory extends Factory
{
    protected $model = Curso::class;

    public function definition()
    {
        return [
            'nombre_curso' => $this->faker->sentence(3),
            'id_grado' => Grado::inRandomOrder()->first()->id_grado,
            'id_trabajador' => $this->getRandomTeacherId(),
            'id_departamento' => Departamento::inRandomOrder()->first()->id_departamento,
        ];
    }

    private function getRandomTeacherId()
    {
        $teachers = Personal::all();
        return $teachers->isEmpty() ? null : $teachers->random()->id_trabajador;
    }
}
