@extends('layout.layout')

@section('contenido')
    <div class="container">
        <h1>Editar Registro de Departamento</h1>
        <form method="POST" action="{{ route('departamento.update', $departamento->id_departamento) }}">
            @method('put')
            @csrf
            <div class="form-group my-3">
                <label for="">Código</label>
                <input type="text" class="form-control" id="id_departamento" name="id_departamento" value="{{ $departamento->id_departamento}}" disabled>
            </div>
            <div class="form-group my-3">
                <label for="">Nombre de Departamento</label>
                <input type="text" class="form-control @error('nombre_departamento') is-invalid @enderror" id="nombre_departamento" name="nombre_departamento"
                value="{{ $departamento->nombre_departamento }}">
                @error('nombre_departamento')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group my-3">
                <label for="">Descripcion</label>
                <input type="text" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" value="{{ $departamento->descripcion}}">
                @error('departamento')
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
