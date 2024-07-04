@extends('layout.layout')

@section('contenido')

<div class="container">
    <h3>LISTADO DE PERSONAL</h3>
    <br>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('estudiantes.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>+ Nuevo Registro</a>
        <div class="d-flex align-items-center">
            <input name="buscarpor" class="form-control mr-2" type="search" placeholder="Buscar por nombre" aria-label="Search" value="{{ $buscarpor }}">
            <button class="btn btn-success" type="submit" style="margin-left: 5px">Buscar</button>
        </div>
    </div>

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
                <th scope="col">DNI</th>
                <th scope="col">Direccion</th>
                <th scope="col">Fecha de Ingreso</th>
                <th scope="col">Fecha de Nacimiento</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Departamento</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody style="font-size: 14x;"> <!-- Reducir tamaño de fuente -->
            @if (count($personales) <= 0)
                <tr>
                    <td colspan="13">No hay registros</td>
                </tr>
            @else
                @foreach ($personales as $personal)
                    <tr>
                        <td>{{ $personal->id_trabajador }}</td>
                        <td>{{ $personal->nombre_trabajador }}</td>
                        <td>{{ $personal->apellido_trabajador }}</td>
                        <td>{{ $personal->DNI }}</td>
                        <td>{{ $personal->genero }}</td>
                        <td>{{ $personal->fechaIngreso}}</td>
                        <td>{{ $personal->fechaNacimiento }}</td>
                        <td>{{ $personal->telefono }}</td>
                        <td>{{ $personal->id_departamento }}</td>
                        <td>
                            <a href="{{ route('personal.edit', $personal->id_trabajador) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Editar</a>
                            <a href="{{ route('personal.confirmar', $personal->id_trabajador) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Eliminar</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{ $personales->links() }}
</div>

@endsection

@section('script')
    <script>
        setTimeout(function() {
            document.querySelector('#mensaje').remove();
        }, 2000);
    </script>
@endsection
