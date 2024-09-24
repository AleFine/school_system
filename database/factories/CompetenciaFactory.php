<?php

namespace Database\Factories;
use App\Models\Competencia;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Competencia>
 */
class CompetenciaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Competencia::class; 
    public function definition()
    {
        return [
            'descripcion' => $this->faker->sentence,
        ];
    }
}
