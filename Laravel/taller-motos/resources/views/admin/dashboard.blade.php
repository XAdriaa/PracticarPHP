@extends('layouts.app')

@section('content')
<h2 class="mb-4">Dashboard Administrativo</h2>

<div class="row">
    <div class="col-md-4 mb-3">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Total Pedidos</h5>
                <h3 class="text-primary">{{ $totalPedidos }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Pendientes</h5>
                <h3 class="text-warning">{{ $pendientes }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">En Reparación</h5>
                <h3 class="text-info">{{ $reparando }}</h3>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-3">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Mecánicos</h5>
                <h3 class="text-success">{{ $totalMecanicos }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Motos Registradas</h5>
                <h3 class="text-secondary">{{ $totalMotos }}</h3>
            </div>
        </div>
    </div>
</div>
@endsection