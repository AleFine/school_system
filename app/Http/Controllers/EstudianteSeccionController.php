<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\EstudianteSeccion;
use App\Models\Estudiante;
use App\Models\EstudianteCurso;
use App\Models\Seccion;
use App\Models\Nivel;
use App\Models\Grado;
use Illuminate\Http\Request;

class EstudianteSeccionController extends Controller 
{
    public function index()
    {
        $estudiantesSecciones = EstudianteSeccion::with(['estudiante', 'seccion'])->get();
        return view('estudiantes_secciones.index', compact('estudiantesSecciones'));
    }

        public function getGradosByNivel($nivel_id)
    {
        $grados = Grado::where('id_nivel', $nivel_id)->get();
        return response()->json($grados);
    }

    public function getSeccionesByGrado($grado_id)
    {
        $secciones = Seccion::where('id_grado', $grado_id)->get();
        return response()->json($secciones);
    }

    public function create()
    {
        $estudiantes = Estudiante::all();
        $niveles = Nivel::all();
        $secciones = Seccion::all();
        return view('estudiantes_secciones.create', compact('estudiantes', 'secciones','niveles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_estudiante' => 'required|exists:estudiantes,id_estudiante',
            'id_seccion' => 'required|exists:secciones,id_seccion',
        ]);

        $seccion = Seccion::findOrFail($request->id_seccion);

        $numEstudiantesAsignados = EstudianteSeccion::where('id_seccion', $request->id_seccion)->count();

        if ($numEstudiantesAsignados >= $seccion->aforo) {
            return redirect()->back()->withErrors(['id_seccion' => 'El aforo de la sección ha sido alcanzado.'])->withInput();
        }

        $existingAssignment = EstudianteSeccion::where('id_estudiante', $request->id_estudiante)
                                            ->where('id_seccion', $request->id_seccion)
                                            ->first();

        if ($existingAssignment) {
            return redirect()->back()->withErrors(['id_estudiante' => 'El estudiante ya está asignado a esta sección.'])->withInput();
        }

        EstudianteSeccion::create([
            'id_estudiante' => $request->id_estudiante,
            'id_seccion' => $request->id_seccion,
        ]);

        $cursos = Curso::where('id_seccion', $request->id_seccion)->get();
        foreach ($cursos as $curso) {
            EstudianteCurso::updateOrCreate([
                'id_estudiante' => $request->id_estudiante,
                'id_curso' => $curso->id_curso,
            ], [
                'notaUnidad1' => 0,
                'notaUnidad2' => 0,
                'notaUnidad3' => 0,
            ]);
        }

        return redirect()->route('estudiantes_secciones.index')
                        ->with('success', 'Estudiante asignado a la sección y cursos correctamente.');
    }



    public function show($id_estudiante, $id_seccion)
    {
        $estudiantesSeccion = EstudianteSeccion::with(['estudiante', 'seccion.grado.nivel'])
                                               ->where('id_estudiante', $id_estudiante)
                                               ->where('id_seccion', $id_seccion)
                                               ->firstOrFail();
        return view('estudiantes_secciones.show', compact('estudiantesSeccion'));
    }

    public function edit($id_estudiante, $id_seccion)
    {
        $estudiantesSeccion = EstudianteSeccion::where('id_estudiante', $id_estudiante)
                                            ->where('id_seccion', $id_seccion)
                                            ->firstOrFail();
        $estudiantes = Estudiante::all();
        $niveles = Nivel::all();
        $grados = Grado::where('id_nivel', $estudiantesSeccion->seccion->grado->nivel->id_nivel)->get();
        $secciones = Seccion::where('id_grado', $estudiantesSeccion->seccion->id_grado)->get();

        return view('estudiantes_secciones.edit', compact('estudiantesSeccion', 'estudiantes', 'niveles', 'grados', 'secciones'));
    }


    public function update(Request $request, $id_estudiante, $id_seccion)
    {
        $request->validate([
            'id_estudiante' => 'required|exists:estudiantes,id_estudiante',
            'id_seccion' => 'required|exists:secciones,id_seccion',
        ]);

        $estudiantesSeccion = EstudianteSeccion::where('id_estudiante', $id_estudiante)
                                            ->where('id_seccion', $id_seccion)
                                            ->firstOrFail();

        $existingAssignment = EstudianteSeccion::where('id_estudiante', $request->id_estudiante)
                                            ->where('id_seccion', '!=', $id_seccion)
                                            ->first();
        if ($existingAssignment) {
            return redirect()->back()->withErrors(['id_estudiante' => 'El estudiante ya está asignado a otra sección.'])->withInput();
        }

        // Actualización de la asignación del estudiante a la sección seleccionada
        $estudiantesSeccion->update([
            'id_estudiante' => $request->id_estudiante,
            'id_seccion' => $request->id_seccion,
        ]);

        return redirect()->route('estudiantes_secciones.index')
                        ->with('success', 'Asignación actualizada correctamente.');
    }


    public function destroy($id_estudiante, $id_seccion)
    {
        EstudianteSeccion::where('id_estudiante', $id_estudiante)
                         ->where('id_seccion', $id_seccion)
                         ->delete();
    
        return redirect()->route('estudiantes_secciones.index')
                         ->with('success', 'Asignación eliminada correctamente.');
    }

    public function confirmar($id_estudiante, $id_seccion)
    {
        $estudiantesSeccion = EstudianteSeccion::where('id_estudiante', $id_estudiante)
                                               ->where('id_seccion', $id_seccion)
                                               ->firstOrFail();
        return view('estudiantes_secciones.confirmar', compact('estudiantesSeccion'));
    }

}
