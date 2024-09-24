<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Pais;
use App\Models\Region;
use App\Models\Ciudad;
use App\Models\Distrito;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    const PAGINATION = 10;

    public function edit($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        return view('estudiantes.edit', compact('estudiante'));
    }

    public function update(Request $request, $id)
    {
        $data = request()->validate(
            [
                'nombre_estudiante' => 'required|max:30',
                'apellido_estudiante' => 'required|max:30',
                'fechaNacimiento' => 'required|date',
                'DNI' => 'required|max:15',
                'genero' => 'required|max:10',
                'pais' => 'required|max:50',
                'region' => 'required|max:50',
                'ciudad' => 'required|max:50',
                'distrito' => 'required|max:50',
                'estado_civil' => 'required|max:15',
                'telefono' => 'required|max:15'
            ],
            [
                'nombre_estudiante.required' => 'Ingrese nombre del estudiante',
                'apellido_estudiante.required' => 'Ingrese apellido del estudiante',
                'fechaNacimiento.required' => 'Ingrese fecha de nacimiento',
                'DNI.required' => 'Ingrese DNI',
                'genero.required' => 'Ingrese género',
                'pais.required' => 'Ingrese país',
                'region.required' => 'Ingrese región',
                'ciudad.required' => 'Ingrese ciudad',
                'distrito.required' => 'Ingrese distrito',
                'estado_civil.required' => 'Ingrese estado civil',
                'telefono.required' => 'Ingrese teléfono',
                'nombre_estudiante.max' => 'Máximo 30 caracteres para el nombre',
                'apellido_estudiante.max' => 'Máximo 30 caracteres para el apellido',
                'fechaNacimiento.date' => 'Ingrese una fecha válida',
                'DNI.max' => 'Máximo 15 caracteres para el DNI',
                'genero.max' => 'Máximo 10 caracteres para el género',
                'pais.max' => 'Máximo 50 caracteres para el país',
                'region.max' => 'Máximo 50 caracteres para la región',
                'ciudad.max' => 'Máximo 50 caracteres para la ciudad',
                'distrito.max' => 'Máximo 50 caracteres para el distrito',
                'estado_civil.max' => 'Máximo 15 caracteres para el estado civil',
                'telefono.max' => 'Máximo 15 caracteres para el teléfono'
            ]
        );

        $estudiante = Estudiante::findOrFail($id);
        $estudiante->update($data);
        return redirect()->route('estudiantes.index')->with('datos', 'Registro Actualizado...!');
    }

    public function index(Request $request)
    {
        $buscarpor = $request->get('buscarpor');
        $estudiantes = Estudiante::where(function($query) use ($buscarpor) {
            $query->where('nombre_estudiante', 'like', $buscarpor . '%');
        })
        ->paginate($this::PAGINATION);
        
        return view('estudiantes.index', compact('estudiantes', 'buscarpor'));
    }

    public function create()
    {
        $paises = Pais::all();
        return view('estudiantes.create',compact('paises'));
    }

    public function store(Request $request)
    {
        $data = request()->validate(
            [
                'nombre_estudiante' => 'required|max:30',
                'apellido_estudiante' => 'required|max:30',
                'fechaNacimiento' => 'required|date',
                'DNI' => 'required|max:15',
                'genero' => 'required|max:10',
                'pais' => 'required|max:50',
                'region' => 'required|max:50',
                'ciudad' => 'required|max:50',
                'distrito' => 'required|max:50',
                'estado_civil' => 'required|max:15',
                'telefono' => ['required', 'regex:/^9\d{8}$/'],
            ],
            [
                'nombre_estudiante.required' => 'Ingrese nombre del estudiante',
                'apellido_estudiante.required' => 'Ingrese apellido del estudiante',
                'fechaNacimiento.required' => 'Ingrese fecha de nacimiento',
                'DNI.required' => 'Ingrese DNI',
                'genero.required' => 'Ingrese género',
                'pais.required' => 'Ingrese país',
                'region.required' => 'Ingrese región',
                'ciudad.required' => 'Ingrese ciudad',
                'distrito.required' => 'Ingrese distrito',
                'estado_civil.required' => 'Ingrese estado civil',
                'telefono.required' => 'Ingrese teléfono',
                'nombre_estudiante.max' => 'Máximo 30 caracteres para el nombre',
                'apellido_estudiante.max' => 'Máximo 30 caracteres para el apellido',
                'fechaNacimiento.date' => 'Ingrese una fecha válida',
                'DNI.max' => 'Máximo 15 caracteres para el DNI',
                'genero.max' => 'Máximo 10 caracteres para el género',
                'pais.max' => 'Máximo 50 caracteres para el país',
                'region.max' => 'Máximo 50 caracteres para la región',
                'ciudad.max' => 'Máximo 50 caracteres para la ciudad',
                'distrito.max' => 'Máximo 50 caracteres para el distrito',
                'estado_civil.max' => 'Máximo 15 caracteres para el estado civil',
                'telefono.max' => 'Máximo 9 caracteres para el teléfono'
            ]
        );

        Estudiante::create($data);
        return redirect()->route('estudiantes.index')->with('datos', 'Registro Nuevo Guardado...!');
    }

    public function confirmar($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        return view('estudiantes.confirmar', compact('estudiante'));
    }

    public function destroy($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->delete();
        return redirect()->route('estudiantes.index')->with('datos', 'Registro Eliminado...!');
    }

    public function getRegiones(Request $request)
    {
        $regiones = Region::where('pais_id', $request->pais_id)->get();
        return response()->json($regiones);
    }

    public function getCiudades(Request $request)
    {
        $ciudades = Ciudad::where('region_id', $request->region_id)->get();
        return response()->json($ciudades);
    }

    public function getDistritos(Request $request)
    {
        $distritos = Distrito::where('ciudad_id', $request->ciudad_id)->get();
        return response()->json($distritos);
    }

}
