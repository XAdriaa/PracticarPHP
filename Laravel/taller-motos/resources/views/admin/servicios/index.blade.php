@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Servicios</h2>
    <a href="{{ route('admin.servicios.create') }}" class="btn btn-primary">+ Nuevo Servicio</a>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Precio base</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($servicios as $servicio)
            <tr>
                <td>{{ $servicio->nombre }}</td>
                <td>{{ $servicio->categoria->nombre }}</td>
                <td>{{ number_format($servicio->precio_base, 2) }} €</td>
                <td>
                    <a href="{{ route('admin.servicios.edit', $servicio) }}" class="btn btn-sm btn-warning">Editar</a>

                    <form action="{{ route('admin.servicios.destroy', $servicio) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar servicio?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center text-muted">No hay servicios registrados</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection