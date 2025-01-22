@extends('inici')
@section('content')
<p>hola soc modificar</p>
  <ul>
    @foreach ($dades as $i)
    <li>{{ $i->dni }} {{ $i->nom }} {{ $i->cognom }}  <a href="/modificar/{{ $i->dni }}">Editar</a></li>  
   @endforeach
  </ul>
@endsection