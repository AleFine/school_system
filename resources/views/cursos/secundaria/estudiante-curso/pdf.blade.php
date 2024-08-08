<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Notas - {{ $curso->nombre_curso }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        .header, .footer {
            text-align: center;
            position: fixed;
            width: 100%;
        }
        .header {
            top: 0;
        }
        .footer {
            bottom: 0;
        }
        .content {
            margin-top: 50px;
            margin-bottom: 50px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Reporte de Notas</h2>
        <p>{{ $curso->nombre_curso }} - {{ $curso->seccion->grado->nivel->nombre_nivel }}</p>
        <p>Docente: {{ $curso->trabajador->nombre_trabajador }}, {{ $curso->trabajador->apellido_trabajador }}</p>
    </div>

    <div class="content">
        <h3>Detalles del Curso</h3>
        <p><strong>Nivel:</strong> {{ $curso->seccion->grado->nivel->nombre_nivel }}</p>
        <p><strong>Grado:</strong> {{ $curso->seccion->grado->nombre_grado }}</p>
        <p><strong>Sección:</strong> {{ $curso->seccion->nombre_seccion }}</p>

        <h4>Estudiantes Inscritos:</h4>
        @if ($notas->isEmpty())
            <p>No hay estudiantes registrados.</p>
        @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Estudiante</th>
                    <th>U1</th>
                    <th>U2</th>
                    <th>U3</th>
                    <th>Promedio</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($notas as $nota)
                    @php
                        $totalNotas = $nota->notaUnidad1 + $nota->notaUnidad2 + $nota->notaUnidad3;
                        $promedio = $totalNotas > 0 ? ($totalNotas / 3) : 0;
                        $estado = $promedio >= 11 ? 'APROBADO' : 'DESAPROBADO';
                        $estadoClase = $promedio >= 11 ? 'text-success' : 'text-danger';
                    @endphp
                    <tr>
                        <td>{{ $nota->estudiante->id_estudiante }}</td>
                        <td>{{ $nota->estudiante->nombre_estudiante }} {{ $nota->estudiante->apellido_estudiante }}</td>
                        <td>{{ $nota->notaUnidad1 }}</td>
                        <td>{{ $nota->notaUnidad2 }}</td>
                        <td>{{ $nota->notaUnidad3 }}</td>
                        <td>{{ number_format($promedio, 2) }}</td> <!-- Formatea el promedio a 2 decimales -->
                        <td class="{{ $estadoClase }}">{{ $estado }}</td> <!-- Muestra el estado de aprobación con color -->
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>

    <div class="footer">
        <p>Reporte generado el {{ \Carbon\Carbon::now()->format('d/m/Y') }}</p>
    </div>
</body>
</html>
