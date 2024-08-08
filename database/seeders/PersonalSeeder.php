<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Personal;
use Faker\Factory as Faker;

class PersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Personal::create([
                'nombre_trabajador' => $faker->firstName,
                'apellido_trabajador' => $faker->lastName,
                'DNI' => $faker->unique()->numerify('########'),
                'direccion' => $faker->address,
                'fechaIngreso' => $faker->date,
                'fechaNacimiento' => $faker->date,
                'telefono' => $faker->phoneNumber,
                'id_departamento' => \App\Models\Departamento::inRandomOrder()->first()->id_departamento,
            ]);
        }
    }
}
