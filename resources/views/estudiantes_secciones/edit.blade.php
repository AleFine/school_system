@extends('layout.layout')

@section('contenido')
    <div class="container">
        <h1 class="my-4">Editar Asignación de Estudiante a Sección</h1>
        <a href="{{ route('estudiantes_secciones.index') }}" class="btn btn-secondary mb-3">Regresar</a>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('estudiantes_secciones.update', ['id_estudiante' => $estudiantesSeccion->id_estudiante, 'id_seccion' => $estudiantesSeccion->id_seccion]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="id_estudiante">Estudiante</label>
                <select name="id_estudiante" class="form-control" required>
                    @foreach ($estudiantes as $estudiante)
                        <option value="{{ $estudiante->id_estudiante }}" {{ $estudiantesSeccion->id_estudiante == $estudiante->id_estudiante ? 'selected' : '' }}>
                            {{ $estudiante->nombre_estudiante }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="id_seccion">Sección</label>
                <select name="id_seccion" class="form-control" required>
                    @foreach ($secciones as $seccion)
                        <option value="{{ $seccion->id_seccion }}" {{ $estudiantesSeccion->id_seccion == $seccion->id_seccion ? 'selected' : '' }}>
                            {{ $seccion->nombre_seccion }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Asignación</button>
        </form>
    </div>
@endsection
