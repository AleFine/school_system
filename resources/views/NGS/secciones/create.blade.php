@extends('layout.layout')

@section('contenido')
    <div class="container">
        <h1>Crear Sección</h1>
        <a href="{{ route('secciones.index') }}" class="btn btn-secondary mb-3">Regresar</a>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('secciones.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="numero_aula">Número de Aula</label>
                <input type="text" name="numero_aula" class="form-control" value="{{ old('numero_aula') }}" required>
            </div>
            <div class="form-group">
                <label for="aforo">Aforo</label>
                <input type="number" name="aforo" class="form-control" value="{{ old('aforo') }}" required>
            </div>
            <div class="form-group">
                <label for="id_grado">Grado</label>
                <select name="id_grado" class="form-control" required>
                    <option value="">Seleccione un grado</option>
                    @foreach ($grados as $grado)
                        <option value="{{ $grado->id_grado }}">{{ $grado->nombre_grado }} - {{ $grado->nivel->nombre_nivel }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Crear Sección</button>
        </form>
    </div>
@endsection
