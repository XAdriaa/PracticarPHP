@extends('layouts.app')

@section('content')
<h2>Dashboard</h2>

<div class="stats">
    <div>
        <h3>Total Pedidos</h3>
        <p>{{ $totalPedidos }}</p>
    </div>
    <div>
        <h3>Pendientes</h3>
        <p>{{ $pendientes }}</p>
    </div>
    <div>
        <h3>En Reparación</h3>
        <p>{{ $reparando }}</p>
    </div>
    <div>
        <h3>Mecánicos</h3>
        <p>{{ $totalMecanicos }}</p>
    </div>
    <div>
        <h3>Motos Registradas</h3>
        <p>{{ $totalMotos }}</p>
    </div>
</div>
@endsection