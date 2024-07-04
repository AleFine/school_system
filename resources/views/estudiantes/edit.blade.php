@extends('layout.layout')

@section('contenido')
    <div class="container">
        <h1>Editar Registro de Estudiante</h1>
        <form method="POST" action="{{ route('estudiantes.update', $estudiante->id_estudiante) }}">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="">Código</label>
                <input type="text" class="form-control" id="id_estudiante" name="id_estudiante" value="{{ $estudiante->id_estudiante }}" disabled>
            </div>
            <div class="form-group">
                <label for="">Nombre</label>
                <input type="text" class="form-control @error('nombre_estudiante') is-invalid @enderror" id="nombre_estudiante" name="nombre_estudiante" value="{{ $estudiante->nombre_estudiante }}">
                @error('nombre_estudiante')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Apellido</label>
                <input type="text" class="form-control @error('apellido_estudiante') is-invalid @enderror" id="apellido_estudiante" name="apellido_estudiante" value="{{ $estudiante->apellido_estudiante }}">
                @error('apellido_estudiante')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Fecha de Nacimiento</label>
                <input type="date" class="form-control @error('fechaNacimiento') is-invalid @enderror" id="fechaNacimiento" name="fechaNacimiento" value="{{ $estudiante->fechaNacimiento }}">
                @error('fechaNacimiento')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">DNI</label>
                <input type="text" class="form-control @error('DNI') is-invalid @enderror" id="DNI" name="DNI" value="{{ $estudiante->DNI }}">
                @error('DNI')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Género</label>
                <input type="text" class="form-control @error('genero') is-invalid @enderror" id="genero" name="genero" value="{{ $estudiante->genero }}">
                @error('genero')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">País</label>
                <input type="text" class="form-control @error('pais') is-invalid @enderror" id="pais" name="pais" value="{{ $estudiante->pais }}">
                @error('pais')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Región</label>
                <input type="text" class="form-control @error('region') is-invalid @enderror" id="region" name="region" value="{{ $estudiante->region }}">
                @error('region')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Ciudad</label>
                <input type="text" class="form-control @error('ciudad') is-invalid @enderror" id="ciudad" name="ciudad" value="{{ $estudiante->ciudad }}">
                @error('ciudad')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Distrito</label>
                <input type="text" class="form-control @error('distrito') is-invalid @enderror" id="distrito" name="distrito" value="{{ $estudiante->distrito }}">
                @error('distrito')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Estado Civil</label>
                <input type="text" class="form-control @error('estado_civil') is-invalid @enderror" id="estado_civil" name="estado_civil" value="{{ $estudiante->estado_civil }}">
                @error('estado_civil')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Teléfono</label>
                <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" value="{{ $estudiante->telefono }}">
                @error('telefono')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Grabar</button>
            <a href="{{ route('estudiantes.index') }}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
        </form>
    </div>
@endsection
