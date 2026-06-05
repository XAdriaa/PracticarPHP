@extends('layouts.app')

@section('content')
<div class="row justify-content-between align-items-start mb-5">
    <div class="col">
        <h1 class="d-flex align-items-center mb-0">
            <i class="bi bi-receipt text-danger me-3"></i>Orden #{{ $orden->id }}
        </h1>
    </div>
    <div class="col-auto d-flex gap-2">
        <a href="{{ route('admin.ordenes.edit', $orden) }}" class="btn btn-warning btn-lg">
            <i class="bi bi-pencil-square me-2"></i>Editar
        </a>
        <a href="{{ route('admin.ordenes.index') }}" class="btn btn-light btn-lg">
            <i class="bi bi-arrow-left me-2"></i>Volver
        </a>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-light">
                <h6 class="mb-0">
                    <i class="bi bi-info-circle text-danger me-2"></i>Información General
                </h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <small class="text-muted d-block">Cliente</small>
                    <strong>{{ $orden->moto->user->nombre }}</strong>
                </div>
                <div class="mb-3">
                    <small class="text-muted d-block">Moto</small>
                    <strong>{{ $orden->moto->marca->nombre }} {{ $orden->moto->modelo }}</strong>
                </div>
                <div class="mb-3">
                    <small class="text-muted d-block">Matrícula</small>
                    <strong>{{ $orden->moto->matricula }}</strong>
                </div>
                <div class="mb-3">
                    <small class="text-muted d-block">Mecánico</small>
                    <strong>{{ $orden->mecanico?->nombre ?? 'Sin asignar' }}</strong>
                </div>
                <div class="mb-3">
                    <small class="text-muted d-block">Estado</small>
                    @switch($orden->status)
                        @case('pendiente')
                            <span class="badge bg-warning text-dark fs-6">Pendiente</span>
                            @break
                        @case('reparando')
                            <span class="badge bg-info fs-6">Reparando</span>
                            @break
                        @case('listo')
                            <span class="badge bg-success fs-6">Listo</span>
                            @break
                        @case('entregada')
                            <span class="badge bg-secondary fs-6">Entregada</span>
                            @break
                    @endswitch
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-light">
                <h6 class="mb-0">
                    <i class="bi bi-calendar text-danger me-2"></i>Fechas
                </h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <small class="text-muted d-block">Fecha Entrada</small>
                    <strong>{{ $orden->fecha_entrada->format('d/m/Y H:i') }}</strong>
                </div>
                <div>
                    <small class="text-muted d-block">Fecha Salida</small>
                    <strong>{{ $orden->fecha_salida?->format('d/m/Y H:i') ?? 'Pendiente' }}</strong>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm mt-4">
    <div class="card-header bg-light">
        <h6 class="mb-0">
            <i class="bi bi-text-paragraph text-danger me-2"></i>Descripción
        </h6>
    </div>
    <div class="card-body">
        <p class="mb-0">{{ $orden->descripcion ?? '<span class="text-muted">Sin descripción</span>' }}</p>
    </div>
</div>

<div class="card border-0 shadow-sm mt-4">
    <div class="card-header bg-light">
        <h6 class="mb-0">
            <i class="bi bi-tools text-danger me-2"></i>Servicios Realizados
        </h6>
    </div>
    <div class="card-body">
        @if($orden->servicios->isEmpty())
            <div class="alert alert-info text-center py-4 mb-0">
                <i class="bi bi-info-circle me-2"></i>
                Sin servicios añadidos aún
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr class="border-bottom">
                            <th>Servicio</th>
                            <th class="text-center">Cantidad</th>
                            <th class="text-end">Precio Unit.</th>
                            <th class="text-end">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orden->servicios as $servicio)
                        <tr>
                            <td>{{ $servicio->nombre }}</td>
                            <td class="text-center">{{ $servicio->pivot->cantidad }}</td>
                            <td class="text-end">{{ number_format($servicio->pivot->precio, 2) }} €</td>
                            <td class="text-end"><strong>{{ number_format($servicio->pivot->precio * $servicio->pivot->cantidad, 2) }} €</strong></td>
                        </tr>
                        @endforeach
                        <tr class="table-active border-top">
                            <td colspan="3" class="text-end"><strong>Total:</strong></td>
                            <td class="text-end"><strong class="text-danger fs-5">{{ number_format($orden->servicios->sum(fn($s) => $s->pivot->precio * $s->pivot->cantidad), 2) }} €</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection
        </div>
    </div>
</div>
@endsection