<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Administrador;
use App\Models\PersonasAutorizadas;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller{
    
    public function usuariosAdmin(){
        return view('admin.adminUsers');
    }

    public function gridUsers(){
        try {
           $p =  PersonasAutorizadas::select('*')->get();
            dd($p);
            
            return response()->json([
                'lSuccess' => true,
                'data' => $p,
            ]);
        } catch (Exception $err) {
            $conexion->rollback();
            return response()->json([
                'lSuccess' => false,
                'cMensaje' => $err->getMessage(),
            ]);
        }
    }
}
