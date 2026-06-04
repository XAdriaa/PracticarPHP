@extends('layouts.app')

@section('content')
<h2>Nueva Marca</h2>

<form action="{{ route('admin.marcas.store') }}" method="POST">
    @csrf

    <div>
        <label>Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre') }}" required maxlength="50">
    </div>

    <div>
        <label>País</label>
        <input type="text" name="pais" value="{{ old('pais') }}" maxlength="100">
    </div>

    <button type="submit">Guardar</button>
    <a href="{{ route('admin.marcas.index') }}">Cancelar</a>
</form>
@endsection