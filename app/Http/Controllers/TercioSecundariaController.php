<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Grado;
use App\Models\Estudiante;
use App\Models\Notas;

class TercioSecundariaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Grado::all();
        $grados = collect();
        foreach ($todos as $grado){
            if($grado->id_nivel == 1){
                $grados[] = $grado;
            }
        }

        return view('tercio.secundaria.confirmar', compact('grados'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $todos = Estudiante::all();
        $notas_totales = Notas::all();
        $cursos_totales = Curso::all();
        $lista_estudiantes = [];
        $estudiantes = collect();
        $cursos = collect();

        foreach ($todos as $estudiante){
            if($estudiante->id_grado == $id){
                $estudiantes[] = $estudiante; #aca ya tenemos los estudiantes del nivel primaria y su grado
            }
        }

        foreach($cursos_totales as $curso){
            if($curso->id_grado == $id){
                $cursos[] = $curso; #todos los cursos los cuales esten relacionados a este grado
            }
        }

        $cantidad = count($cursos);

        foreach ($estudiantes as $estudiante){
            $promedio = 0;
            foreach($notas_totales as $not){
                if($not->id_estudiante == $estudiante->id_estudiante){
                    $promedio = $promedio + ($not->notaUnidad1 + $not->notaUnidad2 + $not->notaUnidad3)/3.0;
                }
            }
            $lista_estudiantes[] = new Nota_Estudiante($estudiante->id_estudiante, $estudiante->nombre_estudiante,$promedio/$cantidad);
        }
        $grade = Grado::findOrFail($id);

        usort($lista_estudiantes,'comparar_notas');
        return view('tercio.secundaria.index',compact('lista_estudiantes','grade'));

    }

    function comparar_notas($a, $b) {
        return $b->getNota() - $a->getNota();
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
