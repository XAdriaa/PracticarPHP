<div class="modal fade" id="deleteOrdenModal-{{ $orden->id }}" tabindex="-1" aria-labelledby="deleteOrdenModalLabel-{{ $orden->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteOrdenModalLabel-{{ $orden->id }}">Eliminar Orden</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route(\'admin.ordenes.destroy\', $orden) }}" method="POST">
                @csrf
                @method(\'DELETE\')
                <div class="modal-body">
                    <p>¿Estás seguro de que quieres eliminar la orden #{{ $orden->id }}?</p>
                    <p>Esta acción no se puede deshacer.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>
