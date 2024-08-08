@extends('layout.layout')

@section('contenido')
    <div class="container">
        <h1 class="my-4">Detalles de la Asignación de Estudiante a Sección</h1>
        <a href="{{ route('estudiantes_secciones.index') }}" class="btn btn-secondary mb-3">Regresar</a>
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Estudiante: {{ $estudiantesSeccion->estudiante->nombre_estudiante }}</h5>
                <p class="card-text"><strong>ID Estudiante:</strong> {{ $estudiantesSeccion->id_estudiante }}</p>
                <h5 class="card-title mt-4">Sección: {{ $estudiantesSeccion->seccion->nombre_seccion }}</h5>
                <p class="card-text"><strong>ID Sección:</strong> {{ $estudiantesSeccion->id_seccion }}</p>
                <p class="card-text"><strong>Aforo:</strong> {{ $estudiantesSeccion->seccion->aforo }}</p>
                <p class="card-text"><strong>Grado:</strong> {{ $estudiantesSeccion->seccion->grado->nombre_grado }}</p>
                <p class="card-text"><strong>Nivel:</strong> {{ $estudiantesSeccion->seccion->grado->nivel->nombre_nivel }}</p>
                <p class="card-text"><strong>Turno:</strong> {{ $estudiantesSeccion->seccion->grado->nivel->turno }}</p>
                <div class="mt-4">
                    <a href="{{ route('estudiantes_secciones.edit', ['id_estudiante' => $estudiantesSeccion->id_estudiante, 'id_seccion' => $estudiantesSeccion->id_seccion]) }}" class="btn btn-warning">Editar</a>
                    <a href="{{ route('estudiantes_secciones.confirmar', ['id_estudiante' => $estudiantesSeccion->id_estudiante, 'id_seccion' => $estudiantesSeccion->id_seccion]) }}" class="btn btn-danger">Eliminar</a>
                </div>
                
            </div>
        </div>
    </div>
@endsection
