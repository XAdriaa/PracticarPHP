@extends("layouts.app")

@section("content")
<div class="mb-5">
    <h1 class="d-flex align-items-center mb-0">
        <i class="bi bi-clipboard-check text-danger me-3"></i>Órdenes de Reparación
    </h1>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        @if($ordenes->isEmpty())
            <div class="alert alert-info text-center py-4">
                <i class="bi bi-info-circle me-2"></i>
                No hay órdenes registradas aún
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr class="border-bottom">
                            <th class="bg-light-subtle">
                                <i class="bi bi-hash text-danger me-2"></i>#
                            </th>
                            <th class="bg-light-subtle">
                                <i class="bi bi-person text-danger me-2"></i>Cliente
                            </th>
                            <th class="bg-light-subtle">
                                <i class="bi bi-bicycle text-danger me-2"></i>Moto
                            </th>
                            <th class="bg-light-subtle">
                                <i class="bi bi-person-badge text-danger me-2"></i>Mecánico
                            </th>
                            <th class="bg-light-subtle">
                                <i class="bi bi-info-circle text-danger me-2"></i>Estado
                            </th>
                            <th class="bg-light-subtle">
                                <i class="bi bi-calendar text-danger me-2"></i>Fecha Entrada
                            </th>
                            <th class="bg-light-subtle text-center">
                                <i class="bi bi-gear text-danger me-2"></i>Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($ordenes as $orden)
                        <tr>
                            <td><span class="badge bg-danger">#{{ $orden->id }}</span></td>
                            <td>{{ $orden->moto->user->nombre }}</td>
                            <td>{{ $orden->moto->marca->nombre }} {{ $orden->moto->modelo }}</td>
                            <td>
                                @if($orden->mecanico)
                                    <span class="badge bg-light text-dark">{{ $orden->mecanico->nombre }}</span>
                                @else
                                    <span class="text-muted">Sin asignar</span>
                                @endif
                            </td>
                            <td>
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
                            </td>
                            <td>{{ (new DateTime($orden->fecha_entrada))->format('d/m/Y H:i') }}</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-info me-2" data-bs-toggle="modal" data-bs-target="#viewOrdenModal-{{ $orden->id }}">
                                    <i class="bi bi-eye"></i> Ver
                                </button>
                                <button type="button" class="btn btn-sm btn-warning me-2" data-bs-toggle="modal" data-bs-target="#editOrdenModal-{{ $orden->id }}">
                                    <i class="bi bi-pencil-square"></i> Editar
                                </button>
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteOrdenModal-{{ $orden->id }}">
                                    <i class="bi bi-trash"></i> Eliminar
                                </button>

                                @include('admin.ordenes.modals.view')
                                @include('admin.ordenes.modals.edit')
                                @include('admin.ordenes.modals.delete')
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">
                                No hay órdenes registradas
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection