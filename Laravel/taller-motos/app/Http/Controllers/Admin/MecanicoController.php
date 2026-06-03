<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mecanico;
use App\Models\Especialidad;
use Illuminate\Http\Request;

class MecanicoController extends Controller
{
    public function index()
    {
        $mecanicos = Mecanico::with('especialidad')->get();
        return view('admin.mecanicos.index', compact('mecanicos'));
    }

    public function create()
    {
        $especialidades = Especialidad::all();
        return view('admin.mecanicos.create', compact('especialidades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'          => 'required|string|max:50',
            'especialidad_id' => 'required|exists:especialidades,id',
            'telefono'        => 'nullable|string|size:9',
        ]);

        Mecanico::create($request->all());

        return redirect()->route('admin.mecanicos.index')->with('success', 'Mecánico creado correctamente.');
    }

    public function edit(Mecanico $mecanico)
    {
        $especialidades = Especialidad::all();
        return view('admin.mecanicos.edit', compact('mecanico', 'especialidades'));
    }

    public function update(Request $request, Mecanico $mecanico)
    {
        $request->validate([
            'nombre'          => 'required|string|max:50',
            'especialidad_id' => 'required|exists:especialidades,id',
            'telefono'        => 'nullable|string|size:9',
        ]);

        $mecanico->update($request->all());

        return redirect()->route('admin.mecanicos.index')->with('success', 'Mecánico actualizado correctamente.');
    }

    public function destroy(Mecanico $mecanico)
    {
        $mecanico->delete();
        return redirect()->route('admin.mecanicos.index')->with('success', 'Mecánico eliminado correctamente.');
    }
}