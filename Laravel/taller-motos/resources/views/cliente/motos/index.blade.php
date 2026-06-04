@extends('layouts.app')

@section('content')
<h2>Mis Motos</h2>
<a href="{{ route('cliente.motos.create') }}">Añadir Moto</a>

@if($motos->isEmpty())
    <p>No tienes motos registradas.</p>
@else
    <table>
        <thead>
            <tr>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Matrícula</th>
                <th>Año</th>
                <th>Km</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($motos as $moto)
            <tr>
                <td>{{ $moto->marca->nombre }}</td>
                <td>{{ $moto->modelo }}</td>
                <td>{{ $moto->matricula }}</td>
                <td>{{ $moto->año }}</td>
                <td>{{ number_format($moto->kilometros) }}</td>
                <td>
                    <a href="{{ route('cliente.motos.show', $moto) }}">Ver</a>
                    <a href="{{ route('cliente.motos.edit', $moto) }}">Editar</a>

                    <form action="{{ route('cliente.motos.destroy', $moto) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Eliminar moto?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection