@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-info text-white">
                <h3 class="mb-0">Orden #{{ $orden->id }}</h3>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <p class="mb-2"><strong>Cliente:</strong> {{ $orden->moto->user->nombre }}</p>
                        <p class="mb-2"><strong>Moto:</strong> {{ $orden->moto->marca->nombre }} {{ $orden->moto->modelo }}</p>
                        <p class="mb-2"><strong>Matrícula:</strong> {{ $orden->moto->matricula }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-2"><strong>Mecánico:</strong> {{ $orden->mecanico?->nombre ?? '<span class="text-muted">Sin asignar</span>' }}</p>
                        <p class="mb-2">
                            <strong>Estado:</strong>
                            @switch($orden->status)
                                @case('pendiente')
                                    <span class="badge bg-warning text-dark">Pendiente</span>
                                    @break
                                @case('reparando')
                                    <span class="badge bg-info">Reparando</span>
                                    @break
                                @case('listo')
                                    <span class="badge bg-success">Listo</span>
                                    @break
                                @case('entregada')
                                    <span class="badge bg-secondary">Entregada</span>
                                    @break
                            @endswitch
                        </p>
                    </div>
                </div>

                <p class="mb-2"><strong>Fecha entrada:</strong> {{ $orden->fecha_entrada }}</p>
                <p class="mb-2"><strong>Fecha salida:</strong> {{ $orden->fecha_salida ?? '<span class="text-muted">Pendiente</span>' }}</p>
                <p><strong>Descripción:</strong></p>
                <p class="text-muted">{{ $orden->descripcion ?? 'Sin descripción' }}</p>

                <hr>
                <h5>Servicios realizados</h5>
                @if($orden->servicios->isEmpty())
                    <div class="alert alert-info">Sin servicios añadidos.</div>
                @else
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead class="table-light">
                                <tr>
                                    <th>Servicio</th>
                                    <th class="text-center">Cantidad</th>
                                    <th class="text-end">Precio</th>
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
                                <tr class="table-active">
                                    <td colspan="3" class="text-end"><strong>Total:</strong></td>
                                    <td class="text-end"><strong>{{ number_format($orden->servicios->sum(fn($s) => $s->pivot->precio * $s->pivot->cantidad), 2) }} €</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.ordenes.edit', $orden) }}" class="btn btn-warning">Editar</a>
                <a href="{{ route('admin.ordenes.index') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </div>
</div>
@endsection