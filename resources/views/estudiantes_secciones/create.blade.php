@extends('layout.layout')

@section('contenido')
    <div class="container">
        <h1>Asignar Estudiante a Sección</h1>
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
        <form action="{{ route('estudiantes_secciones.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="id_estudiante">Estudiante</label>
                <select name="id_estudiante" class="form-control" required>
                    <option value="">Seleccione un estudiante</option>
                    @foreach ($estudiantes as $estudiante)
                        <option value="{{ $estudiante->id_estudiante }}">{{ $estudiante->nombre_estudiante}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="id_seccion">Sección</label>
                <select name="id_seccion" class="form-control" required>
                    <option value="">Seleccione una sección</option>
                    @foreach ($secciones as $seccion)
                        <option value="{{ $seccion->id_seccion }}">{{ $seccion->numero_aula }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Asignar Estudiante</button>
        </form>
    </div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const estudianteSelect = document.querySelector('select[name="id_estudiante"]');
        const hiddenInput = document.getElementById('id_estudiante_hidden');

        estudianteSelect.addEventListener('change', function () {
            hiddenInput.value = this.value;
        });
    });
</script>
@endsection
