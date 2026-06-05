@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-5">
    <h1 class="d-flex align-items-center mb-0">
        <i class="bi bi-tag text-danger me-3"></i>Gestión de Marcas
    </h1>
    <a href="{{ route('admin.marcas.create') }}" class="btn btn-primary btn-lg">
        <i class="bi bi-plus-circle me-2"></i>Nueva Marca
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        @if($marcas->isEmpty())
            <div class="alert alert-info text-center py-4">
                <i class="bi bi-info-circle me-2"></i>
                No hay marcas registradas aún. <a href="{{ route('admin.marcas.create') }}">Crear una nueva</a>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr class="border-bottom">
                            <th class="bg-light-subtle">
                                <i class="bi bi-tag text-danger me-2"></i>Nombre
                            </th>
                            <th class="bg-light-subtle">
                                <i class="bi bi-geo-alt text-danger me-2"></i>País
                            </th>
                            <th class="bg-light-subtle text-center">
                                <i class="bi bi-gear text-danger me-2"></i>Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($marcas as $marca)
                        <tr>
                            <td class="fw-500">
                                <div class="d-flex align-items-center">
                                    <span class="badge bg-danger me-2">{{ substr($marca->nombre, 0, 1) }}</span>
                                    {{ $marca->nombre }}
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark">{{ $marca->pais ?? 'N/A' }}</span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.marcas.edit', $marca) }}" class="btn btn-sm btn-warning me-2">
                                    <i class="bi bi-pencil-square"></i> Editar
                                </a>
                                <form action="{{ route('admin.marcas.destroy', $marca) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" 
                                            onclick="return confirm('¿Estás seguro de eliminar esta marca?')">
                                        <i class="bi bi-trash"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted py-4">
                                No hay marcas disponibles
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection