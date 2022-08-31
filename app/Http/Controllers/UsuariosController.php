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
           $users =  PersonasAutorizadas::select('*')->get();
            
            return $users;
        
        } catch (Exception $err) {
            $conexion->rollback();
            return response()->json([
                'lSuccess' => false,
                'cMensaje' => $err->getMessage(),
            ]);
        }
    }

    public function createUser(Request $request){
        try {
             
            PersonasAutorizadas::create([
                'cNombre' => $request->nombre,
                'cPrimerApellido' => $request->apellidoP,
                'cSegundoApellido' => $request->apellidoM,
                'email' => $request->email,
                'emailDos' => $request->email2,
                'cUsuario' => $request->usuario,
                'password' => $request->password,
                'cCURP' => $request->curp,
                'cRFC' => $request->rfc,
                'iIDPermiso' => $request->permiso,
                'iIDPuesto' => $request->puesto,
                'iTelefono' => $request->telefono,
                'lActivo' => 1,
                // 'iIDGestoria' 
            ]);

            return response()->json([
                'lSuccess' => true,
                'cMensaje' => 'Usuario creado con exito!',
            ]);
         
         } catch (Exception $err) {
             $conexion->rollback();
             return response()->json([
                 'lSuccess' => false,
                 'cMensaje' => $err->getMessage(),
             ]);
         }
    }

    public function editUser(Request $request){
        try {
             
            $user = PersonasAutorizadas::where('iIDPersonaAutorizada', $request->iIDPersonaAutorizada)->first();

            return $user;
         
         } catch (Exception $err) {
             $conexion->rollback();
             return response()->json([
                 'lSuccess' => false,
                 'cMensaje' => $err->getMessage(),
             ]);
         }
    }

    public function updateUser(Request $request){
        try {
             
            PersonasAutorizadas::where('iIDPersonaAutorizada', $request->iIDPersonaAutorizada)->update([
                'cNombre' => $request->nombre,
                'cPrimerApellido' => $request->apellidoP,
                'cSegundoApellido' => $request->apellidoM,
                'email' => $request->email,
                'emailDos' => $request->email2,
                'cUsuario' => $request->usuario,
                'password' => $request->password,
                'cCURP' => $request->curp,
                'cRFC' => $request->rfc,
                'iIDPermiso' => $request->permiso,
                'iIDPuesto' => $request->puesto,
                'iTelefono' => $request->telefono,
                'lActivo' => 1,
                // 'iIDGestoria' 
            ]);

            return response()->json([
                'lSuccess' => true,
                'cMensaje' => 'Usuario actualizado con exito!',
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
