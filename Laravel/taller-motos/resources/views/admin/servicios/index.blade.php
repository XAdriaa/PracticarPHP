@extends('layouts.app')

@section('content')
<h2>Servicios</h2>
<a href="{{ route('admin.servicios.create') }}">Nuevo Servicio</a>

<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Precio base</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($servicios as $servicio)
        <tr>
            <td>{{ $servicio->nombre }}</td>
            <td>{{ $servicio->categoria->nombre }}</td>
            <td>{{ number_format($servicio->precio_base, 2) }} €</td>
            <td>
                <a href="{{ route('admin.servicios.edit', $servicio) }}">Editar</a>

                <form action="{{ route('admin.servicios.destroy', $servicio) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Eliminar servicio?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection