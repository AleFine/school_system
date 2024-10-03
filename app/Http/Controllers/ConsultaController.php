<?php

namespace App\Http\Controllers;

use App\Models\Grado;
use App\Models\Curso;
use App\Models\Seccion;
use App\Models\EstudianteSeccion;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function index()
    {
        $niveles = \App\Models\Nivel::all(); // Obtenemos todos los niveles
        $grados = Grado::all(); // Obtenemos todos los grados para la vista
        return view('consultas.index', compact('niveles', 'grados'));
    }


    public function filter(Request $request)
    {
        // Validar que el grado y la sección existen
        $request->validate([
            'id_grado' => 'required|exists:grados,id_grado',
            'id_seccion' => 'required|exists:secciones,id_seccion',
        ]);

        // Obtener el grado con la sección correspondiente
        $grado = Grado::find($request->id_grado);

        if (!$grado) {
            return redirect()->back()->withErrors('Grado no encontrado.');
        }

        $seccion = Seccion::where('id_grado', $request->id_grado)
                          ->where('id_seccion', $request->id_seccion)
                          ->first();

        if (!$seccion) {
            return redirect()->back()->withErrors('Sección no encontrada.');
        }

        // Obtener todos los cursos de la sección
        $cursos = Curso::where('id_seccion', $seccion->id_seccion)->get();

        // Obtener los estudiantes asignados a la sección
        $estudiantes = EstudianteSeccion::with('estudiante')
                                         ->where('id_seccion', $seccion->id_seccion)
                                         ->get();

        // Obtener la cantidad de estudiantes asignados y el aforo de la sección
        $numEstudiantesAsignados = $estudiantes->count();
        $aforo = $seccion->aforo;

        return view('consultas.results', compact('grado', 'seccion', 'cursos', 'estudiantes', 'numEstudiantesAsignados', 'aforo'));
    }
}
