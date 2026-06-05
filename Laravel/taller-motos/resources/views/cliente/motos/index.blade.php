@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-5">
    <h1 class="d-flex align-items-center mb-0">
        <i class="bi bi-bicycle text-danger me-3"></i>Mis Motos
    </h1>
    <a href="{{ route('cliente.motos.create') }}" class="btn btn-primary btn-lg">
        <i class="bi bi-plus-circle me-2"></i>Añadir Moto
    </a>
</div>

@if($motos->isEmpty())
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="alert alert-info text-center py-5 mb-0">
                <i class="bi bi-info-circle" style="font-size: 2.5rem;"></i>
                <h5 class="mt-3 mb-2">No tienes motos registradas</h5>
                <p class="text-muted mb-0">Comienza añadiendo tu primera moto para solicitar reparaciones</p>
            </div>
        </div>
    </div>
@else
    <div class="row g-4">
        @foreach($motos as $moto)
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-bicycle text-danger me-2"></i>{{ $moto->modelo }}
                        </h5>
                        <span class="badge bg-danger">{{ $moto->marca->nombre }}</span>
                    </div>
                    
                    <div class="mb-3">
                        <small class="text-muted d-block mb-2">
                            <i class="bi bi-tag"></i> Matrícula: <strong>{{ $moto->matricula }}</strong>
                        </small>
                        <small class="text-muted d-block mb-2">
                            <i class="bi bi-calendar"></i> Año: <strong>{{ $moto->año }}</strong>
                        </small>
                        <small class="text-muted d-block">
                            <i class="bi bi-speedometer2"></i> Km: <strong>{{ number_format($moto->kilometros) }}</strong>
                        </small>
                    </div>
                </div>
                <div class="card-footer bg-light border-0">
                    <div class="d-grid gap-2">
                        <a href="{{ route('cliente.motos.show', $moto) }}" class="btn btn-sm btn-info">
                            <i class="bi bi-eye me-2"></i>Ver Detalles
                        </a>
                        <div class="d-flex gap-2">
                            <a href="{{ route('cliente.motos.edit', $moto) }}" class="btn btn-sm btn-warning flex-grow-1">
                                <i class="bi bi-pencil-square"></i> Editar
                            </a>
                            <form action="{{ route('cliente.motos.destroy', $moto) }}" method="POST" class="flex-grow-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger w-100" 
                                        onclick="return confirm('¿Eliminar esta moto?')">
                                    <i class="bi bi-trash"></i> Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endif
@endsection