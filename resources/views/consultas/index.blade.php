@extends('layout.layout')

@section('contenido')
<div class="container">
    <h1>Consulta de Cursos y Estudiantes</h1>
    <form action="{{ route('consultas.filter') }}" method="GET">
        @csrf
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
                @foreach($grados as $grado)
                    <option value="{{ $grado->id_grado }}">{{ $grado->nombre_grado }}</option>
                @endforeach
            </select>
        </div>

        <!-- Sección -->
        <div class="form-group">
            <label for="id_seccion">Sección</label>
            <select name="id_seccion" id="seccion" class="form-control" required>
                <!-- Las secciones se actualizarán con JavaScript -->
                <option value="">Seleccione una sección</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Consultar</button>
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
