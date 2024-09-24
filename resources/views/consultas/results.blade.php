@extends('layout.layout')

@section('contenido')
<div class="container">
    <h1>Resultados de Consulta</h1>

    <h3>Grado: {{ $grado->nombre_grado }}</h3>
    <h3>Sección: {{ $seccion->nombre_seccion }}</h3>

    <!-- Cursos Table -->
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
                            <th>{{ $curso->id_curso }}</th>
                            <td>{{ $curso->nombre_curso }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No hay cursos disponibles.</p>
        @endif
    </div>

    <!-- Estudiantes Table -->
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
                            <th>{{ $estudiante->estudiante->DNI }}</th>
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
