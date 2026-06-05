@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card border-0 shadow-lg">
            <div class="card-header bg-warning text-dark">
                <h2 class="mb-0">
                    <i class="bi bi-pencil-square me-2"></i>Editar Servicio
                </h2>
            </div>
            <div class="card-body p-5">
                <form action="{{ route('admin.servicios.update', $servicio) }}" method="POST" novalidate>
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="form-label d-flex align-items-center">
                            <i class="bi bi-tag text-warning me-2"></i> Categoría
                        </label>
                        <select name="servicios_categoria_id" class="form-select form-select-lg @error('servicios_categoria_id') is-invalid @enderror" required>
                            <option value="">-- Selecciona una categoría --</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}"
                                    {{ old('servicios_categoria_id', $servicio->servicios_categoria_id) == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('servicios_categoria_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label d-flex align-items-center">
                            <i class="bi bi-tools text-warning me-2"></i> Nombre
                        </label>
                        <input type="text" name="nombre" class="form-control form-control-lg @error('nombre') is-invalid @enderror" value="{{ old('nombre', $servicio->nombre) }}" placeholder="Ej: Cambio de aceite" required maxlength="100">
                        @error('nombre')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label d-flex align-items-center">
                            <i class="bi bi-text-paragraph text-warning me-2"></i> Descripción
                        </label>
                        <textarea name="descripcion" class="form-control form-control-lg @error('descripcion') is-invalid @enderror" rows="3" placeholder="Describe el servicio...">{{ old('descripcion', $servicio->descripcion) }}</textarea>
                        @error('descripcion')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label d-flex align-items-center">
                            <i class="bi bi-currency-euro text-warning me-2"></i> Precio Base (€)
                        </label>
                        <input type="number" name="precio_base" class="form-control form-control-lg @error('precio_base') is-invalid @enderror" value="{{ old('precio_base', $servicio->precio_base) }}" placeholder="0.00" step="0.01" min="0" required>
                        @error('precio_base')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-warning btn-lg fw-bold">
                            <i class="bi bi-check-circle me-2"></i>Actualizar Servicio
                        </button>
                        <a href="{{ route('admin.servicios.index') }}" class="btn btn-light btn-lg">
                            <i class="bi bi-x-circle me-2"></i>Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection