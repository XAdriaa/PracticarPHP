@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card border-0 shadow-lg">
            <div class="card-header bg-warning text-dark">
                <h2 class="mb-0">
                    <i class="bi bi-pencil-square me-2"></i>Órden #{{ $orden->id }}
                </h2>
            </div>
            <div class="card-body p-5">
                <form action="{{ route('admin.ordenes.update', $orden) }}" method="POST" novalidate>
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label d-flex align-items-center">
                                <i class="bi bi-person-badge text-warning me-2"></i> Mecánico
                            </label>
                            <select name="mecanico_id" class="form-select form-select-lg @error('mecanico_id') is-invalid @enderror">
                                <option value="">-- Sin asignar --</option>
                                @foreach($mecanicos as $mecanico)
                                    <option value="{{ $mecanico->id }}"
                                        {{ old('mecanico_id', $orden->mecanico_id) == $mecanico->id ? 'selected' : '' }}>
                                        {{ $mecanico->nombre }} ({{ $mecanico->especialidad->nombre }})
                                    </option>
                                @endforeach
                            </select>
                            @error('mecanico_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="form-label d-flex align-items-center">
                                <i class="bi bi-info-circle text-warning me-2"></i> Estado
                            </label>
                            <select name="status" class="form-select form-select-lg @error('status') is-invalid @enderror" required>
                                <option value="">-- Selecciona --</option>
                                @foreach(['pendiente', 'reparando', 'listo', 'entregada'] as $estado)
                                    <option value="{{ $estado }}" {{ old('status', $orden->status) === $estado ? 'selected' : '' }}>
                                        {{ ucfirst($estado) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('status')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label d-flex align-items-center">
                            <i class="bi bi-text-paragraph text-warning me-2"></i> Descripción
                        </label>
                        <textarea name="descripcion" class="form-control form-control-lg @error('descripcion') is-invalid @enderror" rows="3">{{ old('descripcion', $orden->descripcion) }}</textarea>
                        @error('descripcion')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label d-flex align-items-center">
                            <i class="bi bi-calendar-check text-warning me-2"></i> Fecha Salida
                        </label>
                        <input type="date" name="fecha_salida" class="form-control form-control-lg @error('fecha_salida') is-invalid @enderror" value="{{ old('fecha_salida', $orden->fecha_salida) }}">
                        @error('fecha_salida')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <hr class="my-4">
                    <h5 class="mb-4">
                        <i class="bi bi-tools text-warning me-2"></i>Servicios
                    </h5>

                    <div class="row">
                        @foreach($servicios as $servicio)
                        @php $enOrden = $orden->servicios->find($servicio->id); @endphp
                        <div class="col-md-6 mb-3">
                            <div class="form-check p-3 border rounded">
                                <input class="form-check-input" type="checkbox" name="servicios[{{ $servicio->id }}][precio]"
                                       value="{{ $servicio->precio_base }}" id="servicio_{{ $servicio->id }}"
                                       {{ $enOrden ? 'checked' : '' }}>
                                <label class="form-check-label fw-500" for="servicio_{{ $servicio->id }}">
                                    {{ $servicio->nombre }}
                                </label>
                                <div class="text-muted small">{{ number_format($servicio->precio_base, 2) }} €</div>
                            </div>
                            <input type="number" name="servicios[{{ $servicio->id }}][cantidad]"
                                   class="form-control form-control-sm mt-2" placeholder="Cantidad"
                                   value="{{ $enOrden?->pivot->cantidad ?? 1 }}" min="1" style="max-width: 100px">
                        </div>
                        @endforeach
                    </div>

                    <hr class="my-4">
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-warning btn-lg fw-bold">
                            <i class="bi bi-check-circle me-2"></i>Actualizar Orden
                        </button>
                        <a href="{{ route('admin.ordenes.show', $orden) }}" class="btn btn-light btn-lg">
                            <i class="bi bi-x-circle me-2"></i>Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection