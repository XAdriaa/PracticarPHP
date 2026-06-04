@extends('layouts.app')

@section('content')
<h2>Órdenes</h2>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Cliente</th>
            <th>Moto</th>
            <th>Mecánico</th>
            <th>Estado</th>
            <th>Fecha entrada</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ordenes as $orden)
        <tr>
            <td>{{ $orden->id }}</td>
            <td>{{ $orden->moto->user->nombre }}</td>
            <td>{{ $orden->moto->marca->nombre }} {{ $orden->moto->modelo }}</td>
            <td>{{ $orden->mecanico?->nombre ?? 'Sin asignar' }}</td>
            <td>{{ ucfirst($orden->status) }}</td>
            <td>{{ $orden->fecha_entrada }}</td>
            <td>
                <a href="{{ route('admin.ordenes.show', $orden) }}">Ver</a>
                <a href="{{ route('admin.ordenes.edit', $orden) }}">Editar</a>

                <form action="{{ route('admin.ordenes.destroy', $orden) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Eliminar orden?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection