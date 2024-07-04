<?php

namespace Database\Factories;

use App\Models\Seccion;
use Illuminate\Database\Eloquent\Factories\Factory;

class SeccionFactory extends Factory
{
    protected $model = Seccion::class;

    public function definition()
    {
        return [
            'numero_aula' => $this->faker->numberBetween(100, 300),
            'aforo' => $this->faker->numberBetween(20, 50),
            'id_grado' => function () {
                return \App\Models\Grado::factory()->create()->id_grado;
            },
        ];
    }
}