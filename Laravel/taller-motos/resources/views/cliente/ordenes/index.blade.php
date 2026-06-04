@extends('layouts.app')

@section('content')
<h2>Mis Órdenes</h2>
<a href="{{ route('cliente.ordenes.create') }}">Nueva Orden</a>

@if($ordenes->isEmpty())
    <p>No tienes órdenes registradas.</p>
@else
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Moto</th>
                <th>Estado</th>
                <th>Fecha entrada</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ordenes as $orden)
            <tr>
                <td>{{ $orden->id }}</td>
                <td>{{ $orden->moto->marca->nombre }} {{ $orden->moto->modelo }}</td>
                <td>{{ ucfirst($orden->status) }}</td>
                <td>{{ $orden->fecha_entrada }}</td>
                <td>
                    <a href="{{ route('cliente.ordenes.show', $orden) }}">Ver</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection