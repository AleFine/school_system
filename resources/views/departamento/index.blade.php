@extends('layout.layout')

@section('contenido')

<div class="container">
    <h3>LISTADO DE DEPARTAMENTOS</h3>
    <br>
    <a href="{{ route('departamento.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo Registro</a>
    <nav class="navbar navbar-light float-right">
        <form class="form-inline my-2 my-lg-0" method="GET">
            <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Buscar por nombre" aria-label="Search" value="{{ $buscarpor }}">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>
    </nav>

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

    <table class="table table-sm">
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
                            <a href="{{ route('departamento.edit', $departamento->id_departamento) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Editar</a>
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