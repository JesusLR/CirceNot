<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Administrador;
use App\Models\PersonasAutorizadas;
use App\Models\Gestoria;
use App\Models\GestoriaPatente;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Seccion ADMINISTRADOR
     */
    // public function vistaLoginAdmin()
    // {
    //     return view('admin.auth.login');
    // }

    public function adminHome(){
        return view('admin.adminHome');
    }

    public function userHome(){
        return view('autorizados.userHome');
    }

    public function loginAdministrador(Request $request)
    {
    //    $a =  Hash::make($request->password);
    //     dd($a);
        $credenciales = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $administrador = Administrador::where('email', $request->email)->first();

        if($administrador){
            if (Auth::guard('admin')->attempt($credenciales)) {
                $existeGestoria = Gestoria::select('*')->count();
                 $request->session()->regenerate();

                 if($existeGestoria > 0){
                    return redirect()->route('admin_vista_home');
                 }else{
                    return redirect()->route('administracion_gestoria');
                    // return redirect()->route('admin_vista_home');
                 }
                // return view('admin.adminHome');
            }else{
                // dd('USUARIO O CONTRASEÑA INCORRECTOS');
                return back()->with('err', 'USUARIO O CONTRASEÑA INCORRECTOS');
            }
        }else{
            return back()->with('err', 'USUARIO O CONTRASEÑA INCORRECTOS');
            // dd('USUARIO O CONTRASEÑA INCORRECTOS');
        }
    }

    /**
     * Seccion PERSONAS AUTORIZADAS
     */
    public function vistaPersonaAutorizada(){
        return view('autorizados.auth.login');
    }

    public function loginPersonaAutorizada(Request $request){
        // dd($request->all());
        $personaAutorizada = PersonasAutorizadas::where('email', $request->userInputLogAutorizado)->where('password', $request->passInputLogAutorizado)->first();
        // dd(isset($personaAutorizada));

        if(isset($personaAutorizada)){
            return redirect()->route('usuario_inicio_sesion');
        }else{
            return back()->with('err', 'USUARIO O CONTRASEÑA INCORRECTOS');
        }
    }


    // public function acceso()
    // {
    //     return view('auth.login');
    // }

    public function login(Request $request)
    {
        // $credentials = $request->only('email', 'password');
        // if (Auth::attempt($credentials)) {
            return view('admin.auth.login');
        // } else {
        //     dd('No esta autorizado');
        // }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        return redirect(route('admin.auth.login'));
    }
}
