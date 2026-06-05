@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-success text-white text-center py-4">
                <h2 class="mb-0">
                    <i class="bi bi-person-plus"></i> Crear Cuenta
                </h2>
            </div>
            <div class="card-body p-5">
                <form action="{{ route('register.post') }}" method="POST" novalidate>
                    @csrf

                    <div class="mb-4">
                        <label class="form-label d-flex align-items-center">
                            <i class="bi bi-person me-2 text-success"></i> Nombre
                        </label>
                        <input type="text" name="nombre" class="form-control form-control-lg @error('nombre') is-invalid @enderror" 
                               value="{{ old('nombre') }}" placeholder="Tu nombre completo" required maxlength="20">
                        @error('nombre')
                            <div class="invalid-feedback d-block">
                                <i class="bi bi-exclamation-circle me-2"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label d-flex align-items-center">
                            <i class="bi bi-envelope me-2 text-success"></i> Email
                        </label>
                        <input type="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" 
                               value="{{ old('email') }}" placeholder="correo@ejemplo.com" required>
                        @error('email')
                            <div class="invalid-feedback d-block">
                                <i class="bi bi-exclamation-circle me-2"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label d-flex align-items-center">
                            <i class="bi bi-telephone me-2 text-success"></i> Teléfono
                        </label>
                        <input type="text" name="telefono" class="form-control form-control-lg @error('telefono') is-invalid @enderror" 
                               value="{{ old('telefono') }}" placeholder="+34 600 000 000" maxlength="9">
                        @error('telefono')
                            <div class="invalid-feedback d-block">
                                <i class="bi bi-exclamation-circle me-2"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label d-flex align-items-center">
                            <i class="bi bi-lock me-2 text-success"></i> Contraseña
                        </label>
                        <input type="password" name="contraseña" class="form-control form-control-lg @error('contraseña') is-invalid @enderror" 
                               placeholder="••••••••" required>
                        @error('contraseña')
                            <div class="invalid-feedback d-block">
                                <i class="bi bi-exclamation-circle me-2"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label d-flex align-items-center">
                            <i class="bi bi-lock-fill me-2 text-success"></i> Confirmar Contraseña
                        </label>
                        <input type="password" name="contraseña_confirmation" class="form-control form-control-lg @error('contraseña_confirmation') is-invalid @enderror" 
                               placeholder="••••••••" required>
                        @error('contraseña_confirmation')
                            <div class="invalid-feedback d-block">
                                <i class="bi bi-exclamation-circle me-2"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success btn-lg w-100 fw-bold mb-3">
                        <i class="bi bi-check-circle me-2"></i> Registrarse
                    </button>
                </form>

                <div class="text-center">
                    <p class="text-muted mb-0">¿Ya tienes cuenta?</p>
                    <a href="{{ route('login') }}" class="btn btn-link btn-sm text-decoration-none fw-bold">
                        Inicia sesión aquí
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection