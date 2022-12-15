<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Administrador;
use App\Models\PersonasAutorizadas;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class UsuariosController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function usuariosAdmin()
    {
        $roles = Role::orderBy('id', 'ASC')->get();
        $permisos = Permission::orderBy('id', 'ASC')->get();
        return view('admin.adminUsers', compact('roles', 'permisos'));
    }

    public function gridUsers()
    {
        try {
            $users = PersonasAutorizadas::select('*')->get();

            return $users;
        } catch (Exception $err) {
            $conexion->rollback();
            return response()->json([
                'lSuccess' => false,
                'cMensaje' => $err->getMessage(),
            ]);
        }
    }
    /***
     * Role: Busqueda vía id
     * -Opciones: Administrador (1), Usuario(2)
     * - Numeración (id): 1, 2
     * Permiso: Busqueda vía id
     * -Opciones: Notario(1), Jefe(2), Usuario(3)
     * -Numeracion (id): 1,2,3
     */
    public function createUser(Request $request)
    {
        try {

            $role = Role::findOrFail($request->permiso);
            $permiso = Permission::findOrFail($request->puesto);

            $usuario = PersonasAutorizadas::create([
                'cNombre' => strtoupper($request->nombre),
                'cPrimerApellido' => strtoupper($request->apellidoP),
                'cSegundoApellido' => strtoupper($request->apellidoM),
                'email' => $request->email,
                'emailDos' => $request->email2,
                'cUsuario' => strtoupper($request->usuario),
                'password' => bcrypt($request->password),
                'cCURP' => strtoupper($request->curp),
                'cRFC' => strtoupper($request->rfc),
                'iIDPermiso' => $request->permiso,
                'iIDPuesto' => $request->puesto,
                'iTelefono' => $request->telefono,
                'lActivo' => 1,
            ]);
            #Asignación de rol vía obtención de datos
            $usuario->assignRole($role);
            #Asignación de permiso vía obtención de datos
            $usuario->givePermissionTo($permiso);

            return response()->json([
                'lSuccess' => true,
                'cMensaje' => '¡El usuario ha sido creado con exito!',
            ]);
        } catch (Exception $err) {
            $conexion->rollback();
            return response()->json([
                'lSuccess' => false,
                'cMensaje' => $err->getMessage(),
            ]);
        }
    }

    public function editUser(Request $request)
    {
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

    public function updateUser(Request $request)
    {
        try {
            $estatus;
            if ($request->sts == 1) {
                $estatus = 1;
            } else {
                $estatus = 0;
            }

            PersonasAutorizadas::where('iIDPersonaAutorizada', $request->iIDPersonaAutorizada)->update([
                'cNombre' => $request->nombre,
                'cPrimerApellido' => $request->apellidoP,
                'cSegundoApellido' => $request->apellidoM,
                'email' => $request->email,
                'emailDos' => $request->email2,
                'cUsuario' => $request->usuario,
                'password' => bcrypt($request->password),
                'cCURP' => $request->curp,
                'cRFC' => $request->rfc,
                'iIDPermiso' => $request->permiso,
                'iIDPuesto' => $request->puesto,
                'iTelefono' => $request->telefono,
                'lActivo' => $estatus,
            ]);

            return response()->json([
                'lSuccess' => true,
                'cMensaje' => '¡El usuario se ha actualizado con exito!',
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
