@extends('layout.layout')

@section('contenido')
    <div class="container">
        <h1>Registro Nuevo de Personal</h1>
        <form method="POST" action="{{ route('personal.store') }}">
            @csrf
            <div class="form-group">
                <label for="nombre_trabajador">Nombre</label>
                <input type="text" class="form-control @error('nombre_trabajador') is-invalid @enderror" id="nombre_trabajador" name="nombre_trabajador">
                @error('nombre_trabajador')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="apellido_trabajador">Apellido</label>
                <input type="text" class="form-control @error('apellido_trabajador') is-invalid @enderror" id="apellido_trabajador" name="apellido_trabajador">
                @error('apellido_trabajador')
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
                <label for="direccion">Direccion</label>
                <input type="text" class="form-control @error('direccion') is-invalid @enderror" id="direccion" name="direccion">
                @error('direccion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="fechaIngreso">Fecha de Ingreso</label>
                <input type="date" class="form-control @error('fechaIngreso') is-invalid @enderror" id="fechaIngreso" name="fechaIngreso">
                @error('fechaIngreso')
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
                <label for="telefono">Telefono</label>
                <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono">
                @error('telefono')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="id_departamento">Codigo Departamento</label>
                <input type="text" class="form-control @error('id_departamento') is-invalid @enderror" id="id_departamento" name="id_departamento">
                @error('id_departamento')
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