@extends('layout.layout')

@section('contenido')
    <div class="container">
        <h1>Editar Sección</h1>
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
        <form action="{{ route('secciones.update', $seccion->id_seccion) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre_seccion">Sección</label>
                <input type="text" name="nombre_seccion" class="form-control" value="{{ $seccion->nombre_seccion }}" required>
            </div>
            <div class="form-group">
                <label for="aforo">Aforo</label>
                <input type="number" name="aforo" class="form-control" value="{{ $seccion->aforo }}" required>
            </div>
            <div class="form-group">
                <label for="grado_id">Grado</label>
                <select name="grado_id" class="form-control" required>
                    @foreach ($grados as $grado)
                        <option value="{{ $grado->id }}" {{ $seccion->grado_id == $grado->id ? 'selected' : '' }}>
                            {{ $grado->nombre_grado }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Actualizar Sección</button>
        </form>
    </div>
@endsection
