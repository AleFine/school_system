@extends('layout.layout')
@section('contenido')
    <div class="container">
        <form method="POST" action="{{ route('competencias.destroy', $competencia->id_competencia) }}">
            <h1>¿Desea eliminar la competencia? <br>
                 Código: {{ $competencia->id_competencia}} <br>
                 Descripcion: {{ $competencia->descripcion}}</h1>
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger"><i class="fas fa-check-square"></i> SI</button>
            <a href="{{ route('competencias.index') }}" class="btn btn-primary"><i class="fas fa-times-circle"></i> NO</a>
        </form>
    </div>
@endsection