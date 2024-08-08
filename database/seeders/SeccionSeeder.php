<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Seccion;
use App\Models\Grado;

class SeccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grados = Grado::all();

        $secciones = ['A', 'B', 'C'];

        foreach ($grados as $grado) {
            foreach ($secciones as $nombre_seccion) {
                Seccion::create([
                    'nombre_seccion' => $nombre_seccion,
                    'aforo' => 30, 
                    'id_grado' => $grado->id_grado,
                ]);
            }
        }
    }
}
