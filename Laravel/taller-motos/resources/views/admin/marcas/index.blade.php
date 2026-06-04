@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Marcas</h2>
    <a href="{{ route('admin.marcas.create') }}" class="btn btn-primary">+ Nueva Marca</a>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Nombre</th>
                <th>País</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($marcas as $marca)
            <tr>
                <td>{{ $marca->nombre }}</td>
                <td>{{ $marca->pais ?? '-' }}</td>
                <td>
                    <a href="{{ route('admin.marcas.edit', $marca) }}" class="btn btn-sm btn-warning">Editar</a>

                    <form action="{{ route('admin.marcas.destroy', $marca) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar marca?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center text-muted">No hay marcas registradas</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection