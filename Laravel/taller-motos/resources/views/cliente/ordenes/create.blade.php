@extends('layouts.app')

@section('content')
<h2>Nueva Orden</h2>

@if($motos->isEmpty())
    <p>Primero debes <a href="{{ route('cliente.motos.create') }}">registrar una moto</a>.</p>
@else
    <form action="{{ route('cliente.ordenes.store') }}" method="POST">
        @csrf

        <div>
            <label>Moto</label>
            <select name="moto_id" required>
                <option value="">-- Selecciona --</option>
                @foreach($motos as $moto)
                    <option value="{{ $moto->id }}" {{ old('moto_id') == $moto->id ? 'selected' : '' }}>
                        {{ $moto->marca->nombre }} {{ $moto->modelo }} — {{ $moto->matricula }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Descripción del problema</label>
            <textarea name="descripcion">{{ old('descripcion') }}</textarea>
        </div>

        <button type="submit">Solicitar revisión</button>
        <a href="{{ route('cliente.ordenes.index') }}">Cancelar</a>
    </form>
@endif
@endsection