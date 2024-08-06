@extends('layout.layout')

@section('contenido')

<div class="container">
    <h3>LISTADO DE DEPARTAMENTOS</h3>
    <br>

    <form action="{{ route('departamento.index') }}" method="GET" class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('departamento.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>+ Nuevo Registro</a>
        <div class="d-flex align-items-center">
            <input name="buscarpor" class="form-control mr-2 mx-3" type="search" placeholder="Buscar por nombre" aria-label="Search" value="{{ $buscarpor }}">
            <button class="btn btn-success" type="submit">Buscar</button>
        </div>
    </form>

    <div id="mensaje">
        @if (session('datos'))
            <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                {{ session('datos') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>

    <table class="table table-sm my-3">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody style="font-size: 14x;"> <!-- Reducir tamaño de fuente -->
            @if (count($departamentos) <= 0)
                <tr>
                    <td colspan="13">No hay registros</td>
                </tr>
            @else
                @foreach ($departamentos as $departamento)
                    <tr>
                        <td>{{ $departamento->id_departamento }}</td>
                        <td>{{ $departamento->nombre_departamento }}</td>
                        <td>{{ $departamento->descripcion}}</td>
                        <td>
                            <a href="{{ route('departamento.edit', $departamento->id_departamento) }}" class="btn btn-info btn-sm me-3"><i class="fas fa-edit"></i> Editar</a>
                            <a href="{{ route('departamento.confirmar', $departamento->id_departamento) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Eliminar</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{ $departamentos->links() }}
</div>

@endsection

@section('script')
    <script>
        setTimeout(function() {
            document.querySelector('#mensaje').remove();
        }, 2000);
    </script>
@endsection
