@extends('layout.layout')

@section('contenido')

<div class="container">
    <p class="text-center fs-2 p-2 my-2">Añadir Estudiantes al Curso</p>
    
    <div class="mb-3">
        <a href="{{ route('cursos-primaria.details', $curso->id_curso) }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Volver</a>
    </div>

    <h3>Curso: {{ $curso->nombre_curso }}</h3>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('cursos-primaria.add-students', $curso->id_curso) }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="query" class="form-control" placeholder="Buscar estudiante" value="{{ request('query') }}">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($estudiantes as $estudiante)
                <tr>
                    <td>{{ $estudiante->nombre_estudiante }}</td>
                    <td>{{ $estudiante->apellido_estudiante }}</td>
                    <td>
                        @if(in_array($estudiante->id_estudiante, $añadidos))
                            <button class="btn btn-danger" >Eliminar Alumno</button>
                        @else
                            <form action="{{ route('cursos-primaria.store-student', $curso->id_curso) }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_estudiante" value="{{ $estudiante->id_estudiante }}">
                                <button type="submit" class="btn btn-success">Agregar Alumno</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $estudiantes->appends(['query' => request('query')])->links() }}
</div>

@endsection
