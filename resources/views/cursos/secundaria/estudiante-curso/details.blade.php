@extends('layout.layout')

@section('contenido')

<div class="container">
    <p class="text-center fs-2 p-2 my-2">Detalles del Curso</p>
    
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('cursos-secundaria.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Volver
        </a>

        <a href="{{ route('cursos.competencias2', $curso->id_curso) }}" class="btn btn-primary me-2">
            <i class="fas fa-list"></i> Ver competencias
        </a>

        <a href="{{ route('cursos-secundaria.reporte-notas', $curso->id_curso) }}" class="btn btn-warning">
            <i class="fas fa-file-pdf"></i> Generar Reporte de Notas
        </a>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title">Curso: {{ $curso->nombre_curso }}</h3>
            <p><strong>Nivel: </strong>{{ $curso->seccion->grado->nivel->nombre_nivel }}</p>
            <p><strong>Grado:</strong> {{ $curso->seccion->grado->nombre_grado }}</p>
            <p><strong>Seccion:</strong> {{ $curso->seccion->nombre_seccion }}</p>
            <p><strong>Docente:</strong> {{ $curso->trabajador->nombre_trabajador }}, {{ $curso->trabajador->apellido_trabajador }}</p>
            <p><strong>Departamento: </strong> {{ $curso->trabajador->departamento->nombre_departamento}}</p>
        </div>
    </div>

    <h4 class="mb-3">Estudiantes Inscritos:</h4>
    <div class="table-responsive">
        @if ($notas->isEmpty())
            <p>No hay estudiantes registrados.</p>
        @else
        <table class="table table-striped table-hover text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Estudiante</th>
                    <th>U1</th>
                    <th>U2</th>
                    <th>U3</th>
                    <th>Promedio</th>
                    <th>Estado</th>
                    <th>Calificar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($notas as $nota)
                    <tr class="text-center">
                        <td>{{ $nota->estudiante->id_estudiante }}</td>
                        <td>{{ $nota->estudiante->nombre_estudiante }} {{ $nota->estudiante->apellido_estudiante }}</td>
                        <td>{{ $nota->notaUnidad1 }}</td>
                        <td>{{ $nota->notaUnidad2 }}</td>
                        <td>{{ $nota->notaUnidad3 }}</td>

                        @php
                            $totalNotas = $nota->notaUnidad1 + $nota->notaUnidad2 + $nota->notaUnidad3;
                            $promedio = $totalNotas > 0 ? ($totalNotas / 3) : 0;
                            $estado = $promedio >= 11 ? 'APROBADO' : 'DESAPROBADO';
                            $estadoClase = $promedio >= 11 ? 'text-success' : 'text-danger';
                        @endphp

                        <td>{{ number_format($promedio, 2) }}</td> <!-- Formatea el promedio a 2 decimales -->
                        <td class="{{ $estadoClase }}">{{ $estado }}</td> <!-- Muestra el estado de aprobación con color -->
                        <td>
                            <a href="{{ route('cursos-secundaria.edit-student', ['curso' => $nota->id_curso, 'estudiante' => $nota->id_estudiante]) }}" class="btn btn-sm btn-outline-primary">
                                Calificar
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

                   
        @endif
        
    </div>
</div>

@endsection

