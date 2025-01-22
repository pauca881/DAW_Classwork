@extends ('inici') 
@section('content')

<p>hola soc borrar</p>
<p>Mostrar resultat de la cerca. Resultats: {{count($dades)}}</p> 

@if (session ('success'))
    <h6 class="alert alert-success">{{ session('success') }}</h6>
@endif 

    <ul>
        @foreach ($dades as $i)
            <form action="/borrar/{{ $i->id }}" method="POST">
        @csrf
        @method('DELETE')
        <li>{{ $i->nom }} <button type="submit" class="btn btn-primary">Borrar</button></li> 
    </form>
        @endforeach
</ul>
@endsection