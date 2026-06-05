@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        @if($motos->isEmpty())
            <div class="card border-0 shadow-lg">
                <div class="card-body text-center py-5">
                    <i class="bi bi-bicycle" style="font-size: 3rem; color: #dc3545;"></i>
                    <h3 class="mt-3 mb-3">No tienes motos registradas</h3>
                    <p class="text-muted mb-4">Necesitas registrar una moto antes de crear una orden de reparación</p>
                    <a href="{{ route('cliente.motos.create') }}" class="btn btn-primary btn-lg">
                        <i class="bi bi-plus-circle me-2"></i>Registrar Moto
                    </a>
                </div>
            </div>
        @else
            <div class="card border-0 shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">
                        <i class="bi bi-plus-circle me-2"></i>Nueva Orden de Reparación
                    </h2>
                </div>
                <div class="card-body p-5">
                    <form action="{{ route('cliente.ordenes.store') }}" method="POST" novalidate>
                        @csrf

                        <div class="mb-4">
                            <label class="form-label d-flex align-items-center">
                                <i class="bi bi-bicycle text-primary me-2"></i> Selecciona tu Moto
                            </label>
                            <select name="moto_id" class="form-select form-select-lg @error('moto_id') is-invalid @enderror" required>
                                <option value="">-- Elige una moto --</option>
                                @foreach($motos as $moto)
                                    <option value="{{ $moto->id }}" {{ old('moto_id') == $moto->id ? 'selected' : '' }}>
                                        {{ $moto->marca->nombre }} {{ $moto->modelo }} — {{ $moto->matricula }}
                                    </option>
                                @endforeach
                            </select>
                            @error('moto_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label d-flex align-items-center">
                                <i class="bi bi-tools text-primary me-2"></i> Descripción del Problema
                            </label>
                            <textarea name="descripcion" class="form-control form-control-lg @error('descripcion') is-invalid @enderror" rows="4" placeholder="Describe el problema o los servicios que necesitas...">{{ old('descripcion') }}</textarea>
                            @error('descripcion')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg fw-bold">
                                <i class="bi bi-check-circle me-2"></i>Solicitar Reparación
                            </button>
                            <a href="{{ route('cliente.ordenes.index') }}" class="btn btn-light btn-lg">
                                <i class="bi bi-x-circle me-2"></i>Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection