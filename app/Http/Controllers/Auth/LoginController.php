<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\PersonasAutorizadas;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    #Inicio sección de personas autorizadas
    public function userHome()
    {
        return view('autorizados.userHome');
    }
    public function vistaPersonaAutorizada()
    {
        return view('autorizados.auth.login');
    }

    public function loginPersonaAutorizada(Request $request)
    {
        $credenciales = $request->only(['email', 'password']);
        $personaAutorizada = PersonasAutorizadas::where('email', $request->email)->first();

        if (!is_null($personaAutorizada)) {
            if (Auth::guard('autorizados')->attempt($credenciales)) {
                $request->session()->regenerate();
                return redirect()->route('usuario_inicio_sesion');
            } else {
                return back()->with('err', 'USUARIO O CONTRASEÑA INCORRECTA. INTENTE NUEVAMENTE.');
            }
        } else {
            return back()->with('err', 'USUARIO NO ENCONTRADO');
        }
        try {


        } catch (\Throwable $th) {
            return back()->with('err', $th->getMessage());
        }
    }
    protected function guard()
    {
        return Auth::guard('autorizados');
    }
}
