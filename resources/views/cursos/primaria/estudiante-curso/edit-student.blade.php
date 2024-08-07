@extends('layout.layout')

@section('contenido')

<div class="container">
    <p class="text-center fs-2 p-2 my-2">Editar Calificaciones del Estudiante</p>
    
    <div class="mb-3">
        <a href="{{ route('cursos-primaria.details', $nota->id_curso) }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Volver</a>
    </div>

    <form action="{{ route('cursos-primaria.update-student', ['curso' => $nota->id_curso, 'estudiante' => $nota->id_estudiante]) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="nombre_estudiante" class="form-label">Nombre del Estudiante</label>
            <input type="text" class="form-control" id="nombre_estudiante" value="{{ $nota->estudiante->nombre_estudiante }}  {{ $nota->estudiante->apellido_estudiante }}" disabled>
        </div>
        
        <div class="mb-3">
            <label for="notaUnidad1" class="form-label">Nota 1</label>
            <input type="number" class="form-control" id="notaUnidad1" name="notaUnidad1" value="{{ $nota->notaUnidad1 }}" required step="1">
        </div>

        <div class="mb-3">
            <label for="notaUnidad2" class="form-label">Nota 2</label>
            <input type="number" class="form-control" id="notaUnidad2" name="notaUnidad2" value="{{ $nota->notaUnidad2 }}" required step="1">
        </div>

        <div class="mb-3">
            <label for="notaUnidad3" class="form-label">Nota 3</label>
            <input type="number" class="form-control" id="notaUnidad3" name="notaUnidad3" value="{{ $nota->notaUnidad3 }}" required step="1">
        </div>

        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>

@endsection
