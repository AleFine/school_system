@extends('layout.layout')

@section('contenido')

<div class="container">
    <div class="d-flex justify-content-center">
        <peri class="fw-bold text-info">Tercio Superior</h2>
    </div>

    <div class="d-flex justify-content-between ">
        <h3 class="fw-bold text-info-emphasis">Grado: {{$grade->nombre_grado}}</h3>
        <h3 class="fw-bold text-warning">Nivel: Secundaria</h3>
    </div>

    <br>

    <table class="table table-sm mb-3">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Puesto</th>
                <th scope="col">Nombre de Estudiante</th>
                <th scope="col">Promedio General</th>
            </tr>
        </thead>
        <tbody style="font-size: 14x;"> <!-- Reducir tamaño de fuente -->
            @php
                $i = 1;
            @endphp
            @if (count($lista_estudiantes) <= 0)
                <tr>
                    <td colspan="13">Sin estudiantes de tercio superior</td>
                </tr>
            @else
                @foreach ($lista_estudiantes as $est)
                    <tr>
                        @if ($est->nota>=16)
                            <td>{{$i}}</td>
                            <td>{{$est->nombre}}</td>
                            <td>{{$est->nota}}</td>
                            @php
                                $i++;
                            @endphp
                        @endif
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
