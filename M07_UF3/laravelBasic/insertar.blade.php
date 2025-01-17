@extends('inici')

@section('content')


<div class="mb-3">
    
    <form action="{{ route('dades_insertar') }}" method="POST">
        @csrf
        @if (session('success'))
            <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif
        @error('name')
            <h5 class="alert alert-danger">{{ $message }}</h5>
        @enderror

        <label for="" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="name" name="name">
        <button type="submit" class="btn btn-primary">Insertar</button>
    </form>


</div>

@endsection
