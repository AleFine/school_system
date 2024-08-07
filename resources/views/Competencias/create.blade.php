@extends('layout.layout')

@section('contenido')

<div class="container mt-5">
    <h1 class="mb-4 text-center">Crear Competencia</h1>

    <div class="row">
        <div class="col-md-6 d-flex justify-content-center">
            <form action="{{ route('competencias.store') }}" method="POST" style="width: 100%;">
                @csrf

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

                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <input type="text" name="descripcion" class="form-control" value="{{ old('descripcion') }}" required>
                </div>

                <div class="form-group">
                    <label for="id_curso">Curso</label>
                    <select name="id_curso" class="form-control" required>
                        <option value="">Selecciona un Curso</option>
                        @foreach($cursos as $curso)
                            <option value="{{ $curso->id_curso }}">{{ $curso->nombre_curso }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary btn-block">Crear</button>
                    <a href="{{ route('competencias.index') }}" class="btn btn-secondary btn-block">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection




