@extends('layouts.app')

@section('content')
<h2>{{ $moto->marca->nombre }} {{ $moto->modelo }}</h2>

<p><strong>Matrícula:</strong> {{ $moto->matricula }}</p>
<p><strong>Año:</strong> {{ $moto->año }}</p>
<p><strong>Kilómetros:</strong> {{ number_format($moto->kilometros) }}</p>

<h3>Historial de reparaciones</h3>
@if($moto->pedidosReparacion->isEmpty())
    <p>Sin reparaciones.</p>
@else
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Estado</th>
                <th>Fecha entrada</th>
                <th>Fecha salida</th>
            </tr>
        </thead>
        <tbody>
            @foreach($moto->pedidosReparacion as $pedido)
            <tr>
                <td>{{ $pedido->id }}</td>
                <td>{{ ucfirst($pedido->status) }}</td>
                <td>{{ $pedido->fecha_entrada }}</td>
                <td>{{ $pedido->fecha_salida ?? 'Pendiente' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif

<a href="{{ route('cliente.motos.index') }}">Volver</a>
@endsection