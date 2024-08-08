@extends('layout.layout')

@section('contenido')
<div class="container">
    <form id="gradoForm" method="GET" class="d-flex justify-content-between align-items-center mb-3">
        @csrf
        <div class="row">
            <div class="form-group my-2">
                <label for="pgrado" class="my-3">Grados</label>
                <select name="pgrado" class="form-control" id="pgrado" required>
                    <option value="">Selecciona un Grado</option>
                    @foreach($grados as $grado)
                        <option value="{{ $grado->id_grado }}">{{ $grado->nombre_grado }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-3">
                <button class="btn btn-success" type="submit">Consultar</button>
            </div>
        </div>
    </form>
</div>
@endsection

@section('script')
<script>
document.getElementById('gradoForm').addEventListener('submit', function(event) {
    event.preventDefault();
    var gradoId = document.getElementById('grado').value;
    if (gradoId) {
        var url = "{{ route('grado-cursos-primaria.show', ['grado_cursos_primarium' => ':id']) }}";
        url = url.replace(':id', gradoId);
        window.location.href = url;
    } else {
        alert('Por favor, selecciona un grado.');
    }
});
</script>
@endsection