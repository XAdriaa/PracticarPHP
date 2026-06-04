@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-warning text-dark">
                <h3 class="mb-0">Editar Orden #{{ $orden->id }}</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.ordenes.update', $orden) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Mecánico</label>
                        <select name="mecanico_id" class="form-select @error('mecanico_id') is-invalid @enderror">
                            <option value="">-- Sin asignar --</option>
                            @foreach($mecanicos as $mecanico)
                                <option value="{{ $mecanico->id }}"
                                    {{ old('mecanico_id', $orden->mecanico_id) == $mecanico->id ? 'selected' : '' }}>
                                    {{ $mecanico->nombre }} ({{ $mecanico->especialidad->nombre }})
                                </option>
                            @endforeach
                        </select>
                        @error('mecanico_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Estado</label>
                        <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                            <option value="">-- Selecciona --</option>
                            @foreach(['pendiente', 'reparando', 'listo', 'entregada'] as $estado)
                                <option value="{{ $estado }}" {{ old('status', $orden->status) === $estado ? 'selected' : '' }}>
                                    {{ ucfirst($estado) }}
                                </option>
                            @endforeach
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Descripción</label>
                        <textarea name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" rows="3">{{ old('descripcion', $orden->descripcion) }}</textarea>
                        @error('descripcion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Fecha salida</label>
                        <input type="date" name="fecha_salida" class="form-control @error('fecha_salida') is-invalid @enderror" value="{{ old('fecha_salida', $orden->fecha_salida) }}">
                        @error('fecha_salida')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <hr>
                    <h5 class="mb-3">Servicios</h5>
                    <div class="row">
                        @foreach($servicios as $servicio)
                        @php $enOrden = $orden->servicios->find($servicio->id); @endphp
                        <div class="col-md-6 mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="servicios[{{ $servicio->id }}][precio]"
                                       value="{{ $servicio->precio_base }}" id="servicio_{{ $servicio->id }}"
                                       {{ $enOrden ? 'checked' : '' }}>
                                <label class="form-check-label" for="servicio_{{ $servicio->id }}">
                                    {{ $servicio->nombre }} — {{ number_format($servicio->precio_base, 2) }} €
                                </label>
                            </div>
                            <input type="number" name="servicios[{{ $servicio->id }}][cantidad]"
                                   class="form-control form-control-sm mt-1"
                                   value="{{ $enOrden?->pivot->cantidad ?? 1 }}" min="1" style="max-width: 80px">
                        </div>
                        @endforeach
                    </div>

                    <hr>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('admin.ordenes.show', $orden) }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-warning">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection