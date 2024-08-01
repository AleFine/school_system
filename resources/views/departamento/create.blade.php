@extends('layout.layout')

@section('contenido')
    <div class="container">
        <h1>Registro de Nuevo Departamento</h1>
        <form method="POST" action="{{ route('departamento.store') }}">
            @csrf
            <div class="form-group mt-2 mb-2">
                <label for="nombre_departamento">Nombre de Departamento</label>
                <input type="text" class="form-control @error('nombre_departamento') is-invalid @enderror" id="nombre_departamento" name="nombre_departamento">
                @error('nombre_departamento')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mt-2 mb-2">
                <label for="descripcion">Descripcion</label>
                <input type="text" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion">
                @error('descripcion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Grabar</button>
            <a href="{{ route('departamento.index') }}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
        </form>
    </div>
@endsection
