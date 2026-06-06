<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function index()
    {
        $marcas = Marca::all();
        return view('admin.marcas.index', compact('marcas'));
    }

    public function create()
    {
        return view('admin.marcas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:50|unique:marcas',
            'pais'   => 'nullable|string|max:100',
        ]);

        Marca::create($request->all());

        return redirect()->route('admin.marcas.index')->with('success', 'Marca creada correctamente.');
    }

    public function edit(Marca $marca)
    {
        return view('admin.marcas.edit', compact('marca'));
    }

    public function update(Request $request, Marca $marca)
    {
        $request->validate([
            'nombre' => 'required|string|max:50|unique:marcas,nombre,' . $marca->id,
            'pais'   => 'nullable|string|max:100',
        ]);

        $marca->update($request->all());

        return redirect()->route('admin.marcas.index')->with('success', 'Marca actualizada correctamente.');
    }

    public function destroy(Marca $marca)
    {
    // Verificar si la marca tiene motos asociadas
    if ($marca->motos()->count() > 0) {
        return redirect()->route('admin.marcas.index')
            ->with('error', 'No se puede eliminar la marca "' . $marca->nombre . '" porque tiene ' . $marca->motos()->count() . ' moto(s) asignada(s).');
    }

    $marca->delete();
    return redirect()->route('admin.marcas.index')->with('success', 'Marca eliminada correctamente.');
    }
}