<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\PedidoReparacion;
use App\Models\Moto;
use Illuminate\Http\Request;

class OrdenController extends Controller
{
    public function index()
    {
        $ordenes = PedidoReparacion::whereHas('moto', function ($q) {
            $q->where('user_id', auth()->id());
        })->with(['moto.marca', 'mecanico'])->get();

        return view('cliente.ordenes.index', compact('ordenes'));
    }

    public function create()
    {
        $motos = auth()->user()->motos()->with('marca')->get();
        return view('cliente.ordenes.create', compact('motos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'moto_id'     => 'required|exists:motos,id',
            'descripcion' => 'nullable|string',
        ]);

        // Verificar que la moto pertenece al cliente
        $moto = Moto::findOrFail($request->moto_id);
        if ($moto->user_id !== auth()->id()) {
            abort(403);
        }

        PedidoReparacion::create([
            'moto_id'       => $request->moto_id,
            'descripcion'   => $request->descripcion,
            'fecha_entrada' => now()->toDateString(),
            'status'        => 'pendiente',
        ]);

        return redirect()->route('cliente.ordenes.index')->with('success', 'Orden creada correctamente.');
    }

    public function show(PedidoReparacion $orden)
    {
    // Verificar que la orden pertenece al usuario autenticado
    if ($orden->moto->user_id !== auth()->id()) {
        abort(403, 'Esta orden no te pertenece.');
    }

    $orden->load(['moto.user', 'moto.marca', 'mecanico', 'servicios']);
    return view('cliente.ordenes.show', compact('orden'));
    }
}