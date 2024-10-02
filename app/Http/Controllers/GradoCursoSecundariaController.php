<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Grado;

use App\Models\Personal;
use App\Models\Curso;
use App\Models\Seccion;

class GradoCursoSecundariaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grados = Grado::where('id_nivel', 2)->get();

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
