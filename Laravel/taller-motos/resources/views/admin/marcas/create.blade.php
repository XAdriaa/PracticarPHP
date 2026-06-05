@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card border-0 shadow-lg">
            <div class="card-header bg-danger text-white">
                <h2 class="mb-0">
                    <i class="bi bi-plus-circle me-2"></i>Nueva Marca
                </h2>
            </div>
            <div class="card-body p-5">
                <form action="{{ route('admin.marcas.store') }}" method="POST" novalidate>
                    @csrf

                    <div class="mb-4">
                        <label class="form-label d-flex align-items-center">
                            <i class="bi bi-tag text-danger me-2"></i> Nombre
                        </label>
                        <input type="text" name="nombre" class="form-control form-control-lg @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" placeholder="Ej: Honda, Yamaha" required maxlength="50">
                        @error('nombre')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label d-flex align-items-center">
                            <i class="bi bi-geo-alt text-danger me-2"></i> País
                        </label>
                        <input type="text" name="pais" class="form-control form-control-lg @error('pais') is-invalid @enderror" value="{{ old('pais') }}" placeholder="Ej: Japón" maxlength="100">
                        @error('pais')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-danger btn-lg fw-bold">
                            <i class="bi bi-check-circle me-2"></i>Guardar Marca
                        </button>
                        <a href="{{ route('admin.marcas.index') }}" class="btn btn-light btn-lg">
                            <i class="bi bi-x-circle me-2"></i>Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection