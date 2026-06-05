@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card border-0 shadow-lg">
            <div class="card-header bg-primary text-white">
                <h2 class="mb-0">
                    <i class="bi bi-plus-circle me-2"></i>Añadir Moto
                </h2>
            </div>
            <div class="card-body p-5">
                <form action="{{ route('cliente.motos.store') }}" method="POST" novalidate>
                    @csrf

                    <div class="mb-4">
                        <label class="form-label d-flex align-items-center">
                            <i class="bi bi-tag text-primary me-2"></i> Marca
                        </label>
                        <select name="marca_id" class="form-select form-select-lg @error('marca_id') is-invalid @enderror" required>
                            <option value="">-- Selecciona una marca --</option>
                            @foreach($marcas as $marca)
                                <option value="{{ $marca->id }}" {{ old('marca_id') == $marca->id ? 'selected' : '' }}>
                                    {{ $marca->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('marca_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label d-flex align-items-center">
                            <i class="bi bi-bicycle text-primary me-2"></i> Modelo
                        </label>
                        <input type="text" name="modelo" class="form-control form-control-lg @error('modelo') is-invalid @enderror" value="{{ old('modelo') }}" placeholder="Ej: CB500" required maxlength="50">
                        @error('modelo')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row mb-4">
                        <div class="col-6">
                            <label class="form-label d-flex align-items-center">
                                <i class="bi bi-calendar text-primary me-2"></i> Año
                            </label>
                            <input type="number" name="año" class="form-control form-control-lg @error('año') is-invalid @enderror" value="{{ old('año') }}" placeholder="2024" required min="1900" max="{{ date('Y') }}">
                            @error('año')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label class="form-label d-flex align-items-center">
                                <i class="bi bi-card-heading text-primary me-2"></i> Matrícula
                            </label>
                            <input type="text" name="matricula" class="form-control form-control-lg @error('matricula') is-invalid @enderror" value="{{ old('matricula') }}" placeholder="ABC1234" required maxlength="7">
                            @error('matricula')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label d-flex align-items-center">
                            <i class="bi bi-speedometer2 text-primary me-2"></i> Kilómetros
                        </label>
                        <input type="number" name="kilometros" class="form-control form-control-lg @error('kilometros') is-invalid @enderror" value="{{ old('kilometros') }}" placeholder="0" required min="0">
                        @error('kilometros')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg fw-bold">
                            <i class="bi bi-check-circle me-2"></i>Guardar Moto
                        </button>
                        <a href="{{ route('cliente.motos.index') }}" class="btn btn-light btn-lg">
                            <i class="bi bi-x-circle me-2"></i>Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection