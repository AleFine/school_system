@extends('layout.layout')

@section('contenido')
    <div class="container">
        <h1>Detalles de la Sección</h1>
        <a href="{{ route('secciones.index') }}" class="btn btn-secondary mb-3">Regresar</a>
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">ID: {{ $seccion->id_seccion }}</h5>
                <p class="card-text"><strong>Número de Aula:</strong> {{ $seccion->numero_aula }}</p>
                <p class="card-text"><strong>Aforo:</strong> {{ $seccion->aforo }}</p>
                <p class="card-text"><strong>Grado:</strong> {{ $seccion->grado->nombre_grado }}</p>
                <a href="{{ route('secciones.edit', $seccion->id_seccion) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('secciones.destroy', $seccion->id_seccion) }}" method="POST"
                    style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>

        <h2 class="mt-4">Estudiantes de la sección <strong>{{ $seccion->numero_aula }}</strong> </h2>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID Estudiante</th>
                    <th>Nombre Completo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($estudiantesSeccion as $es)
                    <tr>
                        <td>{{ $es->estudiante->id_estudiante }}</td>
                        <td>{{ $es->estudiante->nombre_estudiante }} {{ $es->estudiante->apellido_estudiante }}</td>
                        <td>
                            <a href="{{ route('estudiantes_secciones.edit', ['id_estudiante' => $es->id_estudiante, 'id_seccion' => $es->id_seccion]) }}"
                                class="btn btn-warning">Editar Sección</a>
                            <form
                                action="{{ route('estudiantes_secciones.destroy', ['id_estudiante' => $es->id_estudiante, 'id_seccion' => $es->id_seccion]) }}"
                                method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Retirar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
