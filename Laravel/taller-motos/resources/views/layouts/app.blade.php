<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taller de Motos</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav>
        <a href="#">Taller de Motos</a>

        @auth
            @if(auth()->user()->esAdmin())
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                <a href="{{ route('admin.ordenes.index') }}">Órdenes</a>
                <a href="{{ route('admin.mecanicos.index') }}">Mecánicos</a>
                <a href="{{ route('admin.servicios.index') }}">Servicios</a>
                <a href="{{ route('admin.marcas.index') }}">Marcas</a>
            @else
                <a href="{{ route('cliente.motos.index') }}">Mis Motos</a>
                <a href="{{ route('cliente.ordenes.index') }}">Mis Órdenes</a>
            @endif

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Cerrar sesión</button>
            </form>
        @endauth
    </nav>

    <main>
        {{-- Mensajes de éxito / error --}}
        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert-error">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>