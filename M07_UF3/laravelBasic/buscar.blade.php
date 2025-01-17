@extends('inici')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Buscar Profesor</h2> <!-- Título centrado con margen inferior -->

    <div class="row justify-content-center">
        <div class="col-md-6">
            <form name="fbuscar" action="{{ route('dades-buscar') }}" method="POST">
                @csrf

                @error('name')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror

                <div class="mb-3">
                    <label for="name" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="Introduce el nombre">
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
