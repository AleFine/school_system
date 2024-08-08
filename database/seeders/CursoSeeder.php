<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Curso;
use App\Models\Grado;
use App\Models\Personal;
use App\Models\Nivel;
use Faker\Factory as Faker;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Obtener todos los niveles de primaria y secundaria
        $nivelesPrimaria = Nivel::where('nombre_nivel', 'LIKE', '%Primaria%')->get();
        $nivelesSecundaria = Nivel::where('nombre_nivel', 'LIKE', '%Secundaria%')->get();

        // Verificar si hay niveles disponibles
        if ($nivelesPrimaria->isEmpty() || $nivelesSecundaria->isEmpty()) {
            $this->command->info('No hay suficientes registros de niveles de Primaria o Secundaria. Por favor, asegúrese de crearlos primero.');
            return;
        }

        // Crear 6 cursos por cada grado de primaria
        foreach ($nivelesPrimaria as $nivel) {
            $grados = $nivel->grados;
            foreach ($grados as $grado) {
                for ($i = 1; $i <= 6; $i++) {
                    Curso::create([
                        'nombre_curso' => 'Curso ' . $i . ' - ' . $grado->nombre_grado,
                        'id_grado' => $grado->id_grado,
                        'id_trabajador' => $this->getRandomTeacherId(),
                    ]);
                }
            }
        }

        // Crear 6 cursos por cada grado de secundaria
        foreach ($nivelesSecundaria as $nivel) {
            $grados = $nivel->grados;
            foreach ($grados as $grado) {
                for ($i = 1; $i <= 6; $i++) {
                    Curso::create([
                        'nombre_curso' => 'Curso ' . $i . ' - ' . $grado->nombre_grado,
                        'id_grado' => $grado->id_grado,
                        'id_trabajador' => $this->getRandomTeacherId(),
                    ]);
                }
            }
        }
    }

    // Método para obtener un ID de trabajador aleatorio
    private function getRandomTeacherId()
    {
        $teachers = Personal::all();
        if ($teachers->isEmpty()) {
            // Log a warning or handle the case where no teachers are available
            return null; // or handle appropriately
        }
        return $teachers->random()->id_trabajador;
    }
}
