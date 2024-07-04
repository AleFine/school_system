@extends('layout.layout')

@section('contenido')
    <div class="container">
        <h1>Registro Nuevo de Estudiante</h1>
        <form method="POST" action="{{ route('estudiantes.store') }}">
            @csrf
            <div class="form-group">
                <label for="nombre_estudiante">Nombre</label>
                <input type="text" class="form-control @error('nombre_estudiante') is-invalid @enderror" id="nombre_estudiante" name="nombre_estudiante">
                @error('nombre_estudiante')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="apellido_estudiante">Apellido</label>
                <input type="text" class="form-control @error('apellido_estudiante') is-invalid @enderror" id="apellido_estudiante" name="apellido_estudiante">
                @error('apellido_estudiante')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="fechaNacimiento">Fecha de Nacimiento</label>
                <input type="date" class="form-control @error('fechaNacimiento') is-invalid @enderror" id="fechaNacimiento" name="fechaNacimiento">
                @error('fechaNacimiento')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="DNI">DNI</label>
                <input type="text" class="form-control @error('DNI') is-invalid @enderror" id="DNI" name="DNI">
                @error('DNI')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="genero">Género</label>
                <input type="text" class="form-control @error('genero') is-invalid @enderror" id="genero" name="genero">
                @error('genero')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="pais">País</label>
                <input type="text" class="form-control @error('pais') is-invalid @enderror" id="pais" name="pais">
                @error('pais')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="region">Región</label>
                <input type="text" class="form-control @error('region') is-invalid @enderror" id="region" name="region">
                @error('region')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="ciudad">Ciudad</label>
                <input type="text" class="form-control @error('ciudad') is-invalid @enderror" id="ciudad" name="ciudad">
                @error('ciudad')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="distrito">Distrito</label>
                <input type="text" class="form-control @error('distrito') is-invalid @enderror" id="distrito" name="distrito">
                @error('distrito')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="estado_civil">Estado Civil</label>
                <input type="text" class="form-control @error('estado_civil') is-invalid @enderror" id="estado_civil" name="estado_civil">
                @error('estado_civil')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" style="margin-bottom: 5px">
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
