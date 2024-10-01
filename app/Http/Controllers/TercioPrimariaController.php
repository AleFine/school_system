<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grado;
use App\Models\EstudianteSeccion;
use App\Models\Notas;
use App\Models\Seccion;

class TercioPrimariaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grados = Grado::where('id_nivel', 1)->get();
        return view('tercio.primaria.confirmar', compact('grados'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) #el parametro es el id_delgrado
    {
        $estudiantes_secciones = EstudianteSeccion::all();

        $secciones = Seccion::where('id_grado', $id)->get();
        foreach ($secciones as $seccion) {
            foreach($estudiantes_secciones as $estudiante_seccion) {
                if($estudiante_seccion->id_seccion == $seccion->id_seccion) {
                    $estudiantes[] = $estudiante_seccion->estudiante;
                }
            }
        } //obtenemos todos los estudiantes relacionados al grado

        $todas_notas = Notas::all();

        foreach ($estudiantes as $estudiante) {
            $nota_curso = 0;
            $cantidad = 0;
            foreach ($todas_notas as $note) {
                if ($note->id_estudiante == $estudiante->id_estudiante) {
                    $nota_curso += ($note->notaUnidad1 + $note->notaUnidad2 + $note->notaUnidad3) / 3;
                    $cantidad += 1;
                }
            }

            $notafinal = $nota_curso / $cantidad;
            $lista_estudiantes[] = new Nota_Estudiante($estudiante->id_estudiante, $estudiante->nombre_estudiante . ' ' . $estudiante->apellido_estudiante, $notafinal);
        }

        usort($lista_estudiantes, function($a, $b) {
                return $b->getNota() - $a->getNota();
            });

        $grade = Grado::findOrFail($id); #pasamos el grado a la vista

        return view('tercio.primaria.index',compact('lista_estudiantes','grade'));
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

class Nota_Estudiante {
    public $id_estudiante;
    public $nombre;
    public $nota;

    public function __construct($id_estudiante, $nombre, $nota) {
        $this->id_estudiante = $id_estudiante;
        $this->nombre = $nombre;
        $this->nota = $nota;
    }

    public function setIdEstudiante($id_estudiante) {
        $this->id_estudiante = $id_estudiante;
    }

    public function getIdEstudiante() {
        return $this->id_estudiante;
    }

    public function setNombreEstudiante($nombre) {
        $this->nombre = $nombre;
    }

    public function getNombreEstudiante() {
        return $this->nombre;
    }

    public function setNota($nota) {
        $this->nota = $nota;
    }

    public function getNota() {
        return $this->nota;
    }
}
