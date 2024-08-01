@extends('layout.layout')

@section('contenido')

<div class="container">
    <p class="text-center fs-2 p-2 my-2">Añadir Estudiantes al Curso</p>
    
    <div class="mb-3">
        <a href="{{ route('cursos-secundaria.details', $curso->id_curso) }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Volver</a>
    </div>

    <h3>Curso: {{ $curso->nombre_curso }}</h3>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('cursos-secundaria.store-student', $curso->id_curso) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_estudiante">Selecciona el Estudiante:</label>
            <select name="id_estudiante" id="id_estudiante" class="form-control">
                @foreach($estudiantes as $estudiante)
                    <option value="{{ $estudiante->id_estudiante }}">{{ $estudiante->nombre_estudiante}} {{$estudiante->apellido_estudiante}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Añadir Estudiante</button>
    </form>
</div>

@endsection
