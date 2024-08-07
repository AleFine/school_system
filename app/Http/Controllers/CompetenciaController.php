<?php

namespace App\Http\Controllers;

use App\Models\Competencia;
use App\Models\Curso;
use App\Models\DetalleCurso;
use Illuminate\Http\Request;

class CompetenciaController extends Controller
{
    public function index()
    {
        $competencias = Competencia::paginate(10);
        return view('competencias.index', compact('competencias'));
    }

    public function create()
    {
        $cursos = Curso::all();
        return view('competencias.create', compact('cursos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|max:255',
            'id_curso' => 'required|exists:cursos,id_curso',
        ]);

        $competencia = Competencia::create($request->only('descripcion'));

        DetalleCurso::create([
            'id_curso' => $request->id_curso,
            'id_competencia' => $competencia->id_competencia,
            'nro_orden' => DetalleCurso::where('id_curso', $request->id_curso)->max('nro_orden') + 1,
        ]);

        return redirect()->route('competencias.index')->with('success', 'Competencia creada exitosamente.');
    }

    public function show(Competencia $competencia)
    {
        //
    }

    public function edit(Competencia $competencia)
    {
        $cursos = curso::all();
        return view('competencias.edit', compact('competencia', 'cursos'));
    }

    public function update(Request $request, Competencia $competencia)
    {
        $request->validate([
            'descripcion' => 'required|max:255',
            'id_curso' => 'required|exists:cursos,id_curso',
        ]);

        $competencia->update($request->all());

        return redirect()->route('competencias.index')
                        ->with('success', 'competencia actualizado correctamente.');
    }

    public function destroy(Competencia $competencia)
    {
        $competencia->delete();
        DetalleCurso::where('id_competencia', $competencia->id_competencia)->delete();

        return redirect()->route('competencias.index')->with('success', 'Competencia eliminada exitosamente.');
    }

    public function confirmar($id){
        $competencia=Competencia::findOrFail($id);
        return view('competencias.confirmar',compact('competencia'));
    }
}


