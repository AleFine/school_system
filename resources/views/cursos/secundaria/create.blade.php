@extends('layout.layout')

@section('contenido')

<div class="container mt-5">
    <h1 class="mb-4 text-center">Crear Curso - Nivel Secundaria</h1>

    <div class="row">
        <!-- Columna para el formulario -->
        <div class="col-md-6 d-flex justify-content-center">
            <form action="{{ route('cursos-secundaria.store') }}" method="POST" style="width: 100%;">
                @csrf

                <!-- Mostrar mensajes de éxito o error -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Nombre del curso -->
                <div class="form-group">
                    <label for="nombre_curso">Nombre del Curso</label>
                    <input type="text" name="nombre_curso" class="form-control" value="{{ old('nombre_curso') }}" required>
                </div>

                <!-- Nivel (automáticamente Primaria) -->
                <div class="form-group">
                    <label for="nivel">Nivel</label>
                    <input type="text" name="nivel" class="form-control" value="Secundaria" readonly disabled>
                </div>

                <!-- Grado (filtrado por nivel Primaria) -->
                <div class="form-group">
                    <label for="id_grado">Grado</label>
                    <select name="id_grado" class="form-control" required>
                        <option value="">Selecciona un Grado</option>
                        @foreach($grados as $grado)
                            <option value="{{ $grado->id_grado }}">{{ $grado->nombre_grado }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Departamento para filtrar docentes -->
                <div class="form-group">
                    <label for="departamento">Departamento</label>
                    <select name="departamento" class="form-control" id="departamento" required>
                        <option value="">Selecciona un Departamento</option>
                        @foreach($departamentos as $departamento)
                            <option value="{{ $departamento->id_departamento }}">{{ $departamento->nombre_departamento }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Trabajador (filtrado por departamento) -->
                <div class="form-group">
                    <label for="id_trabajador">Docente</label>
                    <select name="id_trabajador" class="form-control" id="trabajador" required>
                        <option value="">Selecciona un Docente</option>
                    </select>
                </div>

                <!-- Botón para enviar el formulario -->
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary btn-block">Crear</button>
                    <a href="{{ route('cursos-secundaria.index') }}" class="btn btn-secondary btn-block">Cancelar</a>
                </div>
            </form>
        </div>

        <!-- Columna para la imagen -->
        <div class="col-md-6 d-flex align-items-center justify-content-center">
            <img src="{{ asset('assets/img/niños-secundaria-ordenador.jpg') }}" class="img-fluid" alt="Descripción de la imagen">
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const departamentoSelect = document.getElementById('departamento');
        const trabajadorSelect = document.getElementById('trabajador');

        departamentoSelect.addEventListener('change', function () {
            const departamentoId = this.value;

            if (departamentoId) {
                fetch(`/trabajadores/${departamentoId}`)
                    .then(response => response.json())
                    .then(data => {
                        trabajadorSelect.innerHTML = '<option value="">Selecciona un Trabajador</option>';
                        data.forEach(trabajador => {
                            const option = document.createElement('option');
                            option.value = trabajador.id_trabajador;
                            option.textContent = trabajador.nombre_trabajador + ', ' +trabajador.apellido_trabajador;
                            trabajadorSelect.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error:', error));
            } else {
                trabajadorSelect.innerHTML = '<option value="">Selecciona un Trabajador</option>';
            }
        });

        // Trigger change event to initialize the state
        departamentoSelect.dispatchEvent(new Event('change'));
    });
</script>

@endsection