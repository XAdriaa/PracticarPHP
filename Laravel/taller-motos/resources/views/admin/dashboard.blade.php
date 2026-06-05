@extends('layouts.app')

@section('content')
<div class="mb-5">
    <h1 class="d-flex align-items-center mb-4">
        <i class="bi bi-speedometer text-danger me-3"></i>Dashboard Administrativo
    </h1>
</div>

<div class="row g-4 mb-5">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm bg-gradient" style="border-left: 4px solid #dc3545;">
            <div class="card-body text-center">
                <i class="bi bi-clipboard-check text-danger" style="font-size: 2.5rem;"></i>
                <h6 class="card-title mt-3 mb-2 text-muted">Total Pedidos</h6>
                <h2 class="text-danger fw-bold">{{ $totalPedidos }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm" style="border-left: 4px solid #ffc107;">
            <div class="card-body text-center">
                <i class="bi bi-exclamation-triangle text-warning" style="font-size: 2.5rem;"></i>
                <h6 class="card-title mt-3 mb-2 text-muted">Pendientes</h6>
                <h2 class="text-warning fw-bold">{{ $pendientes }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm" style="border-left: 4px solid #0dcaf0;">
            <div class="card-body text-center">
                <i class="bi bi-tools text-info" style="font-size: 2.5rem;"></i>
                <h6 class="card-title mt-3 mb-2 text-muted">En Reparación</h6>
                <h2 class="text-info fw-bold">{{ $reparando }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm" style="border-left: 4px solid #198754;">
            <div class="card-body text-center">
                <i class="bi bi-person-badge text-success" style="font-size: 2.5rem;"></i>
                <h6 class="card-title mt-3 mb-2 text-muted">Mecánicos</h6>
                <h2 class="text-success fw-bold">{{ $totalMecanicos }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm" style="border-left: 4px solid #6c757d;">
            <div class="card-body text-center">
                <i class="bi bi-bicycle text-secondary" style="font-size: 2.5rem;"></i>
                <h6 class="card-title mt-3 mb-2 text-muted">Motos Registradas</h6>
                <h2 class="text-secondary fw-bold">{{ $totalMotos }}</h2>
            </div>
        </div>
    </div>
</div>
@endsection