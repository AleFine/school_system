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

        <!-- Estudiante -->
        <div class="form-group">
            <label for="id_estudiante">Estudiante</label>
            <select name="id_estudiante" class="form-control" required>
                <option value="">Seleccione un estudiante</option>
                @foreach ($estudiantes as $estudiante)
                    <option value="{{ $estudiante->id_estudiante }}">{{ $estudiante->nombre_estudiante }}</option>
                @endforeach
            </select>
        </div>

        <!-- Nivel -->
        <div class="form-group">
            <label for="id_nivel">Nivel</label>
            <select name="id_nivel" id="nivel" class="form-control" required>
                <option value="">Seleccione un nivel</option>
                @foreach ($niveles as $nivel)
                    <option value="{{ $nivel->id_nivel }}">{{ $nivel->nombre_nivel }}</option>
                @endforeach
            </select>
        </div>

        <!-- Grado -->
        <div class="form-group">
            <label for="id_grado">Grado</label>
            <select name="id_grado" id="grado" class="form-control" required>
                <option value="">Seleccione un grado</option>
            </select>
        </div>

        <!-- Sección -->
        <div class="form-group">
            <label for="id_seccion">Sección</label>
            <select name="id_seccion" id="seccion" class="form-control" required>
                <option value="">Seleccione una sección</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Asignar Estudiante</button>
    </form>
</div>

<script>
   document.addEventListener('DOMContentLoaded', function () {
    const nivelSelect = document.getElementById('nivel');
    const gradoSelect = document.getElementById('grado');
    const seccionSelect = document.getElementById('seccion');

    // Filtrar grados según el nivel seleccionado
    nivelSelect.addEventListener('change', function () {
        const nivelId = this.value;
        gradoSelect.innerHTML = '<option value="">Seleccione un grado</option>';
        seccionSelect.innerHTML = '<option value="">Seleccione una sección</option>';

        if (nivelId) {
            fetch(`/api/grados/${nivelId}`)
                .then(response => response.json())
                .then(data => {
                    data.forEach(grado => {
                        const option = document.createElement('option');
                        option.value = grado.id_grado;
                        option.textContent = grado.nombre_grado;
                        gradoSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error fetching grados:', error));
        } else {
            gradoSelect.innerHTML = '<option value="">Seleccione un grado</option>';
            seccionSelect.innerHTML = '<option value="">Seleccione una sección</option>';
        }
    });

    // Filtrar secciones según el grado seleccionado
    gradoSelect.addEventListener('change', function () {
        const gradoId = this.value;
        seccionSelect.innerHTML = '<option value="">Seleccione una sección</option>';

        if (gradoId) {
            fetch(`/api/secciones/${gradoId}`)
                .then(response => response.json())
                .then(data => {
                    data.forEach(seccion => {
                        const option = document.createElement('option');
                        option.value = seccion.id_seccion;
                        option.textContent = seccion.nombre_seccion;
                        seccionSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error fetching secciones:', error));
        } else {
            seccionSelect.innerHTML = '<option value="">Seleccione una sección</option>';
        }
    });

    // Simular el cambio del nivel si ya hay un valor preseleccionado
    if (nivelSelect.value) {
        nivelSelect.dispatchEvent(new Event('change'));
    }
});

</script>
@endsection
