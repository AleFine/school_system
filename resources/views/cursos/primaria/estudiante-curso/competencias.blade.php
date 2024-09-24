@extends('layout.layout')

@section('contenido')

<div class="container">
    <div>
        <p class="text-center fs-2 p-2 my-2">Competencias del Curso</p>

        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('cursos-primaria.details', $curso->id_curso) }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <h3 class="card-title">Curso: {{ $curso->nombre_curso }}</h3>
                <p><strong>Nivel: </strong>{{ $curso->seccion->grado->nivel->nombre_nivel}}</p>
                <p><strong>Grado: </strong>{{ $curso->seccion->grado->nombre_grado}}</p>
                <p><strong>Sección: </strong>{{ $curso->seccion->nombre_seccion }}</p>
                <p><strong>Docente: </strong> {{ $curso->trabajador->nombre_trabajador }}, {{ $curso->trabajador->apellido_trabajador }}</p>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($competencias as $competencia)
                <tr>
                    <td>{{ $competencia->id_competencia }}</td>
                    <td>{{ $competencia->competencia->descripcion }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection