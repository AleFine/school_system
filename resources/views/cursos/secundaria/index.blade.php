@extends('layout.layout')

@section('contenido')

<div class="container">
    <p class="text-center fs-2 p-2 my-2">CURSOS - NIVEL SECUNDARIA</p>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('cursos-secundaria.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo Curso</a>
        <form class="d-flex" method="GET">
            <input name="buscarpor" class="form-control mr-sm-2 mx-2" type="search" placeholder="Buscar" aria-label="Search" value="">
            <button class="btn btn-success" type="submit">Buscar</button>
        </form>
    </div>
    <table class="table">
        <thead>
            <tr class="text-center">
                <th>ID</th>
                <th>Nombre del Curso</th>
                <th>Grado</th>
                <th>Docente</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cursosSecundaria as $curso)
                <tr class="text-center">
                    <td>{{ $curso->id_curso }}</td>
                    <td>{{ $curso->nombre_curso }}</td>
                    <td>{{ $curso->grado->nombre_grado }}</td>
                    <td>{{ $curso->trabajador->nombre_trabajador }},  {{ $curso->trabajador->apellido_trabajador }}</td>
                    <td>
                        {{-- Aquí puedes colocar enlaces para editar, eliminar, etc. --}}
                        <a href="{{ route('cursos-secundaria.edit', $curso->id_curso) }}" class="btn btn-sm btn-primary">Editar</a>
                        <form action="{{ route('cursos-secundaria.destroy', $curso->id_curso) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                        <a href="{{ route('cursos-secundaria.details', $curso->id_curso) }}" class="btn btn-sm btn-info">Detalle</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-center mt-4">
    {{ $cursosSecundaria->links() }}
</div>

@endsection