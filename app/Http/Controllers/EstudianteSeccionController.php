<?php

namespace App\Http\Controllers;

use App\Models\EstudianteSeccion;
use App\Models\Estudiante;
use App\Models\Seccion;
use App\Models\Grado;
use Illuminate\Http\Request;

class EstudianteSeccionController extends Controller
{
    public function index()
    {
        $estudiantesSecciones = EstudianteSeccion::with(['estudiante', 'seccion'])->get();
        return view('estudiantes_secciones.index', compact('estudiantesSecciones'));
    }

    public function create()
    {
        $estudiantes = Estudiante::all();
        $secciones = Seccion::with(['grado.nivel'])->get();
        return view('estudiantes_secciones.create', compact('estudiantes', 'secciones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_estudiante' => 'required|exists:estudiantes,id_estudiante',
            'id_seccion' => 'required|exists:secciones,id_seccion',
        ]);

        $existingAssignment = EstudianteSeccion::where('id_estudiante', $request->id_estudiante)->first();
        if ($existingAssignment) {
            return redirect()->back()->withErrors(['id_estudiante' => 'El estudiante ya está asignado a una sección.'])->withInput();
        }

        EstudianteSeccion::create($request->all());

        return redirect()->route('estudiantes_secciones.index')
                         ->with('success', 'Estudiante asignado a la sección correctamente.');
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
        $grados = Grado::all();
        $secciones = Seccion::where('id_grado', $estudiantesSeccion->seccion->id_grado)->get();
        return view('estudiantes_secciones.edit', compact('estudiantesSeccion', 'estudiantes', 'grados', 'secciones'));
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

        $estudiantesSeccion->update($request->all());

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

    // Método para obtener secciones por grado
    public function getSeccionesByGrado($gradoId)
    {
        $secciones = Seccion::where('id_grado', $gradoId)->with('grado')->get();
        return response()->json($secciones);
    }
}
