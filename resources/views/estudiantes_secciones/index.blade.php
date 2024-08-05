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
                            
                                <a title="Ver" href="{{ route('estudiantes_secciones.show', ['id_estudiante' => $estudiantesSeccion->estudiante->id_estudiante, 'id_seccion' => $estudiantesSeccion->seccion->id_seccion]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 24 24"><path fill="currentColor" d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5"/></svg>
                                </a>
                                <a title="Editar" style="margin-left: 5px" href="{{ route('estudiantes_secciones.edit', ['id_estudiante' => $estudiantesSeccion->estudiante->id_estudiante, 'id_seccion' => $estudiantesSeccion->seccion->id_seccion]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 24 24">
                                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                            <path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                                            <path d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z"/>
                                        </g>
                                    </svg>
                                </a>
                                <a title="Retirar" style="margin-left: 5px" href="{{ route('estudiantes_secciones.confirmar', ['id_estudiante' => $estudiantesSeccion->estudiante->id_estudiante, 'id_seccion' => $estudiantesSeccion->seccion->id_seccion]) }}">
                                    <svg width="40px" height="40px" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="m15.707 11.293l-4-4a1 1 0 0 0-1.414 1.414L12.586 11H4v2h8.586l-2.293 2.293a1 1 0 1 0 1.414 1.414l4-4a1 1 0 0 0 0-1.414"/><path fill="currentColor" d="M17 2H7a3.003 3.003 0 0 0-3 3v6h8.586l-2.293-2.293a1 1 0 0 1 1.414-1.414l4 4a1 1 0 0 1 0 1.414l-4 4a1 1 0 0 1-1.414-1.414L12.586 13H4v6a3.003 3.003 0 0 0 3 3h10a3.003 3.003 0 0 0 3-3V5a3.003 3.003 0 0 0-3-3" opacity="0.5"/></svg>
                                </a>
                            
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