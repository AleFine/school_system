<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Departamento;
use App\Models\EstudianteCurso;
use App\Models\Grado;
use App\Models\Personal;
use App\Models\Estudiante;
use App\Models\Notas;
use Illuminate\Http\Request;

class CursosSecundariaController extends Controller
{
    public function index(Request $request)
    {
        $buscarpor = $request->get('buscarpor');

        // Obtener todos los cursos que pertenecen a grados de primaria y filtrar por nombre de curso
        $cursosSecundaria = Curso::whereHas('grado.nivel', function ($query) {
            $query->where('nombre_nivel', 'Secundaria');
        })->where(function ($query) use ($buscarpor) {
            if (!empty($buscarpor)) {
                $query->where('nombre_curso', 'like', '%' . $buscarpor . '%');
            }
        })->paginate(6);

        return view('cursos.secundaria.index', compact('cursosSecundaria', 'buscarpor'));
    }

    

    public function showDetails(Curso $curso)
    {
        $estudiantes_del_curso= EstudianteCurso::where('id_curso',$curso->id_curso)->get();
        $notas = Notas::where('id_curso',$curso->id_curso)->get();
        return view('cursos.secundaria.estudiante-curso.details',compact('curso','estudiantes_del_curso','notas'));
    }

    public function showAddStudents(Curso $curso)
    {
        $estudiantes = Estudiante::all();
        return view('cursos.secundaria.estudiante-curso.add-students',compact('curso','estudiantes'));
    }

    public function addStudent(Request $request, Curso $curso)
    {
        $request->validate([
            'id_estudiante' => 'required|exists:estudiantes,id_estudiante',
        ]);

        // Verifica si la relación ya existe para evitar duplicados
        $exists = EstudianteCurso::where('id_curso', $curso->id_curso)
                                  ->where('id_estudiante', $request->id_estudiante)
                                  ->exists();

        if (!$exists) {
            EstudianteCurso::create([
                'id_curso' => $curso->id_curso,
                'id_estudiante' => $request->id_estudiante,
            ]);
        }

        //dd($request->id_estudiante);

        return redirect()->route('cursos-secundaria.details', $curso->id_curso)
                         ->with('success', 'Estudiante añadido correctamente.');
    }






    public function create()
    {
        $grados = Grado::with('nivel')->whereHas('nivel', function ($query) {
            $query->where('nombre_nivel', 'Secundaria');
        })->get();

        $departamentos = Departamento::all();

        return view('cursos.secundaria.create', compact('grados', 'departamentos'));
    }

    public function store(Request $request)
        {
            $request->validate([
                'nombre_curso' => 'required|string|max:255',
                'id_grado' => 'required|exists:grados,id_grado',
                'id_trabajador' => 'required|exists:personal,id_trabajador',
            ]);

            Curso::create([
                'nombre_curso' => $request->nombre_curso,
                'id_grado' => $request->id_grado,
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
        $trabajadores = Personal::all();

        return view('cursos.secundaria.edit', compact('curso', 'grados', 'departamentos', 'trabajadores'));
    }

    public function getTrabajadoresByDepartamento($departamento_id)
        {
            $trabajadores = Personal::where('id_departamento', $departamento_id)->get();
            return response()->json($trabajadores);
        }
    public function update(Request $request, $id)
        {
            $request->validate([
                'nombre_curso' => 'required|string|max:255',
                'id_grado' => 'required|integer|exists:grados,id_grado',
                'id_trabajador' => 'required|integer|exists:personal,id_trabajador',
            ]);

            $curso = Curso::findOrFail($id);
            $curso->update([
                'nombre_curso' => $request->input('nombre_curso'),
                'id_grado' => $request->input('id_grado'),
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
