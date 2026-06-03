<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Servicio;
use App\Models\ServicioCategoria;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    public function index()
    {
        $servicios = Servicio::with('categoria')->get();
        return view('admin.servicios.index', compact('servicios'));
    }

    public function create()
    {
        $categorias = ServicioCategoria::all();
        return view('admin.servicios.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'servicios_categoria_id' => 'required|exists:servicios_categorias,id',
            'nombre'                 => 'required|string|max:100',
            'descripcion'            => 'nullable|string',
            'precio_base'            => 'required|numeric|min:0',
        ]);

        Servicio::create($request->all());

        return redirect()->route('admin.servicios.index')->with('success', 'Servicio creado correctamente.');
    }

    public function edit(Servicio $servicio)
    {
        $categorias = ServicioCategoria::all();
        return view('admin.servicios.edit', compact('servicio', 'categorias'));
    }

    public function update(Request $request, Servicio $servicio)
    {
        $request->validate([
            'servicios_categoria_id' => 'required|exists:servicios_categorias,id',
            'nombre'                 => 'required|string|max:100',
            'descripcion'            => 'nullable|string',
            'precio_base'            => 'required|numeric|min:0',
        ]);

        $servicio->update($request->all());

        return redirect()->route('admin.servicios.index')->with('success', 'Servicio actualizado correctamente.');
    }

    public function destroy(Servicio $servicio)
    {
        $servicio->delete();
        return redirect()->route('admin.servicios.index')->with('success', 'Servicio eliminado correctamente.');
    }
}