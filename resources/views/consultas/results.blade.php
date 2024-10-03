@extends('layout.layout')

@section('contenido')
<div class="container">
    <h1>Resultados de Consulta</h1>

    <h3>Grado: {{ $grado->nombre_grado }}</h3>
    <h3>Sección: {{ $seccion->nombre_seccion }}</h3>

    <!-- Información de Aforo -->
    <div class="mt-4 mb-4">
        <h4>Capacidad de la Sección:</h4>
        <div class="alert {{ $numEstudiantesAsignados >= $aforo ? 'alert-danger' : 'alert-info' }}">
            <strong>Estudiantes Asignados: </strong> {{ $numEstudiantesAsignados }} / {{ $aforo }}
            @if ($numEstudiantesAsignados >= $aforo)
                <p class="mb-0"><strong>¡Advertencia!</strong> La sección ha alcanzado el aforo máximo.</p>
            @elseif ($aforo - $numEstudiantesAsignados <= 5)
                <p class="mb-0"><strong>¡Atención!</strong> Solo quedan {{ $aforo - $numEstudiantesAsignados }} espacios disponibles.</p>
            @else
                <p class="mb-0">Aún hay espacio disponible en esta sección.</p>
            @endif
        </div>
    </div>

    <!-- Tabla de Cursos -->
    <div class="table-responsive mb-4">
        <h4>Cursos:</h4>
        @if($cursos && $cursos->count() > 0)
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre del Curso</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cursos as $curso)
                        <tr>
                            <td>{{ $curso->id_curso }}</td>
                            <td>{{ $curso->nombre_curso }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No hay cursos disponibles.</p>
        @endif
    </div>

    <!-- Tabla de Estudiantes -->
    <div class="table-responsive">
        <h4>Estudiantes:</h4>
        @if($estudiantes && $estudiantes->count() > 0)
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>DNI</th>
                        <th>Nombre del Estudiante</th>
                        <th>Apellido del Estudiante</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($estudiantes as $estudiante)
                        <tr>
                            <td>{{ $estudiante->estudiante->DNI }}</td>
                            <td>{{ $estudiante->estudiante->nombre_estudiante }}</td>
                            <td>{{ $estudiante->estudiante->apellido_estudiante }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No hay estudiantes matriculados.</p>
        @endif
    </div>
</div>
@endsection

@section('styles')
<style>
    /* Custom styles for tables */
    .table-responsive {
        overflow-x: auto;
    }

    .table th, .table td {
        text-align: center;
    }

    /* Ensure that the tables take full width of their container */
    .table {
        width: 100%;
        margin-bottom: 1rem;
        background-color: transparent;
    }

    /* Style for small screens */
    @media (max-width: 767.98px) {
        .table-responsive {
            overflow-x: scroll;
        }
    }
</style>
@endsection
