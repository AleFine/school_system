@extends('layout.layout')

@section('contenido')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card border-0 shadow">
        <div class="card-body">
            <h1>Editar Registro de Estudiante</h1>
            <form method="POST" action="{{ route('estudiantes.update', $estudiante->id_estudiante) }}">
                @method('put')
                @csrf

                <div class="form-group">
                    <label for="id_estudiante">Código</label>
                    <input type="text" class="form-control" id="id_estudiante" name="id_estudiante" value="{{ $estudiante->id_estudiante }}" disabled>
                </div>

                <div class="form-group">
                    <label for="nombre_estudiante">Nombre</label>
                    <input type="text" class="form-control @error('nombre_estudiante') is-invalid @enderror" id="nombre_estudiante" name="nombre_estudiante" value="{{ old('nombre_estudiante', $estudiante->nombre_estudiante) }}">
                    @error('nombre_estudiante')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="apellido_estudiante">Apellido</label>
                    <input type="text" class="form-control @error('apellido_estudiante') is-invalid @enderror" id="apellido_estudiante" name="apellido_estudiante" value="{{ old('apellido_estudiante', $estudiante->apellido_estudiante) }}">
                    @error('apellido_estudiante')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="fechaNacimiento">Fecha de Nacimiento</label>
                    <input type="date" class="form-control @error('fechaNacimiento') is-invalid @enderror" id="fechaNacimiento" name="fechaNacimiento" value="{{ old('fechaNacimiento', $estudiante->fechaNacimiento) }}">
                    @error('fechaNacimiento')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="DNI">DNI</label>
                    <input type="text" class="form-control @error('DNI') is-invalid @enderror" id="DNI" name="DNI" value="{{ old('DNI', $estudiante->DNI) }}">
                    @error('DNI')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="genero">Género</label>
                    <input type="text" class="form-control @error('genero') is-invalid @enderror" id="genero" name="genero" value="{{ old('genero', $estudiante->genero) }}">
                    @error('genero')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="pais">País</label>
                    <input type="text" class="form-control @error('pais') is-invalid @enderror" id="pais" name="pais" value="{{ old('pais', $estudiante->pais) }}">
                    @error('pais')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="region">Región</label>
                    <input type="text" class="form-control @error('region') is-invalid @enderror" id="region" name="region" value="{{ old('region', $estudiante->region) }}">
                    @error('region')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="ciudad">Ciudad</label>
                    <input type="text" class="form-control @error('ciudad') is-invalid @enderror" id="ciudad" name="ciudad" value="{{ old('ciudad', $estudiante->ciudad) }}">
                    @error('ciudad')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="distrito">Distrito</label>
                    <input type="text" class="form-control @error('distrito') is-invalid @enderror" id="distrito" name="distrito" value="{{ old('distrito', $estudiante->distrito) }}">
                    @error('distrito')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="estado_civil">Estado Civil</label>
                    <input type="text" class="form-control @error('estado_civil') is-invalid @enderror" id="estado_civil" name="estado_civil" value="{{ old('estado_civil', $estudiante->estado_civil) }}">
                    @error('estado_civil')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" value="{{ old('telefono', $estudiante->telefono) }}">
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
    </div>
</div>
@endsection
