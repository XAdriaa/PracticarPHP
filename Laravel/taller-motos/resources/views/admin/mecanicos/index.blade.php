@extends('layouts.app')

@section('content')
<h2>Mecánicos</h2>
<a href="{{ route('admin.mecanicos.create') }}">Nuevo Mecánico</a>

<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Especialidad</th>
            <th>Teléfono</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($mecanicos as $mecanico)
        <tr>
            <td>{{ $mecanico->nombre }}</td>
            <td>{{ $mecanico->especialidad->nombre }}</td>
            <td>{{ $mecanico->telefono ?? '-' }}</td>
            <td>
                <a href="{{ route('admin.mecanicos.edit', $mecanico) }}">Editar</a>

                <form action="{{ route('admin.mecanicos.destroy', $mecanico) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Eliminar mecánico?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection