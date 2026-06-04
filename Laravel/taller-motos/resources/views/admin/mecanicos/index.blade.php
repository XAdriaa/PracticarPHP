@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Mecánicos</h2>
    <a href="{{ route('admin.mecanicos.create') }}" class="btn btn-primary">+ Nuevo Mecánico</a>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Nombre</th>
                <th>Especialidad</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($mecanicos as $mecanico)
            <tr>
                <td>{{ $mecanico->nombre }}</td>
                <td>{{ $mecanico->especialidad->nombre }}</td>
                <td>{{ $mecanico->telefono ?? '-' }}</td>
                <td>
                    <a href="{{ route('admin.mecanicos.edit', $mecanico) }}" class="btn btn-sm btn-warning">Editar</a>

                    <form action="{{ route('admin.mecanicos.destroy', $mecanico) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar mecánico?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center text-muted">No hay mecánicos registrados</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection