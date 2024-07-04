<?php

namespace Database\Seeders;

use App\Models\Departamento;
use App\Models\Personal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Obtener todos los departamentos
        $departamentos = Departamento::all();

        // Generar 5 docentes por cada departamento
        $faker = Faker::create();

        foreach ($departamentos as $departamento) {
            for ($i = 0; $i < 5; $i++) {
                Personal::create([
                    'nombre_trabajador' => $faker->firstName,
                    'apellido_trabajador' => $faker->lastName,
                    'DNI' => $faker->unique()->randomNumber(8),
                    'direccion' => $faker->address,
                    'fechaIngreso' => $faker->date(),
                    'fechaNacimiento' => $faker->date(),
                    'telefono' => $faker->phoneNumber,
                    'id_departamento' => $departamento->id_departamento,
                ]);
            }
        }
    }
}
