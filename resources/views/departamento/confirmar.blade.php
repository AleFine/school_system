@extends('layout.layout')
@section('contenido')
    <div class="container">
        <h1>¿Desea eliminar el registro? Código: {{ $departamento->id_departamento}} -  Nombre de Departamento: {{ $departamento->nombre_departamento}}</h1>
        <form method="POST" action="{{ route('departamento.destroy', $departamento->id_departamento) }}">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger"><i class="fas fa-check-square"></i> SI</button>
            <a href="{{ route('departamento.index') }}" class="btn btn-primary"><i class="fas fa-times-circle"></i> NO</a>
        </form>
    </div>
@endsection
