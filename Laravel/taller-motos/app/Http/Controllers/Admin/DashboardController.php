<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PedidoReparacion;
use App\Models\Mecanico;
use App\Models\Moto;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPedidos   = PedidoReparacion::count();
        $pendientes     = PedidoReparacion::where('status', 'pendiente')->count();
        $reparando      = PedidoReparacion::where('status', 'reparando')->count();
        $totalMecanicos = Mecanico::count();
        $totalMotos     = Moto::count();

        return view('admin.dashboard', compact(
            'totalPedidos', 'pendientes', 'reparando', 'totalMecanicos', 'totalMotos'
        ));
    }
}