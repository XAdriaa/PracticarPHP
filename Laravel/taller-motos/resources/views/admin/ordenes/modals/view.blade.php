<div class="modal fade" id="viewOrdenModal-{{ $orden->id }}" tabindex="-1" aria-labelledby="viewOrdenModalLabel-{{ $orden->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="viewOrdenModalLabel-{{ $orden->id }}">Detalles de la Orden #{{ $orden->id }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Cliente:</strong> {{ $orden->moto->user->nombre }}</p>
                <p><strong>Moto:</strong> {{ $orden->moto->marca->nombre }} {{ $orden->moto->modelo }}</p>
                <p><strong>Mecánico:</strong>
                    @if($orden->mecanico)
                        {{ $orden->mecanico->nombre }}
                    @else
                        Sin asignar
                    @endif
                </p>
                <p><strong>Estado:</strong>
                    @switch($orden->status)
                        @case('pendiente')
                            <span class="badge bg-warning text-dark">Pendiente</span>
                            @break
                        @case('reparando')
                            <span class="badge bg-info">Reparando</span>
                            @break
                        @case('listo')
                            <span class="badge bg-success">Listo</span>
                            @break
                        @case('entregada')
                            <span class="badge bg-secondary">Entregada</span>
                            @break
                    @endswitch
                </p>
                <p><strong>Fecha Entrada:</strong> {{ (new DateTime($orden->fecha_entrada))->format('d/m/Y H:i') }}</p>
                @if($orden->fecha_salida)
                    <p><strong>Fecha Salida:</strong> {{ (new DateTime($orden->fecha_salida))->format('d/m/Y H:i') }}</p>
                @endif
                <p><strong>Descripción:</strong> {{ $orden->descripcion }}</p>
                <p><strong>Observaciones:</strong> {{ $orden->observaciones ?? 'N/A' }}</p>
                <p><strong>Precio Total:</strong> {{ $orden->precio_total ?? 'N/A' }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>