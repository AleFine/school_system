<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Grado;
use App\Models\EstudianteSeccion;
use App\Models\Estudiante;
use App\Models\Notas;
use App\Models\Seccion;

class TercioPrimariaController extends Controller
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

        return view('tercio.primaria.confirmar', compact('grados'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) #el parametro es el id_delgrado
    {
        $todos_estudiantes = Estudiante::all();
        $estudiantes_seccion = EstudianteSeccion::all();
        $notas_totales = Notas::all();

        $cursos = [];
        $lista_estudiantes = [];
        $estudiantes = [];

        $secciones = Seccion::where('id_grado', $id)->get(); //todas las secciones relacionadas con este grado
        $todos_cursos = Curso::all();
        
        foreach ($secciones as $secc){
            foreach($todos_cursos as $cur){
                if($secc->id_seccion == $cur->id_seccion){
                    $cursos[]=$cur;
                }
            }
        }

        foreach($estudiantes_seccion as $estsec){
            foreach($secciones as $section){
                if($section->id_seccion == $estsec->id_seccion){
                    foreach($todos_estudiantes as $estu){
                        if($estu->id_estudiante == $estsec->id_estudiante){
                            $estudiantes[] = $estu;
                        }
                    }
                }
            }
        }

        $cantidad = count($cursos) + 1; #sacamos la cantidad de cursos para dividir al nota general total del alumno entre esta cantidad

        if($cantidad<=0){
            $lista_estudiantes[] = [];
        }
        else{
            foreach ($estudiantes as $estudiante){
                $promedio = 0;
                foreach($notas_totales as $not){
                    if($not->id_estudiante == $estudiante->id_estudiante && $not->notaUnidad1 + $not->notaUnidad2 + $not->notaUnidad3>0 ){
                        $promedio +=  ($not->notaUnidad1 + $not->notaUnidad2 + $not->notaUnidad3)/3.0;
                    } #hacemos dos foreach para sumar repetidamente todas las notas de los diferentes cursos
                }

                $promedio_final = (float) $promedio / $cantidad;
                $promedios[] = $promedio_final;
                $lista_estudiantes[] = new Nota_Estudiante($estudiante->id_estudiante, $estudiante->nombre_estudiante,$promedio_final); #adicionamos a la lista un nuevo objeto
            }

            //dd($promedios);

            usort($lista_estudiantes, function($a, $b) {
                return $b->getNota() - $a->getNota();
            });
        }

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
