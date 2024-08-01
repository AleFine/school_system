<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Curso;
use App\Models\Notas;

class NotasController extends Controller
{
    public function edit(Curso $curso, Estudiante $estudiante)
    {
        $nota = Notas::where('id_curso',$curso->id_curso)
                        ->where('id_estudiante',$estudiante->id_estudiante)
                        ->first();
        //dd($nota);

        return view('cursos.primaria.estudiante-curso.edit-student',compact('nota'));
    }

    public function edit2(Curso $curso, Estudiante $estudiante)
    {
        $nota = Notas::where('id_curso',$curso->id_curso)
                        ->where('id_estudiante',$estudiante->id_estudiante)
                        ->first();
        //dd($nota);

        return view('cursos.secundaria.estudiante-curso.edit-students',compact('nota'));
    }

    public function update(Request $request, Curso $curso, Estudiante $estudiante)
    {
        // Valida los datos del request
        $validatedData = $request->validate([
            'notaUnidad1' => 'required|integer|min:0|max:20',
            'notaUnidad2' => 'required|integer|min:0|max:20',
            'notaUnidad3' => 'required|integer|min:0|max:20',
        ]);

        // Busca el registro en la tabla Notas
        $nota = Notas::where('id_curso', $curso->id_curso)
                    ->where('id_estudiante', $estudiante->id_estudiante)
                    ->first();

        // Verifica si el registro fue encontrado
        if (!$nota) {
            return redirect()->back()->with('error', 'Registro no encontrado');
        }

        // Actualiza los valores en el registro
        $nota->notaUnidad1 = $validatedData['notaUnidad1'];
        $nota->notaUnidad2 = $validatedData['notaUnidad2'];
        $nota->notaUnidad3 = $validatedData['notaUnidad3'];

        // Guarda los cambios en la base de datos
        $nota->save();

        // Redirige con un mensaje de éxito
        return redirect()->route('cursos-primaria.details', $curso->id_curso)
                        ->with('success', 'Calificaciones actualizadas correctamente');
    }

}
