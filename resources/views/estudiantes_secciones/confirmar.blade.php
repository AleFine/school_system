@extends('layout.layout')

@section('contenido')
    <div class="container">
        <h1 class="my-4">Confirmar Eliminación</h1>
        <p>¿Está seguro de que desea eliminar la asignación del estudiante <strong>{{ $estudiantesSeccion->estudiante->nombre_estudiante }}</strong> a la sección <strong>{{ $estudiantesSeccion->seccion->numero_aula }}</strong>?</p>
        <form action="{{ route('estudiantes_secciones.destroy', ['id_estudiante' => $estudiantesSeccion->id_estudiante, 'id_seccion' => $estudiantesSeccion->id_seccion]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar</button>
            <a href="{{ route('estudiantes_secciones.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
