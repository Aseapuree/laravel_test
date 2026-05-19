<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\Client;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function check(Request $request){
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:8'
        ]);

        // Verificar que el cliente exista y no esté eliminado antes de intentar login
        $client = Client::where('email', $request->email)->where('deleted', 0)->first();

        if (!$client || !Auth::guard('web')->attempt($credentials)) {
            return back()->withErrors([
                'email' => 'Correo electrónico o contraseña incorrecta'
            ]);
        }

        $request->session()->regenerate();
        return redirect()->intended(route('index'));
    }

    public function register(){
        return view('auth.register');
    }

    public function store(Request $request){
        $request->validate([
            'name'      => 'required',
            'last_name' => 'required',
            'document'  => [
                'required',
                Rule::unique('clients', 'document')->where(fn($q) => $q->where('deleted', 0)),
            ],
            'address'   => 'required',
            'phone'     => 'required',
            'email'     => [
                'required',
                'email',
                Rule::unique('clients', 'email')->where(fn($q) => $q->where('deleted', 0)),
            ],
            'password'  => 'required|min:8',
        ]);

        Client::create([
            'name'      => $request->name,
            'last_name' => $request->last_name,
            'document'  => $request->document,
            'address'   => $request->address,
            'phone'     => $request->phone,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
        ]);

        return redirect()->route('auth.login');
    }

    public function logout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('index');
    }
}
