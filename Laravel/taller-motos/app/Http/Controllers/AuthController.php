<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credenciales = $request->validate([
            'email'     => 'required|email',
            'contraseña' => 'required',
        ]);

        if (Auth::attempt(['email' => $credenciales['email'], 'password' => $credenciales['contraseña']])) {
            $request->session()->regenerate();

            return auth()->user()->esAdmin()
                ? redirect()->route('admin.dashboard')
                : redirect()->route('cliente.motos.index');
        }

        return back()->withErrors(['email' => 'Credenciales incorrectas.']);
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $datos = $request->validate([
            'nombre'    => 'required|string|max:20',
            'email'     => 'required|email|unique:users',
            'contraseña' => 'required|min:6|confirmed',
            'telefono'  => 'nullable|string|size:9',
        ]);

        $user = User::create($datos);

        Auth::login($user);

        return redirect()->route('cliente.motos.index');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}