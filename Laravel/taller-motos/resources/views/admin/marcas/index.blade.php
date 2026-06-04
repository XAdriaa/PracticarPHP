@extends('layouts.app')

@section('content')
<h2>Marcas</h2>
<a href="{{ route('admin.marcas.create') }}">Nueva Marca</a>

<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>País</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($marcas as $marca)
        <tr>
            <td>{{ $marca->nombre }}</td>
            <td>{{ $marca->pais ?? '-' }}</td>
            <td>
                <a href="{{ route('admin.marcas.edit', $marca) }}">Editar</a>

                <form action="{{ route('admin.marcas.destroy', $marca) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Eliminar marca?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection