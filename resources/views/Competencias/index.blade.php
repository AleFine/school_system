@extends('layout.layout')

@section('contenido')

<div class="container">
    <p class="text-center fs-2 p-2 my-2"> LISTA DE COMPETENCIAS</p>
    
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('competencias.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Nueva Competencia</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr class="text-center">
                <th>ID</th>
                <th>Descripción</th>
                <th>Curso</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($competencias as $competencia)
                <tr class="text-center">
                    <td>{{ $competencia->id_competencia }}</td>
                    <td>{{ $competencia->descripcion }}</td>
                    <td>
                        @foreach($competencia->cursos as $curso)
                            {{ $curso->nombre_curso }}<br>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('competencias.edit', $competencia->id_competencia) }}" class="btn btn-sm btn-primary">Editar</a>
                        <a href="{{ route('competencias.confirmar', $competencia->id_competencia) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Eliminar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="d-flex justify-content-center mt-4">
        {{ $competencias->links() }}
    </div>
</div>

@endsection




