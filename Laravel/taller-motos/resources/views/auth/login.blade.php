@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-danger text-white text-center py-4">
                <h2 class="mb-0">
                    <i class="bi bi-speedometer2"></i> Iniciar Sesión
                </h2>
            </div>
            <div class="card-body p-5">
                <form action="{{ route('login.post') }}" method="POST" novalidate>
                    @csrf

                    <div class="mb-4">
                        <label class="form-label d-flex align-items-center">
                            <i class="bi bi-envelope me-2 text-danger"></i> Email
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
                            <i class="bi bi-lock me-2 text-danger"></i> Contraseña
                        </label>
                        <input type="password" name="contraseña" class="form-control form-control-lg @error('contraseña') is-invalid @enderror" 
                               placeholder="••••••••" required>
                        @error('contraseña')
                            <div class="invalid-feedback d-block">
                                <i class="bi bi-exclamation-circle me-2"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-danger btn-lg w-100 fw-bold mb-3">
                        <i class="bi bi-box-arrow-in-right me-2"></i> Entrar
                    </button>
                </form>

                <div class="text-center">
                    <p class="text-muted mb-0">¿No tienes cuenta?</p>
                    <a href="{{ route('register') }}" class="btn btn-link btn-sm text-decoration-none fw-bold">
                        Regístrate aquí
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection