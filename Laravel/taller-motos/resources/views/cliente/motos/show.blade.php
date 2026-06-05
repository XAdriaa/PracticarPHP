@extends('layouts.app')

@section('content')
<div class="row justify-content-between align-items-start mb-5">
    <div class="col">
        <h1 class="d-flex align-items-center mb-0">
            <i class="bi bi-bicycle text-danger me-3"></i>
            {{ $moto->marca->nombre }} {{ $moto->modelo }}
        </h1>
    </div>
    <div class="col-auto">
        <a href="{{ route('cliente.motos.index') }}" class="btn btn-light">
            <i class="bi bi-arrow-left me-2"></i>Volver
        </a>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="card-title text-muted mb-0"><i class="bi bi-bicycle me-2"></i>Detalles</h6>
                    <a href="{{ route('cliente.motos.edit', $moto) }}" class="btn btn-sm btn-warning">
                        <i class="bi bi-pencil-square"></i> Editar
                    </a>
                </div>
                <hr>
                <div class="mb-3">
                    <small class="text-muted d-block">Matrícula</small>
                    <strong>{{ $moto->matricula }}</strong>
                </div>
                <div class="mb-3">
                    <small class="text-muted d-block">Año de Fabricación</small>
                    <strong>{{ $moto->año }}</strong>
                </div>
                <div class="mb-3">
                    <small class="text-muted d-block">Kilómetros</small>
                    <strong>{{ number_format($moto->kilometros) }} km</strong>
                </div>
                <div>
                    <small class="text-muted d-block">Marca</small>
                    <span class="badge bg-danger">{{ $moto->marca->nombre }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-light">
                <h5 class="mb-0">
                    <i class="bi bi-tools text-danger me-2"></i>Historial de Reparaciones
                </h5>
            </div>
            <div class="card-body">
                @if($moto->pedidosReparacion->isEmpty())
                    <div class="alert alert-info text-center py-4 mb-0">
                        <i class="bi bi-info-circle me-2"></i>
                        Sin reparaciones registradas aún
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead>
                                <tr class="border-bottom">
                                    <th><i class="bi bi-hash text-danger me-2"></i>#</th>
                                    <th><i class="bi bi-info-circle text-danger me-2"></i>Estado</th>
                                    <th><i class="bi bi-calendar text-danger me-2"></i>Fecha Entrada</th>
                                    <th><i class="bi bi-calendar-check text-danger me-2"></i>Fecha Salida</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($moto->pedidosReparacion as $pedido)
                                <tr>
                                    <td><span class="badge bg-danger">#{{ $pedido->id }}</span></td>
                                    <td>
                                        @php
                                            $statusClass = match($pedido->status) {
                                                'pendiente' => 'warning',
                                                'reparando' => 'info',
                                                'completado' => 'success',
                                                'cancelado' => 'danger',
                                                default => 'secondary'
                                            };
                                        @endphp
                                        <span class="badge bg-{{ $statusClass }}">{{ ucfirst($pedido->status) }}</span>
                                    </td>
                                    <td>{{ $pedido->fecha_entrada->format('d/m/Y H:i') }}</td>
                                    <td>
                                        @if($pedido->fecha_salida)
                                            {{ $pedido->fecha_salida->format('d/m/Y H:i') }}
                                        @else
                                            <span class="text-muted">Pendiente</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection