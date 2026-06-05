@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card border-0 shadow-lg">
            <div class="card-header bg-primary text-white">
                <h2 class="mb-0">
                    <i class="bi bi-plus-circle me-2"></i>Nuevo Mecánico
                </h2>
            </div>
            <div class="card-body p-5">
                <form action="{{ route('admin.mecanicos.store') }}" method="POST" novalidate>
                    @csrf

                    <div class="mb-4">
                        <label class="form-label d-flex align-items-center">
                            <i class="bi bi-person text-primary me-2"></i> Nombre
                        </label>
                        <input type="text" name="nombre" class="form-control form-control-lg @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" placeholder="Juan Pérez" required maxlength="50">
                        @error('nombre')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label d-flex align-items-center">
                            <i class="bi bi-tools text-primary me-2"></i> Especialidad
                        </label>
                        <select name="especialidad_id" class="form-select form-select-lg @error('especialidad_id') is-invalid @enderror" required>
                            <option value="">-- Selecciona una especialidad --</option>
                            @foreach($especialidades as $especialidad)
                                <option value="{{ $especialidad->id }}" {{ old('especialidad_id') == $especialidad->id ? 'selected' : '' }}>
                                    {{ $especialidad->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('especialidad_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label d-flex align-items-center">
                            <i class="bi bi-telephone text-primary me-2"></i> Teléfono
                        </label>
                        <input type="text" name="telefono" class="form-control form-control-lg @error('telefono') is-invalid @enderror" value="{{ old('telefono') }}" placeholder="+34 600 000 000" maxlength="9">
                        @error('telefono')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg fw-bold">
                            <i class="bi bi-check-circle me-2"></i>Guardar Mecánico
                        </button>
                        <a href="{{ route('admin.mecanicos.index') }}" class="btn btn-light btn-lg">
                            <i class="bi bi-x-circle me-2"></i>Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection