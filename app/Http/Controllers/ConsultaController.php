<?php

namespace App\Http\Controllers;

use App\Models\Grado;
use App\Models\Curso;
use App\Models\EstudianteSeccion;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function index()
    {
        $grados = Grado::all();
        return view('consultas.index', compact('grados'));
    }

    public function filter(Request $request)
    {
        $request->validate([
            'id_grado' => 'required|exists:grados,id_grado',
            'id_seccion' => 'required|exists:secciones,id_seccion',
        ]);

        $grado = Grado::with(['secciones' => function ($query) use ($request) {
            $query->where('id_seccion', $request->id_seccion);
        }])->find($request->id_grado);

        if (!$grado) {
            return redirect()->back()->withErrors('Grado no encontrado.');
        }

        $seccion = $grado->secciones()->find($request->id_seccion);

        if (!$seccion) {
            return redirect()->back()->withErrors('Sección no encontrada.');
        }

        $cursos = Curso::where('id_seccion', $seccion->id_seccion)->get();
        
        // Consultar estudiantes directamente por id_seccion
        $estudiantes = EstudianteSeccion::where('id_seccion', $seccion->id_seccion)->get();
        

 

        return view('consultas.results', compact('grado', 'seccion', 'cursos', 'estudiantes'));
    }


}

