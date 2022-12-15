<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\Gestoria;
use App\Models\PersonasAutorizadas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /***
     * Verificación de tipo de guard
     * guest: Invitado o en su caso de tipo admin o autorizados
     */
    // public function __construct()
    // {
    //     $this->middleware('guest:admin')->except('logout');
    // }
    #Sección administrativa
    public function login()
    {
        return view('admin.auth.login');
    }
    public function adminHome()
    {
        return view('admin.adminHome');
    }

    public function loginAdministrador(Request $request)
    {
        try {
            $credenciales = $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:6',
            ]);
            $administrador = Administrador::where('email', $request->email)->first();

            if ($administrador) {
                if (Auth::guard('admin')->attempt($credenciales)) {
                    $existeGestoria = Gestoria::select('*')->count();
                    $request->session()->regenerate();
                    if ($existeGestoria > 0) {
                        return redirect()->route('admin_vista_home');
                    } else {
                        return redirect()->route('administracion_gestoria');
                    }
                } else {
                    return back()->with('err', 'USUARIO O CONTRASEÑA INCORRECTOS');
                }
            } else {
                return back()->with('err', 'USUARIO O CONTRASEÑA INCORRECTOS');
            }
        } catch (Exception $err) {
            return response()->json([
                'lSuccess' => false,
                'cMensaje' => $err->getMessage(),
            ]);
        }
    }

    #Fin sección administrativa
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('admin_login_vista'));
    }
    protected function guard()
    {
        return Auth::guard('admin');
    }
}
