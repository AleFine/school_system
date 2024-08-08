@extends('layout.layout')

@section('contenido')

<div class="container mt-5">
    <h1 class="mb-4 text-center">Editar Competencia</h1>
    <div class="col-md-6 d-flex justify-content-center">
        <form method="POST" action="{{ route('competencias.update', $competencia->id_competencia) }}" style="width: 100%;">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="">Descripción</label>
                <input type="text" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion"
                value="{{ $competencia->descripcion }}">
                @error('descripcion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="id_curso">Curso</label>
                <select name="id_curso" class="form-control" required>
                    <option value="">Selecciona un Curso</option>
                    @foreach($cursos as $curso)
                        <option value="{{ $curso->id_curso }}" {{ $curso->id_curso == old('id_curso', $competencia->cursos->first()->id_curso) ? 'selected' : '' }}>
                            {{ $curso->nombre_curso }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary btn-block">Actualizar</button>
                <a href="{{ route('competencias.index') }}" class="btn btn-secondary btn-block">Cancelar</a>
            </div>
        </form>
    </div>

</div>

@endsection





