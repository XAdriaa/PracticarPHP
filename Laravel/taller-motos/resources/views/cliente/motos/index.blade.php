@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Mis Motos</h2>
    <a href="{{ route('cliente.motos.create') }}" class="btn btn-primary">+ Añadir Moto</a>
</div>

@if($motos->isEmpty())
    <div class="alert alert-info">No tienes motos registradas.</div>
@else
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
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
                        <a href="{{ route('cliente.motos.show', $moto) }}" class="btn btn-sm btn-info">Ver</a>
                        <a href="{{ route('cliente.motos.edit', $moto) }}" class="btn btn-sm btn-warning">Editar</a>

                        <form action="{{ route('cliente.motos.destroy', $moto) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar moto?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
@endsection