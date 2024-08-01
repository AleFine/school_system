@extends('layout.layout')

@section('contenido')
<div class="container">
    <h1 class="my-4">Lista de Estudiantes en Secciones</h1>
    <a href="{{ route('estudiantes_secciones.create') }}" class="btn btn-primary mb-3">Asignar Estudiante a Sección</a>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('datos'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session('datos') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table">
                <tr>
                    <th>Estudiante</th>
                    <th>Sección</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($estudiantesSecciones as $estudiantesSeccion)
                    <tr>
                        <td>{{ $estudiantesSeccion->estudiante->nombre_estudiante }}</td>
                        <td>{{ $estudiantesSeccion->seccion->numero_aula }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('estudiantes_secciones.show', ['id_estudiante' => $estudiantesSeccion->estudiante->id_estudiante, 'id_seccion' => $estudiantesSeccion->seccion->id_seccion]) }}" class="btn btn-info btn-sm">Ver</a>
                                <a href="{{ route('estudiantes_secciones.edit', ['id_estudiante' => $estudiantesSeccion->estudiante->id_estudiante, 'id_seccion' => $estudiantesSeccion->seccion->id_seccion]) }}" class="btn btn-warning btn-sm">Editar</a>
                                <a href="{{ route('estudiantes_secciones.confirmar', ['id_estudiante' => $estudiantesSeccion->estudiante->id_estudiante, 'id_seccion' => $estudiantesSeccion->seccion->id_seccion]) }}" class="btn btn-danger btn-sm">Retirar</a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No hay asignaciones de estudiantes a secciones.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection