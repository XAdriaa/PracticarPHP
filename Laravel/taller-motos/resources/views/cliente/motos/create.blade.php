@extends('layouts.app')

@section('content')
<h2>Añadir Moto</h2>

<form action="{{ route('cliente.motos.store') }}" method="POST">
    @csrf

    <div>
        <label>Marca</label>
        <select name="marca_id" required>
            <option value="">-- Selecciona --</option>
            @foreach($marcas as $marca)
                <option value="{{ $marca->id }}" {{ old('marca_id') == $marca->id ? 'selected' : '' }}>
                    {{ $marca->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Modelo</label>
        <input type="text" name="modelo" value="{{ old('modelo') }}" required maxlength="50">
    </div>

    <div>
        <label>Año</label>
        <input type="number" name="año" value="{{ old('año') }}" required min="1900" max="{{ date('Y') }}">
    </div>

    <div>
        <label>Matrícula</label>
        <input type="text" name="matricula" value="{{ old('matricula') }}" required maxlength="7">
    </div>

    <div>
        <label>Kilómetros</label>
        <input type="number" name="kilometros" value="{{ old('kilometros') }}" required min="0">
    </div>

    <button type="submit">Guardar</button>
    <a href="{{ route('cliente.motos.index') }}">Cancelar</a>
</form>
@endsection