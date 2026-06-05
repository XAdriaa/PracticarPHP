<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taller de Motos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #dc3545;
            --dark-bg: #1a1a1a;
            --light-gray: #f8f9fa;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Instrument Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background-color: var(--light-gray);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Navbar Mejorada */
        .navbar {
            background: linear-gradient(135deg, var(--dark-bg) 0%, #2d2d2d 100%) !important;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
            border-bottom: 3px solid var(--primary-color);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: white !important;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .navbar-brand:hover {
            color: var(--primary-color) !important;
            transition: color 0.3s ease;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.85) !important;
            font-weight: 500;
            transition: color 0.3s ease;
            margin-left: 0.5rem;
        }

        .nav-link:hover {
            color: var(--primary-color) !important;
        }

        .nav-link.active {
            color: var(--primary-color) !important;
            border-bottom: 2px solid var(--primary-color);
        }

        /* Main Content */
        main {
            flex: 1;
            padding: 2rem 0;
        }

        .container {
            max-width: 1200px;
        }

        /* Alerts */
        .alert {
            border: none;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            animation: slideIn 0.3s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }

        /* Tarjetas / Cards */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, #c82333 100%) !important;
            border: none;
            color: white !important;
            font-weight: 600;
            padding: 1.5rem;
        }

        .card-body {
            padding: 1.5rem;
        }

        .card-footer {
            background-color: var(--light-gray);
            border: none;
            padding: 1rem 1.5rem;
        }

        /* Tablas */
        .table {
            margin-bottom: 0;
            background-color: white;
        }

        .table-dark {
            background: linear-gradient(135deg, var(--dark-bg) 0%, #2d2d2d 100%) !important;
        }

        .table thead {
            font-weight: 600;
        }

        .table tbody tr {
            border-bottom: 1px solid #e9ecef;
            transition: background-color 0.2s ease;
        }

        .table tbody tr:hover {
            background-color: var(--light-gray);
        }

        /* Botones */
        .btn {
            border: none;
            border-radius: 6px;
            font-weight: 600;
            padding: 0.6rem 1.2rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background-color: #c82333;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
        }

        .btn-warning {
            background-color: #ffc107;
            color: #000;
        }

        .btn-warning:hover {
            background-color: #e0a800;
            color: #000;
        }

        .btn-info {
            background-color: #0dcaf0;
            color: #000;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn-danger:hover {
            background-color: #bb2d3b;
            color: white;
        }

        .btn-success {
            background-color: #198754;
            color: white;
        }

        .btn-success:hover {
            background-color: #157347;
            color: white;
        }

        .btn-sm {
            padding: 0.4rem 0.8rem;
            font-size: 0.875rem;
        }

        /* Formularios */
        .form-control,
        .form-select {
            border-radius: 6px;
            border: 1px solid #ddd;
            padding: 0.75rem;
            font-size: 1rem;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
        }

        .form-label {
            font-weight: 600;
            color: #333;
            margin-bottom: 0.5rem;
        }

        .is-invalid {
            border-color: #dc3545 !important;
        }

        .invalid-feedback {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        /* Footer */
        footer {
            background: linear-gradient(135deg, var(--dark-bg) 0%, #2d2d2d 100%);
            color: rgba(255, 255, 255, 0.85);
            border-top: 3px solid var(--primary-color);
            margin-top: auto;
        }

        footer p {
            font-size: 0.95rem;
        }

        /* Utilidades */
        h1, h2, h3, h4, h5, h6 {
            color: var(--dark-bg);
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .text-muted {
            color: #6c757d !important;
        }

        .d-flex {
            display: flex;
        }

        .justify-content-between {
            justify-content: space-between;
        }

        .align-items-center {
            align-items: center;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.25rem;
            }

            .container {
                padding-left: 1rem;
                padding-right: 1rem;
            }

            .table {
                font-size: 0.9rem;
            }

            .btn-sm {
                padding: 0.3rem 0.6rem;
                font-size: 0.75rem;
            }
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="bi bi-speedometer2"></i> Taller de Motos
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @auth
                        @if(auth()->user()->esAdmin())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                    <i class="bi bi-speedometer"></i> Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.ordenes.index') }}">
                                    <i class="bi bi-clipboard-check"></i> Órdenes
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.mecanicos.index') }}">
                                    <i class="bi bi-person-badge"></i> Mecánicos
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.servicios.index') }}">
                                    <i class="bi bi-tools"></i> Servicios
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.marcas.index') }}">
                                    <i class="bi bi-tag"></i> Marcas
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('cliente.motos.index') }}">
                                    <i class="bi bi-bicycle"></i> Mis Motos
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('cliente.ordenes.index') }}">
                                    <i class="bi bi-receipt"></i> Mis Órdenes
                                </a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link text-white">
                                    <i class="bi bi-box-arrow-right"></i> Cerrar sesión
                                </button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="container">
            {{-- Mensajes de éxito / error --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle"></i>
                    <strong>¡Éxito!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-circle"></i>
                    <strong>¡Error!</strong>
                    <ul class="mb-0 ms-3 mt-2">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <footer class="text-white text-center py-4">
        <p class="mb-0">
            <i class="bi bi-c-circle"></i> 2026 Taller de Motos - Todos los derechos reservados
        </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>