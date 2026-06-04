@extends('layouts.app')

@section('content')
<h2>Orden #{{ $orden->id }}</h2>

<p><strong>Moto:</strong> {{ $orden->moto->marca->nombre }} {{ $orden->moto->modelo }} — {{ $orden->moto->matricula }}</p>
<p><strong>Estado:</strong> {{ ucfirst($orden->status) }}</p>
<p><strong>Mecánico:</strong> {{ $orden->mecanico?->nombre ?? 'Pendiente de asignar' }}</p>
<p><strong>Descripción:</strong> {{ $orden->descripcion ?? '-' }}</p>
<p><strong>Fecha entrada:</strong> {{ $orden->fecha_entrada }}</p>
<p><strong>Fecha salida:</strong> {{ $orden->fecha_salida ?? 'Pendiente' }}</p>

<h3>Servicios realizados</h3>
@if($orden->servicios->isEmpty())
    <p>Sin servicios añadidos todavía.</p>
@else
    <table>
        <thead>
            <tr>
                <th>Servicio</th>
                <th>Cantidad</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orden->servicios as $servicio)
            <tr>
                <td>{{ $servicio->nombre }}</td>
                <td>{{ $servicio->pivot->cantidad }}</td>
                <td>{{ number_format($servicio->pivot->precio, 2) }} €</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <p><strong>Total:</strong>
        {{ number_format($orden->servicios->sum(fn($s) => $s->pivot->precio * $s->pivot->cantidad), 2) }} €
    </p>
@endif

<a href="{{ route('cliente.ordenes.index') }}">Volver</a>
@endsection