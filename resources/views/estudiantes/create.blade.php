@extends('layout.layout')

@section('contenido')
    <div class="container">
        <h1>Registro Nuevo de Estudiante</h1>
        <form method="POST" action="{{ route('estudiantes.store') }}">
            @csrf
            <div class="form-group">
                <label for="nombre_estudiante">Nombre</label>
                <input type="text" class="form-control @error('nombre_estudiante') is-invalid @enderror" id="nombre_estudiante" name="nombre_estudiante">
                @error('nombre_estudiante')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="apellido_estudiante">Apellido</label>
                <input type="text" class="form-control @error('apellido_estudiante') is-invalid @enderror" id="apellido_estudiante" name="apellido_estudiante">
                @error('apellido_estudiante')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="fechaNacimiento">Fecha de Nacimiento</label>
                <input type="date" class="form-control @error('fechaNacimiento') is-invalid @enderror" id="fechaNacimiento" name="fechaNacimiento">
                @error('fechaNacimiento')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="DNI">DNI</label>
                <input type="text" class="form-control @error('DNI') is-invalid @enderror" id="DNI" name="DNI" maxlength="8" pattern="\d{8}" title="El DNI debe tener 8 dígitos">
                @error('DNI')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="genero">Género</label>
                <select class="form-control @error('genero') is-invalid @enderror" id="genero" name="genero">
                    <option value="">Seleccione su género</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Otros">Otros</option>
                </select>
                @error('genero')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="pais">País</label>
                <select class="form-control @error('pais') is-invalid @enderror" id="pais" name="pais">
                    <option value="">Seleccione un país</option>
                    @foreach($paises as $pais)
                        <option value="{{ $pais->id }}">{{ $pais->nombre }}</option>
                    @endforeach
                </select>
                @error('pais')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="region">Región</label>
                <select class="form-control @error('region') is-invalid @enderror" id="region" name="region" disabled>
                    <option value="">Seleccione una región</option>
                </select>
                @error('region')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="ciudad">Ciudad</label>
                <select class="form-control @error('ciudad') is-invalid @enderror" id="ciudad" name="ciudad" disabled>
                    <option value="">Seleccione una ciudad</option>
                </select>
                @error('ciudad')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="distrito">Distrito</label>
                <select class="form-control @error('distrito') is-invalid @enderror" id="distrito" name="distrito" disabled>
                    <option value="">Seleccione un distrito</option>
                </select>
                @error('distrito')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="estado_civil">Estado civil</label>
                <select class="form-control @error('estado_civil') is-invalid @enderror" id="estado_civil" name="estado_civil">
                    <option value="">Seleccione su estado civil</option>
                    <option value="Soltero">Soltero</option>
                    <option value="Casado">Casado</option>
                </select>
                @error('estado_civil')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono (Ingresar los nueve digitos)</label>
                <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" style="margin-bottom: 5px">
                @error('telefono')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Grabar</button>
            <a href="{{ route('estudiantes.index') }}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
        </form>
    </div>

    <script>
        document.getElementById('pais').addEventListener('change', function() {
            var paisId = this.value;

            // Limpiar select de regiones
            var regionSelect = document.getElementById('region');
            regionSelect.innerHTML = '<option value="">Seleccione una región</option>';
            regionSelect.disabled = true;

            // Limpiar select de ciudades y distritos
            var ciudadSelect = document.getElementById('ciudad');
            ciudadSelect.innerHTML = '<option value="">Seleccione una ciudad</option>';
            ciudadSelect.disabled = true;

            var distritoSelect = document.getElementById('distrito');
            distritoSelect.innerHTML = '<option value="">Seleccione un distrito</option>';
            distritoSelect.disabled = true;

            if (paisId) {
                fetch(`/get-regiones?pais_id=${paisId}`)
                    .then(response => response.json())
                    .then(data => {
                        regionSelect.disabled = false;
                        data.forEach(function(region) {
                            let option = document.createElement('option');
                            option.value = region.id;
                            option.text = region.nombre;
                            regionSelect.appendChild(option);
                        });
                    });
            }
        });

        document.getElementById('region').addEventListener('change', function() {
            var regionId = this.value;

            // Limpiar select de ciudades
            var ciudadSelect = document.getElementById('ciudad');
            ciudadSelect.innerHTML = '<option value="">Seleccione una ciudad</option>';
            ciudadSelect.disabled = true;

            // Limpiar select de distritos
            var distritoSelect = document.getElementById('distrito');
            distritoSelect.innerHTML = '<option value="">Seleccione un distrito</option>';
            distritoSelect.disabled = true;

            if (regionId) {
                fetch(`/get-ciudades?region_id=${regionId}`)
                    .then(response => response.json())
                    .then(data => {
                        ciudadSelect.disabled = false;
                        data.forEach(function(ciudad) {
                            let option = document.createElement('option');
                            option.value = ciudad.id;
                            option.text = ciudad.nombre;
                            ciudadSelect.appendChild(option);
                        });
                    });
            }
        });

        document.getElementById('ciudad').addEventListener('change', function() {
            var ciudadId = this.value;

            // Limpiar select de distritos
            var distritoSelect = document.getElementById('distrito');
            distritoSelect.innerHTML = '<option value="">Seleccione un distrito</option>';
            distritoSelect.disabled = true;

            if (ciudadId) {
                fetch(`/get-distritos?ciudad_id=${ciudadId}`)
                    .then(response => response.json())
                    .then(data => {
                        distritoSelect.disabled = false;
                        data.forEach(function(distrito) {
                            let option = document.createElement('option');
                            option.value = distrito.id;
                            option.text = distrito.nombre;
                            distritoSelect.appendChild(option);
                        });
                    });
            }
        });
    </script>
@endsection
