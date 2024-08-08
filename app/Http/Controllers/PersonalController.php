<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal;
use App\Models\Departamento;

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
        $departamentos = Departamento::all();

        return view('personal.create',compact('departamentos'));
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
            'departamento' => 'required|exists:departamentos,id_departamento'
        ],
        [
            'nombre_trabajador.required' => 'Ingrese el nombre del trabajador',
            'apellido_trabajador.required' => 'Ingrese el apellido del trabajador',
            'DNI.required' => 'Ingrese el DNI del trabajador',
            'direccion.required' => 'Ingrese la dirección del trabajador',
            'fechaIngreso.required' => 'Ingrese la fecha de ingreso',
            'fechaNacimiento.required' => 'Ingrese la fecha de nacimiento',
            'telefono.required' => 'Ingrese el teléfono del trabajador',
            'departamento.required' => 'Seleccione un departamento',
            'departamento.exists' => 'El departamento seleccionado no es válido'
        ]);
        $personal = new Personal();
        $personal->nombre_trabajador = $request->nombre_trabajador;
        $personal->apellido_trabajador = $request->apellido_trabajador;
        $personal->DNI = $request->DNI;
        $personal->direccion = $request->direccion;
        $personal->fechaIngreso = $request->fechaIngreso;
        $personal->fechaNacimiento = $request->fechaNacimiento;
        $personal->telefono = $request->telefono;
        $personal->id_departamento = $request->departamento; // Asegúrate de que este campo exista y se llame así en la base de datos

        $personal->save();

        return redirect()->route('personal.index')->with('datos', 'Personal nuevo creado correctamente');
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
        dd($personal);
        $personal->save();

        return redirect()->route('personal.index')->with('datos', 'Personal actualizado correctamente');
    }

    public function confirmar($id){
        $personal=Personal::findOrFail($id);
        return view('personal.confirmar',compact('personal'));
    }

    public function destroy(string $id)
    {
        $personal = Personal::findOrFail($id);

        $personal->delete();

        return redirect()->route('personal.index')->with('datos', 'Personal eliminado correctamente');
    }
}
