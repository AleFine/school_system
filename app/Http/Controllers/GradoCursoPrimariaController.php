<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Grado;

class GradoCursoPrimariaController extends Controller
{


    public function index(Request $request)
    {
        $todos = Grado::all();

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
        $grado = Grado::findOrFail($id);
        $cursos = $grado->cursos;

        return view('grado.primaria.index',compact('cursos','grado'));
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
