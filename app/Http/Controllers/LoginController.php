<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Administrador;
use App\Models\PersonasAutorizadas;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:autorizados')->except('logout');
    }

    /**
     * Seccion ADMINISTRADOR
     */
    public function vistaLoginAdmin()
    {
        return view('admin.auth.login');
    }
    public function loginAdministrador(Request $request)
    {
        $credenciales = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $administrador = Administrador::where('email', $request->email)->first();

        if(!is_null($administrador)){
            if (Auth::guard('admin')->attempt($credenciales)) {
                $request->session()->regenerate();
                return redirect()->route('');
            }
        }
    }

    /**
     * Seccion PERSONAS AUTORIZADAS
     */
    public function vistaPersonaAutorizada(){
        return view('autorizados.auth.login');
    }
    public function loginPersonaAutorizada(Request $request){
        $credenciales = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $personaAutorizada = PersonasAutorizadas::where('email', $request->email)->first();
        if(!is_null($personaAutorizada)){
            if(Auth::guard('autorizados')->attempt($credenciales)){
                $request->session()->regenerate();
                return redirect()->route('');
            }
        }
    }


    public function acceso()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        } else {
            dd('No esta autorizado');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        return redirect(route('login'));
    }
}
