<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if($user->isAdmin()){
                return redirect()->route('admin');
            }
            return redirect()->intended('home');
        } 
        return redirect()
                ->route('login-register')
                ->with(['errorLogin' => 'Email o contraseña incorrecta']);
        
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required',
            'email' => ['required', 'email', 'unique:usuario,email'],
            'tipo-usuario' => 'required',
            'pass' => 'required|confirmed',
        ]);

        Usuario::create([
            'nombre' => $validatedData['nombre'],
            'email' => $validatedData['email'],
            'pass' => bcrypt($validatedData['pass']),
            'id_tipo_usuario' => $validatedData['tipo-usuario'],
        ]);
        return redirect()
            ->route('login-register')
            ->with(['registerComplete' => 'Te has registrado exitosamente, ahora ingresa con tu cuenta']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login-register');
    }
}
