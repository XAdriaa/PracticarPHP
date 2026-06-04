<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MecanicoController;
use App\Http\Controllers\Admin\ServicioController;
use App\Http\Controllers\Admin\MarcaController;
use App\Http\Controllers\Admin\OrdenController as AdminOrdenController;
use App\Http\Controllers\Cliente\MotoController;
use App\Http\Controllers\Cliente\OrdenController as ClienteOrdenController;

// ─── Rutas públicas ───────────────────────────────────────────
Route::get('/', fn() => redirect()->route('login'));

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ─── Rutas Cliente ────────────────────────────────────────────
Route::middleware(['auth', 'role:cliente'])->prefix('cliente')->name('cliente.')->group(function () {

    // Mis Motos
    Route::resource('motos', MotoController::class);

    // Mis Órdenes
    Route::resource('ordenes', ClienteOrdenController::class)->only(['index', 'create', 'store', 'show']);
});

// ─── Rutas Admin ──────────────────────────────────────────────
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Órdenes
    Route::resource('ordenes', AdminOrdenController::class)->parameters(['ordenes' => 'orden']);

    // Mecánicos
    Route::resource('mecanicos', MecanicoController::class);

    // Servicios
    Route::resource('servicios', ServicioController::class);

    // Marcas
    Route::resource('marcas', MarcaController::class);
});