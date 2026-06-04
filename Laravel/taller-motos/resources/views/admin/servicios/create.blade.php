@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Nuevo Servicio</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.servicios.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Categoría</label>
                        <select name="servicios_categoria_id" class="form-select @error('servicios_categoria_id') is-invalid @enderror" required>
                            <option value="">-- Selecciona --</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ old('servicios_categoria_id') == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('servicios_categoria_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" required maxlength="100">
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Descripción</label>
                        <textarea name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" rows="3">{{ old('descripcion') }}</textarea>
                        @error('descripcion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Precio base (€)</label>
                        <input type="number" name="precio_base" class="form-control @error('precio_base') is-invalid @enderror" value="{{ old('precio_base') }}" step="0.01" min="0" required>
                        @error('precio_base')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('admin.servicios.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection