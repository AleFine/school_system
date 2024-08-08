<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Grado;

use App\Models\Personal;
use App\Models\Curso;

class GradoCursoSecundariaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Grado::all();
        $grados = collect();
        foreach ($todos as $grado){
            if($grado->id_nivel == 2){
                $grados[] = $grado;
            }
        }

        return view('grado.secundaria.confirmar', compact('grados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $cursos = collect();

        $todos = Curso::all();
        foreach($todos as $curso){
            if($curso->id_grado == $id){
                $cursos[] = $curso;
            }
        }
        $grado = Grado::findOrFail($id);

        $personales = Personal::all();
        return view('grado.secundaria.index',compact('cursos','grado','personales'));
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
