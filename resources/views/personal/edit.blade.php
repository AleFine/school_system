@extends('layout.layout')

@section('contenido')
    <div class="container">
        <h1>Editar Registro de Personal</h1>
        <form method="POST" action="{{ route('personal.update', $personal->id_trabajador) }}">
            @method('put')
            @csrf
            <div class="form-group mt-3 mb-3">
                <label for="">Nombre</label>
                <input type="text" class="form-control @error('nombre_trabajador') is-invalid @enderror" id="nombre_trabajador" name="nombre_trabajador" value="{{ $personal->nombre_trabajador }}">
                @error('nombre_trabajador')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mt-3 mb-3">
                <label for="">Apellido</label>
                <input type="text" class="form-control @error('apellido_trabajador') is-invalid @enderror" id="apellido_trabajador" name="apellido_trabajador" value="{{ $personal->apellido_trabajador }}">
                @error('apellido_trabajador')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mt-3 mb-3">
                <label for="">DNI</label>
                <input type="text" class="form-control @error('DNI') is-invalid @enderror" id="DNI" name="DNI" value="{{ $personal->DNI }}">
                @error('DNI')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mt-3 mb-3">
                <label for="">Direccion</label>
                <input type="text" class="form-control @error('direccion') is-invalid @enderror" id="direccion" name="direccion" value="{{ $personal->direccion }}">
                @error('direccion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mt-3 mb-3">
                <label for="">Fecha de Ingreso</label>
                <input type="date" class="form-control @error('fechaIngreso') is-invalid @enderror" id="fechaIngreso" name="fechaIngreso" value="{{ $personal->fechaIngreso }}">
                @error('fechaIngreso')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mt-3 mb-3">
                <label for="">Fecha de Nacimiento</label>
                <input type="date" class="form-control @error('fechaNacimiento') is-invalid @enderror" id="fechaNacimiento" name="fechaNacimiento" value="{{ $personal->fechaNacimiento }}">
                @error('fechaNacimiento')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mt-3 mb-3">
                <label for="">Teléfono</label>
                <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" value="{{ $personal->telefono }}">
                @error('telefono')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Grabar</button>
            <a href="{{ route('personal.index') }}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
        </form>
    </div>
@endsection
