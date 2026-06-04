@extends('layouts.app')

@section('content')
<h2>Iniciar sesión</h2>

<form action="{{ route('login.post') }}" method="POST">
    @csrf

    <div>
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
    </div>

    <div>
        <label>Contraseña</label>
        <input type="password" name="contraseña" required>
    </div>

    <button type="submit">Entrar</button>
</form>

<a href="{{ route('register') }}">¿No tienes cuenta? Regístrate</a>
@endsection