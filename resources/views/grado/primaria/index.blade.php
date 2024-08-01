@extends('layout.layout')

@section('contenido')

<div class="container">
    <h3>Lista De Cursos</h3>
    <h3>Grado: {{$grado->nombre_grado}}</h3>
    <h3>Nivel: Primaria</h3>
    <br>

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

    <table class="table table-sm mb-3">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nombre del Curso</th>
                <th scope="col">Datos del Docente</th>

            </tr>
        </thead>
        <tbody style="font-size: 14x;"> <!-- Reducir tamaño de fuente -->
            @if (count($cursos) <= 0)
                <tr>
                    <td colspan="13">No hay registros</td>
                </tr>
            @else
                @foreach ($cursos as $curso)
                    <tr>
                        <td>{{ $curso->nombre_curso }}</td>
                        @foreach($personales as $personal)
                            @if ($personal->id_trabajador == $curso->id_trabajador)
                                <td>{{$personal->nombre_trabajador}} {{$personal->apellido_trabajador}}</td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>

@endsection

@section('script')
    <script>
        setTimeout(function() {
            document.querySelector('#mensaje').remove();
        }, 2000);
    </script>
@endsection
