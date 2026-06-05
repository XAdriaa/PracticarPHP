@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-5">
    <h1 class="d-flex align-items-center mb-0">
        <i class="bi bi-tools text-danger me-3"></i>Gestión de Servicios
    </h1>
    <a href="{{ route('admin.servicios.create') }}" class="btn btn-primary btn-lg">
        <i class="bi bi-plus-circle me-2"></i>Nuevo Servicio
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        @if($servicios->isEmpty())
            <div class="alert alert-info text-center py-4">
                <i class="bi bi-info-circle me-2"></i>
                No hay servicios registrados aún. <a href="{{ route('admin.servicios.create') }}">Crear uno nuevo</a>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr class="border-bottom">
                            <th class="bg-light-subtle">
                                <i class="bi bi-tools text-danger me-2"></i>Nombre
                            </th>
                            <th class="bg-light-subtle">
                                <i class="bi bi-tag text-danger me-2"></i>Categoría
                            </th>
                            <th class="bg-light-subtle">
                                <i class="bi bi-currency-euro text-danger me-2"></i>Precio Base
                            </th>
                            <th class="bg-light-subtle text-center">
                                <i class="bi bi-gear text-danger me-2"></i>Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($servicios as $servicio)
                        <tr>
                            <td class="fw-500">{{ $servicio->nombre }}</td>
                            <td>
                                <span class="badge bg-light text-dark">{{ $servicio->categoria->nombre }}</span>
                            </td>
                            <td>
                                <strong>{{ number_format($servicio->precio_base, 2) }} €</strong>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.servicios.edit', $servicio) }}" class="btn btn-sm btn-warning me-2">
                                    <i class="bi bi-pencil-square"></i> Editar
                                </a>
                                <form action="{{ route('admin.servicios.destroy', $servicio) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estoy seguro de eliminar este servicio?')">
                                        <i class="bi bi-trash"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">
                                No hay servicios disponibles
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