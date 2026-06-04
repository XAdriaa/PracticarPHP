@extends('layouts.app')

@section('content')
<h2>Editar Marca</h2>

<form action="{{ route('admin.marcas.update', $marca) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label>Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre', $marca->nombre) }}" required maxlength="50">
    </div>

    <div>
        <label>País</label>
        <input type="text" name="pais" value="{{ old('pais', $marca->pais) }}" maxlength="100">
    </div>

    <button type="submit">Actualizar</button>
    <a href="{{ route('admin.marcas.index') }}">Cancelar</a>
</form>
@endsection