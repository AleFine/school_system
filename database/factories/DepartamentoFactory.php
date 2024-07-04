<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Departamento;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Departamento>
 */
class DepartamentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Departamento::class;

    public function definition(): array
    {
        return [
            'nombre_departamento' => $this->faker->sentence(1),
            'descripcion' => $this->faker->sentence(1),
        ];
    }
}
