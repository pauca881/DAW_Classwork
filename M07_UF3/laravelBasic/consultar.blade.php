@extends('inici')
@section('content')
<div class="container mt-4">
  <p>Consulta los profesores actuales: </p>
  <ul class="list-group">
    @foreach ($dades as $i)
      <li class="list-group-item"><a href="/consultar/{{ $i->id }}">{{ $i->name }}</a></li>  
    @endforeach
  </ul>
</div>
@endsection
