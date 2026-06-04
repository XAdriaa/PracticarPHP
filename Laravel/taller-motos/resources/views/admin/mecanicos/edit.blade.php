@extends('layouts.app')

@section('content')
<h2>Editar Mecánico</h2>

<form action="{{ route('admin.mecanicos.update', $mecanico) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label>Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre', $mecanico->nombre) }}" required maxlength="50">
    </div>

    <div>
        <label>Especialidad</label>
        <select name="especialidad_id" required>
            <option value="">-- Selecciona --</option>
            @foreach($especialidades as $especialidad)
                <option value="{{ $especialidad->id }}"
                    {{ old('especialidad_id', $mecanico->especialidad_id) == $especialidad->id ? 'selected' : '' }}>
                    {{ $especialidad->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Teléfono</label>
        <input type="text" name="telefono" value="{{ old('telefono', $mecanico->telefono) }}" maxlength="9">
    </div>

    <button type="submit">Actualizar</button>
    <a href="{{ route('admin.mecanicos.index') }}">Cancelar</a>
</form>
@endsection