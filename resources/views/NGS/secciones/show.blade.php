@extends('layout.layout')

@section('contenido')
    <div class="container">
        <h1>Detalles de la Sección</h1>
        <a href="{{ route('secciones.index') }}" class="btn btn-secondary mb-3">Regresar</a>
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">ID: {{ $seccion->id_seccion }}</h5>
                <p class="card-text"><strong>Número de Aula:</strong> {{ $seccion->numero_aula }}</p>
                <p class="card-text"><strong>Aforo:</strong> {{ $seccion->aforo }}</p>
                <p class="card-text"><strong>Grado:</strong> {{ $seccion->grado->nombre_grado }}</p>
                <a href="{{ route('secciones.edit', $seccion->id_seccion) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('secciones.destroy', $seccion->id_seccion) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
