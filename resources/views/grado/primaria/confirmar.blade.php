@extends('layout.layout')
@section('contenido')
<div class="container">
    <form id="gradoForm" action="{{ route('grado.cursos.primaria.show', ['id' => '0']) }}" method="GET" class="d-flex justify-content-between align-items-center mb-3">
        @csrf
        <div class="row">
            <div class="form-group my-2">
                <label for="grado" class="my-3">Grados</label>
                <select name="grado" class="form-control" id="grado" required>
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
                this.action = this.action.replace('0', gradoId);
                this.submit();
            } else {
                alert('Por favor, selecciona un grado.');
            }
        });
    </script>
@endsection
