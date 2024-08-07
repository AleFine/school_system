<?php

namespace App\Http\Controllers;

use App\Models\Seccion;
use App\Models\Grado;
use Illuminate\Http\Request;

class SeccionController extends Controller
{
    public function index(Request $request)
    {
        $query = Seccion::query();

        if ($request->has('grado')) {
            $grado = $request->input('grado');
            $query->whereHas('grado', function($q) use ($grado) {
                $q->where('nombre_grado', 'like', '%' . $grado . '%');
            });
        }

        $secciones = $query->with('grado.nivel')->get(); // Incluir el nivel a través del grado
        return view('NGS.secciones.index', compact('secciones'));
    }

    public function create()
    {
        $grados = Grado::all();
        return view('NGS.secciones.create', compact('grados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'numero_aula' => 'required|integer',
            'aforo' => 'required|integer',
            'id_grado' => 'required|exists:grados,id_grado',
        ]);

        Seccion::create($request->all());

        return redirect()->route('secciones.index')
                         ->with('success', 'Sección creada correctamente.');
    }

    public function show($id_seccion)
    {
        $seccion = Seccion::with('grado.nivel')->findOrFail($id_seccion); // Incluir el nivel a través del grado
        return view('NGS.secciones.show', compact('seccion'));
    }

    public function edit($id_seccion)
    {
        $seccion = Seccion::findOrFail($id_seccion);
        $grados = Grado::all();
        return view('NGS.secciones.edit', compact('seccion', 'grados'));
    }

    public function update(Request $request, $id_seccion)
    {
        $request->validate([
            'numero_aula' => 'required|integer',
            'aforo' => 'required|integer',
            'id_grado' => 'required|exists:grados,id_grado',
        ]);

        $seccion = Seccion::findOrFail($id_seccion);
        $seccion->update($request->all());

        return redirect()->route('secciones.index')
                         ->with('success', 'Sección actualizada correctamente.');
    }

    public function destroy($id_seccion)
    {
        $seccion = Seccion::findOrFail($id_seccion);
        $seccion->delete();

        return redirect()->route('secciones.index')
                         ->with('success', 'Sección eliminada correctamente.');
    }
}
