@extends('layouts.app')

@section('content')
<h2 class="mb-4">Órdenes de Reparación</h2>

<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="table-dark">
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
            @forelse($ordenes as $orden)
            <tr>
                <td><strong>#{{ $orden->id }}</strong></td>
                <td>{{ $orden->moto->user->nombre }}</td>
                <td>{{ $orden->moto->marca->nombre }} {{ $orden->moto->modelo }}</td>
                <td>{{ $orden->mecanico?->nombre ?? '<span class="text-muted">Sin asignar</span>' }}</td>
                <td>
                    @switch($orden->status)
                        @case('pendiente')
                            <span class="badge bg-warning text-dark">Pendiente</span>
                            @break
                        @case('reparando')
                            <span class="badge bg-info">Reparando</span>
                            @break
                        @case('listo')
                            <span class="badge bg-success">Listo</span>
                            @break
                        @case('entregada')
                            <span class="badge bg-secondary">Entregada</span>
                            @break
                    @endswitch
                </td>
                <td>{{ $orden->fecha_entrada }}</td>
                <td>
                    <a href="{{ route('admin.ordenes.show', $orden) }}" class="btn btn-sm btn-info">Ver</a>
                    <a href="{{ route('admin.ordenes.edit', $orden) }}" class="btn btn-sm btn-warning">Editar</a>

                    <form action="{{ route('admin.ordenes.destroy', $orden) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar orden?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center text-muted">No hay órdenes registradas</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection