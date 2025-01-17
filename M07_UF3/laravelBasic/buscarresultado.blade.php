@extends('inici')

@section('content')
<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success">
            <h4 class="alert-heading">¡Éxito!</h4>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <h2 class="text-center mb-4">Resultado de la Búsqueda</h2>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="list-group">
                @if (count($dades) == 0)
                    <h3 class="text-center text-danger">No se encontraron resultados</h3>
                @else
                    <h3 class="text-center mb-3">Resultados: {{ count($dades) }}</h3>
                    @foreach ($dades as $i)
                        <a href="#" class="list-group-item list-group-item-action">
                            {{ $i->id }} - {{ $i->name }}
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
