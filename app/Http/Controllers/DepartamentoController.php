<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     const PAGINATION = 5; // PARA QUE PAGINEE DE 5 en 5


    public function index(Request $request)
    {
        $buscarpor = $request->get('buscarpor');
        $departamentos = Departamento::where('nombre_departamento', 'like', '%' . $buscarpor . '%')
            ->paginate($this::PAGINATION);
        return view('departamento.index',compact('departamentos','buscarpor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departamento.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre_departamento' => 'required|max:50',
            'descripcion' => 'required|max:255'
        ],
        [
            'nombre_departamento.required' => 'Ingrese el nombre del departamento',
            'nombre_departamento.max' => 'Máximo 50 caracteres para el nombre del departamento',
            'descripcion.required' => 'Ingrese la descripción del departamento',
            'descripcion.max' => 'Máximo 255 caracteres para la descripción'
        ]);

        $departamento = new Departamento();
        $departamento->fill($data);
        $departamento->save();

        return redirect()->route('departamento.index')->with('datos', 'Registro Nuevo Guardado...!');
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
        $departamento=Departamento::findOrFail($id);
        return view('departamento.edit',compact('departamento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $data = $request->validate([
            'nombre_departamento' => 'required|max:50',
            'descripcion' => 'required|max:255'
        ],
        [
            'nombre_departamento.required' => 'Ingrese el nombre del departamento',
            'nombre_departamento.max' => 'Máximo 50 caracteres para el nombre del departamento',
            'descripcion.required' => 'Ingrese la descripción del departamento',
            'descripcion.max' => 'Máximo 255 caracteres para la descripción'
        ]);

        $departamento = Departamento::findOrFail($id);

        $departamento->nombre_departamento = $request->nombre_departamento;
        $departamento->descripcion = $request->descripcion;
        $departamento->save();

        return redirect()->route('departamento.index')->with('datos', 'Registro Actualizado...!');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function confirmar($id){
        $departamento=Departamento::findOrFail($id);
        return view('departamento.confirmar',compact('departamento'));
    }


    public function destroy(string $id)
    {
        $departamento = Personal::findOrFail($id);

        $departamento->delete();

        return redirect()->route('departamento.index')->with('datos', 'Registro Eliminado...!');
    }
}
