<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Moto;
use App\Models\Marca;
use Illuminate\Http\Request;

class MotoController extends Controller
{
    public function index()
    {
        $motos = auth()->user()->motos()->with('marca')->get();
        return view('cliente.motos.index', compact('motos'));
    }

    public function create()
    {
        $marcas = Marca::all();
        return view('cliente.motos.create', compact('marcas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'marca_id'    => 'required|exists:marcas,id',
            'modelo'      => 'required|string|max:50',
            'año'         => 'required|integer|min:1900|max:' . date('Y'),
            'matricula'   => 'required|string|size:7|unique:motos',
            'kilometros'  => 'required|integer|min:0',
        ]);

        auth()->user()->motos()->create($request->all());

        return redirect()->route('cliente.motos.index')->with('success', 'Moto añadida correctamente.');
    }

    public function show(Moto $moto)
    {
        $this->autorizarMoto($moto);
        $moto->load(['marca', 'pedidosReparacion']);
        return view('cliente.motos.show', compact('moto'));
    }

    public function edit(Moto $moto)
    {
        $this->autorizarMoto($moto);
        $marcas = Marca::all();
        return view('cliente.motos.edit', compact('moto', 'marcas'));
    }

    public function update(Request $request, Moto $moto)
    {
        $this->autorizarMoto($moto);

        $request->validate([
            'marca_id'   => 'required|exists:marcas,id',
            'modelo'     => 'required|string|max:50',
            'año'        => 'required|integer|min:1900|max:' . date('Y'),
            'matricula'  => 'required|string|size:7|unique:motos,matricula,' . $moto->id,
            'kilometros' => 'required|integer|min:0',
        ]);

        $moto->update($request->all());

        return redirect()->route('cliente.motos.index')->with('success', 'Moto actualizada correctamente.');
    }

    public function destroy(Moto $moto)
    {
        $this->autorizarMoto($moto);
        $moto->delete();
        return redirect()->route('cliente.motos.index')->with('success', 'Moto eliminada correctamente.');
    }

    // Evita que un cliente acceda a motos de otro cliente
    private function autorizarMoto(Moto $moto): void
    {
        if ($moto->user_id !== auth()->id()) {
            abort(403, 'Esta moto no es tuya.');
        }
    }
}