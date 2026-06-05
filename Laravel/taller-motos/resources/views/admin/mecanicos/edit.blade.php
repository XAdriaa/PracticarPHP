@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card border-0 shadow-lg">
            <div class="card-header bg-warning text-dark">
                <h2 class="mb-0">
                    <i class="bi bi-pencil-square me-2"></i>Editar Mecánico
                </h2>
            </div>
            <div class="card-body p-5">
                <form action="{{ route('admin.mecanicos.update', $mecanico) }}" method="POST" novalidate>
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="form-label d-flex align-items-center">
                            <i class="bi bi-person text-warning me-2"></i> Nombre
                        </label>
                        <input type="text" name="nombre" class="form-control form-control-lg @error('nombre') is-invalid @enderror" value="{{ old('nombre', $mecanico->nombre) }}" placeholder="Juan Pérez" required maxlength="50">
                        @error('nombre')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label d-flex align-items-center">
                            <i class="bi bi-tools text-warning me-2"></i> Especialidad
                        </label>
                        <select name="especialidad_id" class="form-select form-select-lg @error('especialidad_id') is-invalid @enderror" required>
                            <option value="">-- Selecciona una especialidad --</option>
                            @foreach($especialidades as $especialidad)
                                <option value="{{ $especialidad->id }}"
                                    {{ old('especialidad_id', $mecanico->especialidad_id) == $especialidad->id ? 'selected' : '' }}>
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
                            <i class="bi bi-telephone text-warning me-2"></i> Teléfono
                        </label>
                        <input type="text" name="telefono" class="form-control form-control-lg @error('telefono') is-invalid @enderror" value="{{ old('telefono', $mecanico->telefono) }}" placeholder="+34 600 000 000" maxlength="9">
                        @error('telefono')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-warning btn-lg fw-bold">
                            <i class="bi bi-check-circle me-2"></i>Actualizar Mecánico
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