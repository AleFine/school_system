@extends('layout.layout')

@section('contenido')

<div class="container">
    <h3>LISTADO DE ESTUDIANTES</h3>
    <br>
    <a href="{{ route('estudiantes.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo Registro</a>
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
                <th scope="col">Apellido</th>
                <th scope="col">Fecha de Nacimiento</th>
                <th scope="col">DNI</th>
                <th scope="col">Género</th>
                <th scope="col">País</th>
                <th scope="col">Región</th>
                <th scope="col">Ciudad</th>
                <th scope="col">Distrito</th>
                <th scope="col">Estado Civil</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody style="font-size: 14px;"> <!-- Reducir tamaño de fuente -->
            @if (count($estudiantes) <= 0)
                <tr>
                    <td colspan="13">No hay registros</td>
                </tr>
            @else
                @foreach ($estudiantes as $estudiante)
                    <tr>
                        <td>{{ $estudiante->id_estudiante }}</td>
                        <td>{{ $estudiante->nombre_estudiante }}</td>
                        <td>{{ $estudiante->apellido_estudiante }}</td>
                        <td>{{ $estudiante->fechaNacimiento }}</td>
                        <td>{{ $estudiante->DNI }}</td>
                        <td>{{ $estudiante->genero }}</td>
                        <td>{{ $estudiante->pais }}</td>
                        <td>{{ $estudiante->region }}</td>
                        <td>{{ $estudiante->ciudad }}</td>
                        <td>{{ $estudiante->distrito }}</td>
                        <td>{{ $estudiante->estado_civil }}</td>
                        <td>{{ $estudiante->telefono }}</td>
                        <td>
                            <a href="{{ route('estudiantes.edit', $estudiante->id_estudiante) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Editar</a>
                            <a href="{{ route('estudiantes.confirmar', $estudiante->id_estudiante) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Eliminar</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{ $estudiantes->links() }}
</div>

@endsection

@section('script')
    <script>
        setTimeout(function() {
            document.querySelector('#mensaje').remove();
        }, 2000);
    </script>
@endsection
