<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Departamento;
use App\Models\Grado;
use App\Models\Personal;
use App\Models\Estudiante;
use App\Models\EstudianteCurso;
use App\Models\Notas;
use App\Models\Seccion;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CursosSecundariaController extends Controller
{

    public function generarReporteNotas(Curso $curso)
    {
        // Utiliza la relación estudiantes para obtener las notas
        $notas = $curso->estudiantes()->with('estudiante')->get();

        $pdf = Pdf::loadView('cursos.secundaria.estudiante-curso.pdf', compact('curso', 'notas'));
        return $pdf->download('reporte_notas_' . $curso->nombre_curso . '.pdf');
    }

    public function index(Request $request)
    {
        $buscarpor = $request->get('buscarpor');

        // Obtener todos los cursos que pertenecen a grados de primaria y filtrar por nombre de curso
        $cursosSecundaria = Curso::whereHas('seccion.grado.nivel', function ($query) {
            $query->where('nombre_nivel', 'Secundaria');
        })->where(function ($query) use ($buscarpor) {
            if (!empty($buscarpor)) {
                $query->where('nombre_curso', 'like', '%' . $buscarpor . '%');
            }
        })->paginate(18);

        return view('cursos.secundaria.index', compact('cursosSecundaria', 'buscarpor'));
    }

    

    public function showDetails(Curso $curso)
    {
        // Obtener todos los estudiantes que están en el curso
        $notas = Notas::where('id_curso', $curso->id_curso)
            ->with('estudiante') // Asumiendo que hay una relación con el modelo Estudiante
            ->get();
        
        // Pasar los datos a la vista
        return view('cursos.secundaria.estudiante-curso.details', compact('curso', 'notas'));
    }
    

    public function getTrabajadoresByDepartamento($departamento_id)
        {
            $trabajadores = Personal::where('id_departamento', $departamento_id)->get();
            return response()->json($trabajadores);
        }
    
        public function create()
{
    // Obtener secciones para el nivel 'Secundaria'
    $grados = Grado::whereHas('nivel', function ($query) {
        $query->where('nombre_nivel', 'Secundaria');
    })->get();

    // Obtener todos los departamentos
    $departamentos = Departamento::all();

    return view('cursos.secundaria.create', compact('grados', 'departamentos'));
}

public function store(Request $request)
{
    $request->validate([
        'nombre_curso' => 'required|string|max:255',
        'id_seccion' => 'required|exists:secciones,id_seccion',
        'id_trabajador' => 'required|exists:personal,id_trabajador',
    ]);

    Curso::create([
        'nombre_curso' => $request->nombre_curso,
        'id_seccion' => $request->id_seccion,
        'id_trabajador' => $request->id_trabajador,
    ]);

    return redirect()->route('cursos-secundaria.index')->with('success', 'Curso creado exitosamente.');
}

public function edit($id)
{
    $curso = Curso::findOrFail($id);
    $grados = Grado::whereHas('nivel', function ($query) {
        $query->where('nombre_nivel', 'Secundaria');
    })->get();
    $departamentos = Departamento::all();
    $secciones = Seccion::where('id_grado', $curso->id_grado)->get(); // Obtener secciones basadas en el grado del curso
    $trabajadores = Personal::where('id_departamento', $curso->id_departamento)->get();

    return view('cursos.secundaria.edit', compact('curso', 'grados', 'departamentos', 'secciones', 'trabajadores'));
}


public function update(Request $request, $id)
{
    $request->validate([
        'nombre_curso' => 'required|string|max:255',
        'id_seccion' => 'required|integer|exists:secciones,id_seccion',
        'id_trabajador' => 'required|integer|exists:personal,id_trabajador',
    ]);

    $curso = Curso::findOrFail($id);
    $curso->update([
        'nombre_curso' => $request->input('nombre_curso'),
        'id_seccion' => $request->input('id_seccion'),
        'id_trabajador' => $request->input('id_trabajador'),
    ]);

    return redirect()->route('cursos-secundaria.index')->with('success', 'Curso actualizado correctamente.');
}

public function destroy($id)
{
    $curso = Curso::findOrFail($id);
    $curso->delete();

    return redirect()->route('cursos-secundaria.index')->with('success', 'Curso eliminado exitosamente.');
}

}
