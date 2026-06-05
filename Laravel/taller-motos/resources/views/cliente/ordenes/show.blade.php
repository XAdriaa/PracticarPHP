@extends('layouts.app')

@section('content')
<div class="row justify-content-between align-items-start mb-5">
    <div class="col">
        <h1 class="d-flex align-items-center mb-0">
            <i class="bi bi-receipt text-danger me-3"></i>Orden #{{ $orden->id }}
        </h1>
    </div>
    <div class="col-auto">
        <a href="{{ route('cliente.ordenes.index') }}" class="btn btn-light">
            <i class="bi bi-arrow-left me-2"></i>Volver
        </a>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-light">
                <h6 class="mb-0">
                    <i class="bi bi-info-circle text-danger me-2"></i>Información de la Orden
                </h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <small class="text-muted d-block">Estado</small>
                    @php
                        $statusClass = match($orden->status) {
                            'pendiente' => 'warning',
                            'reparando' => 'info',
                            'completado' => 'success',
                            'cancelado' => 'danger',
                            default => 'secondary'
                        };
                    @endphp
                    <span class="badge bg-{{ $statusClass }} fs-6">{{ ucfirst($orden->status) }}</span>
                </div>
                <div class="mb-3">
                    <small class="text-muted d-block">Moto</small>
                    <strong>{{ $orden->moto->marca->nombre }} {{ $orden->moto->modelo }}</strong>
                    <br>
                    <small class="text-muted">{{ $orden->moto->matricula }}</small>
                </div>
                <div class="mb-3">
                    <small class="text-muted d-block">Mecánico</small>
                    <strong>{{ $orden->mecanico?->nombre ?? 'Pendiente de asignar' }}</strong>
                </div>
                <div class="mb-3">
                    <small class="text-muted d-block">Fecha Entrada</small>
                    <strong>{{ $orden->fecha_entrada->format('d/m/Y H:i') }}</strong>
                </div>
                @if($orden->fecha_salida)
                <div>
                    <small class="text-muted d-block">Fecha Salida</small>
                    <strong>{{ $orden->fecha_salida->format('d/m/Y H:i') }}</strong>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-light">
                <h6 class="mb-0">
                    <i class="bi bi-text-paragraph text-danger me-2"></i>Descripción
                </h6>
            </div>
            <div class="card-body">
                <p class="mb-0">{{ $orden->descripcion ?? '<span class="text-muted">Sin descripción</span>' }}</p>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
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
                                    <th class="text-end">Precio</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orden->servicios as $servicio)
                                <tr>
                                    <td>{{ $servicio->nombre }}</td>
                                    <td class="text-center">{{ $servicio->pivot->cantidad }}</td>
                                    <td class="text-end">{{ number_format($servicio->pivot->precio, 2) }} €</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <hr class="my-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <strong>Total:</strong>
                        <strong class="text-danger fs-5">
                            {{ number_format($orden->servicios->sum(fn($s) => $s->pivot->precio * $s->pivot->cantidad), 2) }} €
                        </strong>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection