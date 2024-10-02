<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Grado;

use App\Models\Personal;
use App\Models\Curso;
use App\Models\Seccion;

class GradoCursoPrimariaController extends Controller
{


    public function index(Request $request)
    {
        $todos = Grado::all();
        $grados = collect();
        foreach ($todos as $grado){
            if($grado->id_nivel == 1){
                $grados[] = $grado;
            }
        }

        return view('grado.primaria.confirmar', compact('grados'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function show(int $id)
    {
        $todas = Seccion::all();
        $todos_cursos = Curso::all();

        $secciones = Seccion::where("id_grado",$id)->get();

        foreach ($todos_cursos as $curso){
            foreach ($secciones as $secc){
                if($secc->id_seccion == $curso->id_seccion){
                    $cursos[]=$curso;
                }
            }
        }

        $grado = Grado::findOrFail($id);

        $personales = Personal::all();
        return view('grado.primaria.index',compact('cursos','grado','personales'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
