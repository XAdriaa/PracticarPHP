@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-5">
    <h1 class="d-flex align-items-center mb-0">
        <i class="bi bi-receipt text-danger me-3"></i>Mis Órdenes
    </h1>
    <a href="{{ route('cliente.ordenes.create') }}" class="btn btn-primary btn-lg">
        <i class="bi bi-plus-circle me-2"></i>Nueva Órden
    </a>
</div>

@if($ordenes->isEmpty())
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="alert alert-info text-center py-5 mb-0">
                <i class="bi bi-info-circle" style="font-size: 2.5rem;"></i>
                <h5 class="mt-3 mb-2">No tienes órdenes registradas</h5>
                <p class="text-muted mb-0">Crea una nueva orden de reparación para tu moto</p>
            </div>
        </div>
    </div>
@else
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr class="border-bottom">
                            <th class="bg-light-subtle">
                                <i class="bi bi-hash text-danger me-2"></i>#
                            </th>
                            <th class="bg-light-subtle">
                                <i class="bi bi-bicycle text-danger me-2"></i>Moto
                            </th>
                            <th class="bg-light-subtle">
                                <i class="bi bi-info-circle text-danger me-2"></i>Estado
                            </th>
                            <th class="bg-light-subtle">
                                <i class="bi bi-calendar text-danger me-2"></i>Fecha Entrada
                            </th>
                            <th class="bg-light-subtle text-center">
                                <i class="bi bi-gear text-danger me-2"></i>Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ordenes as $orden)
                        <tr>
                            <td><span class="badge bg-danger">{{ $orden->id }}</span></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-bicycle text-muted me-2"></i>
                                    {{ $orden->moto->marca->nombre }} {{ $orden->moto->modelo }}
                                </div>
                            </td>
                            <td>
                                @php
                                    $statusClass = match($orden->status) {
                                        'pendiente' => 'warning',
                                        'reparando' => 'info',
                                        'completado' => 'success',
                                        'cancelado' => 'danger',
                                        default => 'secondary'
                                    };
                                @endphp
                                <span class="badge bg-{{ $statusClass }}">{{ ucfirst($orden->status) }}</span>
                            </td>
                            <td>{{ $orden->fecha_entrada->format('d/m/Y H:i') }}</td>
                            <td class="text-center">
                                <a href="{{ route('cliente.ordenes.show', $orden) }}" class="btn btn-sm btn-info">
                                    <i class="bi bi-eye me-2"></i>Ver Detalles
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endif
@endsection