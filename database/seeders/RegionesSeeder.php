<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pais;
use App\Models\Region;
use App\Models\Ciudad;
use App\Models\Distrito;

class RegionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1. Crear un país (opcional, si no tienes países predefinidos)
        $pais = Pais::create([
            'nombre' => 'Perú',
            'codigo_iso'=>'PER'
        ]);

        // 2. Crear una región en ese país
        $region = Region::create([
            'nombre' => ' La libertad',
            'pais_id' => $pais->id
        ]);

        // 3. Crear ciudades en esa región
        $ciudad1 = Ciudad::create([
            'nombre' => 'Trujillo',
            'region_id' => $region->id
        ]);

        $ciudad2 = Ciudad::create([
            'nombre' => 'Pataz',
            'region_id' => $region->id
        ]);

        // 4. Crear distritos para la Ciudad 1
        Distrito::create([
            'nombre' => 'La Esperanza',
            'ciudad_id' => $ciudad1->id
        ]);

        Distrito::create([
            'nombre' => 'El Porvenir',
            'ciudad_id' => $ciudad1->id
        ]);

        // 5. Crear distritos para la Ciudad 2
        Distrito::create([
            'nombre' => 'Vista Florida',
            'ciudad_id' => $ciudad2->id
        ]);

        Distrito::create([
            'nombre' => 'La Coyona',
            'ciudad_id' => $ciudad2->id
        ]);



        $region2 = Region::create([
            'nombre' => ' Lima',
            'pais_id' => $pais->id
        ]);

        // 3. Crear ciudades en esa región
        $ciudad3 = Ciudad::create([
            'nombre' => 'La Victoria',
            'region_id' => $region2->id
        ]);

        $ciudad4 = Ciudad::create([
            'nombre' => 'Ate',
            'region_id' => $region2->id
        ]);

        // 4. Crear distritos para la Ciudad 1
        Distrito::create([
            'nombre' => 'Vitarte',
            'ciudad_id' => $ciudad4->id
        ]);

        Distrito::create([
            'nombre' => 'Santa Clara',
            'ciudad_id' => $ciudad4->id
        ]);

        // 5. Crear distritos para la Ciudad 2
        Distrito::create([
            'nombre' => 'Unidad vecinal Matute',
            'ciudad_id' => $ciudad3->id
        ]);
    }
}
