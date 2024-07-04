@extends('layout.layout')
@section('contenido')
    <div class="container">
        <h1>¿Desea eliminar el registro? Código: {{ $personal->id_trabajador }} - Personal: {{ $personal->nombre_trabajador}} {{ $personal->apellido_trabajador}}</h1>
        <form method="POST" action="{{ route('personal.destroy', $personal->id_trabajador) }}">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger"><i class="fas fa-check-square"></i> SI</button>
            <a href="{{ route('personal.index') }}" class="btn btn-primary"><i class="fas fa-times-circle"></i> NO</a>
        </form>
    </div>
@endsection
