<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function getLogin()
    {
        return view('admin.login');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->only('usuario', 'password');

        if (Auth::attempt($credentials)) {
             toastr()->success('Inicio de sesión correcto','Éxito');
            return redirect()->route('dashboard');
        }
        
        return back()->withInput()->withErrors(['usuario' => 'Las credenciales no son válidas.']);
        
    }

    public function logout()
    {
        Auth::logout();
         toastr()->success('Se ha cerrado sesión correctamente','Éxito');
        return redirect()->route('login');
    }
    
    
}
