@extends('layouts.app')

@section('content')
<h2>Editar Moto</h2>

<form action="{{ route('cliente.motos.update', $moto) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label>Marca</label>
        <select name="marca_id" required>
            <option value="">-- Selecciona --</option>
            @foreach($marcas as $marca)
                <option value="{{ $marca->id }}" {{ old('marca_id', $moto->marca_id) == $marca->id ? 'selected' : '' }}>
                    {{ $marca->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Modelo</label>
        <input type="text" name="modelo" value="{{ old('modelo', $moto->modelo) }}" required maxlength="50">
    </div>

    <div>
        <label>Año</label>
        <input type="number" name="año" value="{{ old('año', $moto->año) }}" required min="1900" max="{{ date('Y') }}">
    </div>

    <div>
        <label>Matrícula</label>
        <input type="text" name="matricula" value="{{ old('matricula', $moto->matricula) }}" required maxlength="7">
    </div>

    <div>
        <label>Kilómetros</label>
        <input type="number" name="kilometros" value="{{ old('kilometros', $moto->kilometros) }}" required min="0">
    </div>

    <button type="submit">Actualizar</button>
    <a href="{{ route('cliente.motos.index') }}">Cancelar</a>
</form>
@endsection