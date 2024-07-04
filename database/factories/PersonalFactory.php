<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Departamento;
use App\Models\Personal;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Personal>
 */
class PersonalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Personal::class;

    public function definition(): array
    {
        return [
            'nombre_trabajador' => $this->faker->sentence(1),
            'apellido_trabajador' => $this->faker->sentence(1),
            'DNI' => $this->faker->numerify('########'),
            'direccion' => $this->faker->sentence(1),
            'fechaIngreso' => $this->faker->date,
            'fechaNacimiento' => $this->faker->date,
            'telefono' => $this->faker->sentence(1),
            'id_departamento' => Departamento::factory(),
        ];
    }
}
