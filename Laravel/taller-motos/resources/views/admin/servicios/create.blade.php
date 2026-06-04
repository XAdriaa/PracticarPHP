@extends('layouts.app')

@section('content')
<h2>Nuevo Servicio</h2>

<form action="{{ route('admin.servicios.store') }}" method="POST">
    @csrf

    <div>
        <label>Categoría</label>
        <select name="servicios_categoria_id" required>
            <option value="">-- Selecciona --</option>
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ old('servicios_categoria_id') == $categoria->id ? 'selected' : '' }}>
                    {{ $categoria->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre') }}" required maxlength="100">
    </div>

    <div>
        <label>Descripción</label>
        <textarea name="descripcion">{{ old('descripcion') }}</textarea>
    </div>

    <div>
        <label>Precio base (€)</label>
        <input type="number" name="precio_base" value="{{ old('precio_base') }}" step="0.01" min="0" required>
    </div>

    <button type="submit">Guardar</button>
    <a href="{{ route('admin.servicios.index') }}">Cancelar</a>
</form>
@endsection