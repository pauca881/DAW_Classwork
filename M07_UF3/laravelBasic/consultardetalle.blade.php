@extends('inici')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Detalles del Profesor</h2>

    @if ($fila) 
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Detalles</th>
                <th scope="col">Imagen</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>DNI:</strong> {{ $fila->dni }}</td>
                <td rowspan="4" class="text-center">
                    <img src="https://picsum.photos/200" alt="Imagen aleatoria" class="img-fluid">
                </td>
            </tr>
            <tr>
                <td><strong>Nombre:</strong> {{ $fila->name }}</td>
            </tr>
            <!-- otros campos -->
        </tbody>
    </table>
@else
    <p class="text-center text-danger">No se encontraron detalles del profesor.</p>
@endif

    <a href="{{ route('dades_consultar') }}" class="btn btn-primary mt-4">Volver a la lista</a>
</div>
@endsection


