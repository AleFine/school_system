<?php

namespace App\Http\Controllers;

use App\Models\Seccion;
use App\Models\Grado;
use App\Models\EstudianteSeccion;
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
            'nombre_seccion' => ['required', 'regex:/^[A-Z]$/'],
            'aforo' => 'required|integer',
            'id_grado' => 'required|exists:grados,id_grado',
        ]);

        Seccion::create($request->all());

        return redirect()->route('secciones.index')
                         ->with('success', 'Sección creada correctamente.');
    }

    public function show($id_seccion)
    {
        $seccion = Seccion::findOrFail($id_seccion);
        $estudiantesSeccion = EstudianteSeccion::where('id_seccion', $id_seccion)->get();
        return view('NGS.secciones.show', compact('seccion', 'estudiantesSeccion'));
    }

    public function edit($id_seccion)
    {
        $seccion = Seccion::findOrFail($id_seccion);
        $grados = Grado::all();
        return view('NGS.secciones.edit', compact('seccion', 'grados'));
    }

    public function update(Request $request, $id_seccion)
    {
        // Validar la solicitud
        $request->validate([
            'nombre_seccion' => ['required', 'regex:/^[A-Z]/'], // Regex ajustado para permitir una sola letra mayúscula
            'aforo' => 'required|integer',
            'id_grado' => 'required|exists:grados,id_grado', // Nombre del campo y clave foránea corregidos
        ]);

        // Buscar y actualizar la sección
        $seccion = Seccion::findOrFail($id_seccion);
        $seccion->nombre_seccion = $request->input('nombre_seccion');
        $seccion->aforo = $request->input('aforo');
        $seccion->id_grado = $request->input('id_grado');
        // Actualiza otros campos si es necesario
        $seccion->save();

        // Redirigir con un mensaje de éxito
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

    public function getSeccionesByGrado($id_grado)
    {
        $secciones = Seccion::where('id_grado', $id_grado)->get();
        return response()->json($secciones);
    }
}
