<?php

namespace Database\Factories;

use App\Models\Competencia;
use Illuminate\Database\Eloquent\Factories\Factory;

class NivelFactory extends Factory
{
    protected $model = Competencia::class;

    public function definition()
    {
        return [
            'id_competencia' => $this->faker->word,
            'descripcion' => $this->faker->word(),
        ];
    }
}