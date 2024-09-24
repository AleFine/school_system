@extends('layout.layout')

@section('contenido')
<div class="container">
    <h1>Consulta de Cursos y Estudiantes</h1>
    <form action="{{ route('consultas.filter') }}" method="GET">
        @csrf
        <div class="form-group">
            <label for="id_grado">Grado</label>
            <select name="id_grado" id="id_grado" class="form-control" required>
                <option value="">Selecciona un Grado</option>
                @foreach($grados as $grado)
                    <option value="{{ $grado->id_grado }}">{{ $grado->nombre_grado }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_seccion">Sección</label>
            <select name="id_seccion" id="id_seccion" class="form-control" required>
                <!-- Las secciones se actualizarán con JavaScript -->
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Consultar</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const gradoSelect = document.getElementById('id_grado');
        const seccionSelect = document.getElementById('id_seccion');

        gradoSelect.addEventListener('change', function () {
            const gradoId = this.value;

            if (gradoId) {
                fetch(`/api/secciones/${gradoId}`)
                    .then(response => response.json())
                    .then(data => {
                        seccionSelect.innerHTML = '<option value="">Selecciona una Sección</option>';
                        data.forEach(seccion => {
                            const option = document.createElement('option');
                            option.value = seccion.id_seccion;
                            option.textContent = seccion.nombre_seccion;
                            seccionSelect.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error:', error));
            } else {
                seccionSelect.innerHTML = '<option value="">Selecciona una Sección</option>';
            }
        });
    });
</script>
@endsection
