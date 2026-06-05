<div class="modal fade" id="editOrdenModal-{{ $orden->id }}" tabindex="-1" aria-labelledby="editOrdenModalLabel-{{ $orden->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning text-dark">
                <h5 class="modal-title" id="editOrdenModalLabel-{{ $orden->id }}">Editar Orden #{{ $orden->id }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.ordenes.update', $orden) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="cliente-{{ $orden->id }}" class="form-label">Cliente</label>
                        <input type="text" class="form-control" id="cliente-{{ $orden->id }}" value="{{ $orden->moto->user->nombre }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="moto-{{ $orden->id }}" class="form-label">Moto</label>
                        <input type="text" class="form-control" id="moto-{{ $orden->id }}" value="{{ $orden->moto->marca->nombre }} {{ $orden->moto->modelo }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="mecanico-{{ $orden->id }}" class="form-label">Mecánico</label>
                        <select class="form-select" id="mecanico-{{ $orden->id }}" name="mecanico_id">
                            <option value="">Sin asignar</option>
                            @foreach($mecanicos as $mecanico)
                                <option value="{{ $mecanico->id }}" {{ $orden->mecanico_id == $mecanico->id ? 'selected' : '' }}>
                                    {{ $mecanico->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status-{{ $orden->id }}" class="form-label">Estado</label>
                        <select class="form-select" id="status-{{ $orden->id }}" name="status">
                            <option value="pendiente" {{ $orden->status == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                            <option value="reparando" {{ $orden->status == 'reparando' ? 'selected' : '' }}>Reparando</option>
                            <option value="listo" {{ $orden->status == 'listo' ? 'selected' : '' }}>Listo</option>
                            <option value="entregada" {{ $orden->status == 'entregada' ? 'selected' : '' }}>Entregada</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="fecha_entrada-{{ $orden->id }}" class="form-label">Fecha Entrada</label>
                        <input type="datetime-local" class="form-control" id="fecha_entrada-{{ $orden->id }}" name="fecha_entrada"
                            value="{{ (new DateTime($orden->fecha_entrada))->format('Y-m-d\TH:i') }}">
                    </div>
                    <div class="mb-3">
                        <label for="fecha_salida-{{ $orden->id }}" class="form-label">Fecha Salida</label>
                        <input type="datetime-local" class="form-control" id="fecha_salida-{{ $orden->id }}" name="fecha_salida"
                            value="{{ $orden->fecha_salida ? (new DateTime($orden->fecha_salida))->format('Y-m-d\TH:i') : '' }}">
                    </div>
                    <div class="mb-3">
                        <label for="descripcion-{{ $orden->id }}" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion-{{ $orden->id }}" name="descripcion" rows="3">{{ $orden->descripcion }}</te