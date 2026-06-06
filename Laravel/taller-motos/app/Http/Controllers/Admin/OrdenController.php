<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PedidoReparacion;
use App\Models\Mecanico;
use App\Models\Servicio;
use Illuminate\Http\Request;

class OrdenController extends Controller
{
    public function index()
    {
        $ordenes = PedidoReparacion::with(['moto.user', 'moto.marca', 'mecanico'])->get();
        $mecanicos = Mecanico::all();
        
        return view('admin.ordenes.index', compact('ordenes', 'mecanicos'));
    }

    public function show(PedidoReparacion $orden)
    {
        $orden->load(['moto.user', 'moto.marca', 'mecanico', 'servicios']);
        return view('admin.ordenes.show', compact('orden'));
    }

    public function edit(PedidoReparacion $orden)
    {
        $mecanicos = Mecanico::with('especialidad')->get();
        $servicios = Servicio::with('categoria')->get();
        $orden->load('servicios');
        return view('admin.ordenes.edit', compact('orden', 'mecanicos', 'servicios'));
    }

    public function update(Request $request, PedidoReparacion $orden)
    {
        $request->validate([
            'mecanico_id'  => 'nullable|exists:mecanicos,id',
            'status'       => 'required|in:pendiente,reparando,listo,entregada',
            'descripcion'  => 'nullable|string',
            'fecha_salida' => 'nullable|date|after_or_equal:fecha_entrada',
        ]);

        $orden->update($request->only('mecanico_id', 'status', 'descripcion', 'fecha_salida'));

        // Sincronizar servicios con cantidad y precio
        if ($request->has('servicios')) {
            $serviciosSync = [];
            foreach ($request->servicios as $servicioId => $datos) {
                $serviciosSync[$servicioId] = [
                    'cantidad' => $datos['cantidad'] ?? 1,
                    'precio'   => $datos['precio'],
                ];
            }
            $orden->servicios()->sync($serviciosSync);
        }

        return redirect()->route('admin.ordenes.show', $orden)->with('success', 'Orden actualizada correctamente.');
    }

    public function destroy(PedidoReparacion $orden)
    {
        $orden->delete();
        return redirect()->route('admin.ordenes.index')->with('success', 'Orden eliminada correctamente.');
    }
}