@extends('layout.layout')

@section('contenido')
<div class="container">
    <h1>Editar Asignación de Estudiante a Sección</h1>
    <a href="{{ route('estudiantes_secciones.index') }}" class="btn btn-secondary mb-3">Regresar</a>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    @endforeach
                    <li>{{ $error }}</li>
                </ul>
            </div>
        @endif
    <form action="{{ route('estudiantes_secciones.update', ['id_estudiante' => $estudiantesSeccion->estudiante->id_estudiante, 'id_seccion' => $estudiantesSeccion->seccion->id_seccion]) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Estudiante -->
        <div class="form-group">
            <label for="id_estudiante">Estudiante</label>
            <select name="id_estudiante" class="form-control" required>
                <option value="">Seleccione un estudiante</option>
                @foreach ($estudiantes as $estudiante)
                    <option value="{{ $estudiante->id_estudiante }}" {{ $estudiante->id_estudiante == $estudiantesSeccion->estudiante->id_estudiante ? 'selected' : '' }}>
                        {{ $estudiante->nombre_estudiante }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Nivel -->
        <div class="form-group">
            <label for="id_nivel">Nivel</label>
            <select name="id_nivel" id="nivel" class="form-control" required>
                <option value="">Seleccione un nivel</option>
                @foreach ($niveles as $nivel)
                    <option value="{{ $nivel->id_nivel }}" {{ $nivel->id_nivel == $estudiantesSeccion->seccion->grado->nivel->id_nivel ? 'selected' : '' }}>
                        {{ $nivel->nombre_nivel }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Grado -->
        <div class="form-group">
            <label for="id_grado">Grado</label>
            <select name="id_grado" id="grado" class="form-control" required>
                <option value="">Seleccione un grado</option>
                @foreach ($grados as $grado)
                    <option value="{{ $grado->id_grado }}" {{ $grado->id_grado == $estudiantesSeccion->seccion->grado->id_grado ? 'selected' : '' }}>
                        {{ $grado->nombre_grado }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Sección -->
        <div class="form-group">
            <label for="id_seccion">Sección</label>
            <select name="id_seccion" id="seccion" class="form-control" required>
                <option value="">Seleccione una sección</option>
                @foreach ($secciones as $seccion)
                    <option value="{{ $seccion->id_seccion }}" {{ $seccion->id_seccion == $estudiantesSeccion->seccion->id_seccion ? 'selected' : '' }}>
                        {{ $seccion->nombre_seccion }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Actualizar Asignación</button>
    </form>
</div>

<script>
   document.addEventListener('DOMContentLoaded', function () {
        const nivelSelect = document.getElementById('nivel');
        const gradoSelect = document.getElementById('grado');
        const seccionSelect = document.getElementById('seccion');
        const selectedGradoId = {{ $estudiantesSeccion->seccion->grado->id_grado }};
        const selectedSeccionId = {{ $estudiantesSeccion->seccion->id_seccion }};

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
                            if (grado.id_grado == selectedGradoId) {
                                option.selected = true;
                            }
                            gradoSelect.appendChild(option);
                        });
                        gradoSelect.dispatchEvent(new Event('change'));
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
                            if (seccion.id_seccion == selectedSeccionId) {
                                option.selected = true;
                            }
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
