@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Añadir Moto</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('cliente.motos.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Marca</label>
                        <select name="marca_id" class="form-select @error('marca_id') is-invalid @enderror" required>
                            <option value="">-- Selecciona --</option>
                            @foreach($marcas as $marca)
                                <option value="{{ $marca->id }}" {{ old('marca_id') == $marca->id ? 'selected' : '' }}>
                                    {{ $marca->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('marca_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Modelo</label>
                        <input type="text" name="modelo" class="form-control @error('modelo') is-invalid @enderror" value="{{ old('modelo') }}" required maxlength="50">
                        @error('modelo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Año</label>
                        <input type="number" name="año" class="form-control @error('año') is-invalid @enderror" value="{{ old('año') }}" required min="1900" max="{{ date('Y') }}">
                        @error('año')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Matrícula</label>
                        <input type="text" name="matricula" class="form-control @error('matricula') is-invalid @enderror" value="{{ old('matricula') }}" required maxlength="7">
                        @error('matricula')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kilómetros</label>
                        <input type="number" name="kilometros" class="form-control @error('kilometros') is-invalid @enderror" value="{{ old('kilometros') }}" required min="0">
                        @error('kilometros')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('cliente.motos.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection