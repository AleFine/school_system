<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PAGINATION = 5;

    public function index(Request $request)
    {
        $buscarpor = $request->get('buscarpor');
        $personales = Personal::with('departamento')
            ->where('nombre_trabajador', 'like', '%' . $buscarpor . '%')
            ->paginate($this::PAGINATION);

        return view('personal.index', compact('personales', 'buscarpor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('personal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre_trabajador' => 'required|max:255',
            'apellido_trabajador' => 'required|max:255',
            'DNI' => 'required|max:255',
            'direccion' => 'required|max:255',
            'fechaIngreso' => 'required|date',
            'fechaNacimiento' => 'required|date',
            'telefono' => 'required|max:255',
            'id_departamento' => 'required|exists:departamentos,id_departamento'
        ],
        [
            'nombre_trabajador.required' => 'Ingrese el nombre del trabajador',
            'apellido_trabajador.required' => 'Ingrese el apellido del trabajador',
            'DNI.required' => 'Ingrese el DNI del trabajador',
            'direccion.required' => 'Ingrese la dirección del trabajador',
            'fechaIngreso.required' => 'Ingrese la fecha de ingreso',
            'fechaNacimiento.required' => 'Ingrese la fecha de nacimiento',
            'telefono.required' => 'Ingrese el teléfono del trabajador',
            'id_departamento.required' => 'Seleccione un departamento',
            'id_departamento.exists' => 'El departamento seleccionado no es válido'
        ]);
        $personal = new Personal();
        $personal->fill($data);
        $personal->save();

        return redirect()->route('personal.index')->with('datos', 'Registro Nuevo Guardado...!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $personal=Personal::findOrFail($id);
        return view('personal.edit',compact('personal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'nombre_trabajador' => 'required|max:255',
            'apellido_trabajador' => 'required|max:255',
            'DNI' => 'required|max:255',
            'direccion' => 'required|max:255',
            'fechaIngreso' => 'required|date',
            'fechaNacimiento' => 'required|date',
            'telefono' => 'required|max:255',
            'id_departamento' => 'required|exists:departamentos,id_departamento',
        ],
        [
            'nombre_trabajador.required' => 'Ingrese el nombre del trabajador',
            'apellido_trabajador.required' => 'Ingrese el apellido del trabajador',
            'DNI.required' => 'Ingrese el DNI del trabajador',
            'direccion.required' => 'Ingrese la dirección del trabajador',
            'fechaIngreso.required' => 'Ingrese la fecha de ingreso',
            'fechaNacimiento.required' => 'Ingrese la fecha de nacimiento',
            'telefono.required' => 'Ingrese el teléfono del trabajador',
            'id_departamento.required' => 'Seleccione un departamento',
            'id_departamento.exists' => 'El departamento seleccionado no es válido',
        ]);

        $personal = Personal::findOrFail($id);

        $personal->fill($data);
        $personal->save();

        return redirect()->route('personal.index')->with('datos', 'Registro Actualizado...!');
    }

    public function confirmar($id){
        $personal=Personal::findOrFail($id);
        return view('personal.confirmar',compact('personal'));
    }

    public function destroy(string $id)
    {
        $personal = Personal::findOrFail($id);

        $personal->delete();

        return redirect()->route('personal.index')->with('datos', 'Registro Eliminado...!');
    }
}
