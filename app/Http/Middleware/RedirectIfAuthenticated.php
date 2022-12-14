<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Gestoria;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;
        foreach ($guards as $guard) {

            if (Auth::guard($guard)->check()) {
                if($guard == 'admin'){
                    $existeGestoria = Gestoria::select('*')->count();
                    if ($existeGestoria > 0) {
                        return redirect()->route('admin_vista_home');
                    } else {
                        return redirect()->route('administracion_gestoria');
                    }

                }else{
                    return redirect()->route('usuario_inicio_sesion');
                }

            }
        }
        return $next($request);
    }
}
