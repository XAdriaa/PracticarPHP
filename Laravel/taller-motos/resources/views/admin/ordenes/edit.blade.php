@extends('layouts.app')

@section('content')
<h2>Editar Orden #{{ $orden->id }}</h2>

<form action="{{ route('admin.ordenes.update', $orden) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label>Mecánico</label>
        <select name="mecanico_id">
            <option value="">-- Sin asignar --</option>
            @foreach($mecanicos as $mecanico)
                <option value="{{ $mecanico->id }}"
                    {{ old('mecanico_id', $orden->mecanico_id) == $mecanico->id ? 'selected' : '' }}>
                    {{ $mecanico->nombre }} ({{ $mecanico->especialidad->nombre }})
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Estado</label>
        <select name="status" required>
            @foreach(['pendiente', 'reparando', 'listo', 'entregada'] as $estado)
                <option value="{{ $estado }}" {{ old('status', $orden->status) === $estado ? 'selected' : '' }}>
                    {{ ucfirst($estado) }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Descripción</label>
        <textarea name="descripcion">{{ old('descripcion', $orden->descripcion) }}</textarea>
    </div>

    <div>
        <label>Fecha salida</label>
        <input type="date" name="fecha_salida" value="{{ old('fecha_salida', $orden->fecha_salida) }}">
    </div>

    <h3>Servicios</h3>
    @foreach($servicios as $servicio)
    @php $enOrden = $orden->servicios->find($servicio->id); @endphp
    <div>
        <input type="checkbox" name="servicios[{{ $servicio->id }}][precio]"
               value="{{ $servicio->precio_base }}"
               {{ $enOrden ? 'checked' : '' }}>
        {{ $servicio->nombre }} — {{ number_format($servicio->precio_base, 2) }} €

        <input type="number" name="servicios[{{ $servicio->id }}][cantidad]"
               value="{{ $enOrden?->pivot->cantidad ?? 1 }}" min="1" style="width:60px">
    </div>
    @endforeach

    <button type="submit">Actualizar</button>
    <a href="{{ route('admin.ordenes.show', $orden) }}">Cancelar</a>
</form>
@endsection