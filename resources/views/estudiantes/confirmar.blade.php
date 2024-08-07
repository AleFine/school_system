@extends('layout.layout')
@section('contenido')
    <div class="container">
        <h1>¿Desea eliminar el registro? Código: {{ $estudiante->id_estudiante }} - Nombre: {{ $estudiante->nombre_estudiante }} {{ $estudiante->apellido_estudiante }}</h1>
        <form method="POST" action="{{ route('estudiantes.destroy', $estudiante->id_estudiante) }}">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger"><i class="fas fa-check-square"></i> SI</button>
            <a href="{{ route('estudiantes.index') }}" class="btn btn-primary"><i class="fas fa-times-circle"></i> NO</a>
        </form>
    </div>
@endsection
