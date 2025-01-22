@extends('inici')
@section('content')
<p>hola soc modificar fila</p>
<div class="mb-3">
    <form action="{{route('dades-actualitzarfila',$fila[0]->dni)}}" method="POST">
        @csrf
        @method('PATCH')
        @if (session('success'))
            <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif
        @error('nombre')
            <h6 class="alert alert-danger">{{ $message }}</h6>            
        @enderror
        <label for="" class="form-label">dni</label>
        <input type="text" class="form-control" name="dni" id="" aria-describedby="helpId"  value="{{ $fila[0]->dni }}">    
        <label for="" class="form-label">nombre</label>
        <input type="text" class="form-control" name="nombre" id="" aria-describedby="helpId"  value="{{ $fila[0]->nom}}">    
        <label for="" class="form-label">apellido</label>
        <input type="text" class="form-control" name="apellido" id="" aria-describedby="helpId" value="{{ $fila[0]->cognom }}">    
        <button type="submit"  class="btn btn-primary">Enviar</button>
    </form>
</div>       
@endsection

