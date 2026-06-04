@extends('layouts.app')

@section('content')
<h2>Registro</h2>

<form action="{{ route('register.post') }}" method="POST">
    @csrf

    <div>
        <label>Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre') }}" required maxlength="20">
    </div>

    <div>
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
    </div>

    <div>
        <label>Teléfono</label>
        <input type="text" name="telefono" value="{{ old('telefono') }}" maxlength="9">
    </div>

    <div>
        <label>Contraseña</label>
        <input type="password" name="contraseña" required>
    </div>

    <div>
        <label>Confirmar contraseña</label>
        <input type="password" name="contraseña_confirmation" required>
    </div>

    <button type="submit">Registrarse</button>
</form>

<a href="{{ route('login') }}">¿Ya tienes cuenta? Inicia sesión</a>
@endsection