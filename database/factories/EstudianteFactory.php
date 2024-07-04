<?php

namespace Database\Factories;

use App\Models\Estudiante;
use Illuminate\Database\Eloquent\Factories\Factory;

class EstudianteFactory extends Factory
{
    protected $model = Estudiante::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre_estudiante' => $this->faker->firstName,
            'apellido_estudiante' => $this->faker->lastName,
            'fechaNacimiento' => $this->faker->date,
            'DNI' => $this->faker->unique()->numerify('#########'), // Genera un número único de 9 dígitos
            'genero' => $this->faker->randomElement(['Masculino', 'Femenino']),
            'pais' => $this->faker->country,
            'region' => $this->faker->state,
            'ciudad' => $this->faker->city,
            'distrito' => $this->faker->word,
            'estado_civil' => $this->faker->randomElement(['Soltero', 'Casado', 'Divorciado', 'Viudo']),
            'telefono' => $this->faker->phoneNumber,
        ];
    }
}
