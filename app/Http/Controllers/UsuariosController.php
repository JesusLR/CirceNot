<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\PersonasAutorizadas;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsuariosController extends Controller
{
    public function __construct()
    {
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
            $users = array();

            $autorizados = PersonasAutorizadas::select('*')->get();
            $admins = Administrador::where('id', '>', 1)->get();

            foreach($autorizados as $autorizado){
                $users[] = array(
                    "iIDPersonaAutorizada" => $autorizado->iIDPersonaAutorizada,
                    "cNombre" => $autorizado->cNombre,
                    "cPrimerApellido" => $autorizado->cPrimerApellido,
                    "cSegundoApellido" => $autorizado->cSegundoApellido,
                    "email" => $autorizado->email,
                    "emailDos" => $autorizado->emailDos,
                    "cUsuario" => $autorizado->cUsuario,
                    "password" => $autorizado->password,
                    "cCURP" => $autorizado->cCURP,
                    "cRFC" => $autorizado->cRFC,
                    "iIDPermiso" => $autorizado->iIDPermiso,
                    "iIDPuesto" => $autorizado->iIDPuesto,
                    "iTelefono" => $autorizado->iTelefono,
                    "lActivo" => $autorizado->lActivo,
                    "iTipo" => 2,
                );
            }

            foreach($admins as $admin){
                $users[] = array(
                    "iIDPersonaAutorizada" => $admin->id,
                    "cNombre" => $admin->cNombre,
                    "cPrimerApellido" => $admin->cPrimerApellido,
                    "cSegundoApellido" => $admin->cSegundoApellido,
                    "email" => $admin->email,
                    "emailDos" => $admin->emailDos,
                    "cUsuario" => $admin->cUsuario,
                    "password" => $admin->password,
                    "cCURP" => $admin->cCURP,
                    "cRFC" => $admin->cRFC,
                    "iIDPermiso" => 1,
                    "iIDPuesto" => 1,
                    "iTelefono" => $admin->iTelefono,
                    "lActivo" => $admin->lActivo,
                    "iTipo" => 1,
                );
            }

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
            /**
             * Parámetros para crear usuarios
             */
            $nombre = strtoupper($request->nombre);
            $apellidoP = strtoupper($request->apellidoP);
            $apellidoM = strtoupper($request->apellidoM);
            $correo = $request->email;
            $correoDos = $request->email2;
            $usuario = strtoupper($request->usuario);
            $password = bcrypt($request->password);
            $curp = strtoupper($request->curp);
            $rfc = strtoupper($request->rfc);
            $permiso = $request->permiso;
            $puesto = $request->puesto;
            $telefono = $request->telefono;

            switch ($role->name) {
                case 'Administrador':
                    $usuario = $this->createAdminUser($nombre, $apellidoP, $apellidoM, $correo, $correoDos, $usuario, $password, $curp, $rfc, $permiso, $puesto, $telefono);
                    break;
                case 'Notario':
                    $usuario = $this->createAdminUser($nombre, $apellidoP, $apellidoM, $correo, $correoDos, $usuario, $password, $curp, $rfc, $permiso, $puesto, $telefono);
                    break;
                case 'Abogado(a)':
                    $usuario = $this->createAuthorizedUser($nombre, $apellidoP, $apellidoM, $correo, $correoDos, $usuario, $password, $curp, $rfc, $permiso, $puesto, $telefono);
                    break;
                case 'Secreatario(a)':
                    $usuario = $this->createAuthorizedUser($nombre, $apellidoP, $apellidoM, $correo, $correoDos, $usuario, $password, $curp, $rfc, $permiso, $puesto, $telefono);
                    break;
            }

            #Asignación de rol vía obtención de datos
            $usuario->assignRole($role);
            #Asignación de permiso vía obtención de datos
            $usuario->givePermissionTo($permiso);

            return response()->json([
                'lSuccess' => true,
                'cMensaje' => '¡El usuario ha sido creado con éxito!',
            ]);
        } catch (Exception $err) {
            $conexion->rollback();
            return response()->json([
                'lSuccess' => false,
                'cMensaje' => $err->getMessage(),
            ]);
        }
    }
    public function createAdminUser($nombre, $apellidoP, $apellidoM, $correo, $correoDos, $usuario, $password, $curp, $rfc, $permiso, $puesto, $telefono)
    {
        $usuario = Administrador::create([
            'cNombre' => $nombre,
            'cPrimerApellido' => $apellidoP,
            'cSegundoApellido' => $apellidoM,
            'email' => $correo,
            'emailDos' => $correoDos,
            'cUsuario' => $usuario,
            'password' => $password,
            'cCURP' => $curp,
            'cRFC' => $rfc,
            'iTelefono' => $telefono,
            'lActivo' => 1,
        ]);
        return $usuario;
    }
    public function createAuthorizedUser($nombre, $apellidoP, $apellidoM, $correo, $correoDos, $usuario, $password, $curp, $rfc, $permiso, $puesto, $telefono)
    {
        $usuario = PersonasAutorizadas::create([
            'cNombre' => $nombre,
            'cPrimerApellido' => $apellidoP,
            'cSegundoApellido' => $apellidoM,
            'email' => $correo,
            'emailDos' => $correoDos,
            'cUsuario' => $usuario,
            'password' => $password,
            'cCURP' => $curp,
            'cRFC' => $rfc,
            'iIDPermiso' => $permiso,
            'iIDPuesto' => $puesto,
            'iTelefono' => $telefono,
            'lActivo' => 1,
        ]);
        return $usuario;
    }

    public function editUser(Request $request)
    {
        try {
            $usersEdit = array();
            if($request->iTipo == 1){
                $user = Administrador::where('id', $request->iIDPersonaAutorizada)->first();
            }else{
                $user = PersonasAutorizadas::where('iIDPersonaAutorizada', $request->iIDPersonaAutorizada)->first();
            }

            $usersEdit = array(
                "iIDPersonaAutorizada" => $request->iIDPersonaAutorizada,
                "cNombre" => $user->cNombre,
                "cPrimerApellido" => $user->cPrimerApellido,
                "cSegundoApellido" => $user->cSegundoApellido,
                "email" => $user->email,
                "emailDos" => $user->emailDos,
                "cUsuario" => $user->cUsuario,
                "password" => $user->password,
                "cCURP" => $user->cCURP,
                "cRFC" => $user->cRFC,
                "iIDPermiso" =>  ($request->iTipo == 1) ? 1 : $user->iIDPermiso,
                "iIDPuesto" =>  ($request->iTipo == 1) ? 1 : $user->iIDPuesto,
                "iTelefono" => $user->iTelefono,
                "lActivo" => $user->lActivo,
                "iTipo" => $request->iTipo,
            );
            // dd($usersEdit);
            return json_Encode($usersEdit);
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

            if($request->iTipo == 1){
                Administrador::where('id', $request->iIDPersonaAutorizada)->update([
                    'cNombre' => $request->nombre,
                    'cPrimerApellido' => $request->apellidoP,
                    'cSegundoApellido' => $request->apellidoM,
                    'email' => $request->email,
                    'emailDos' => $request->email2,
                    'cUsuario' => $request->usuario,
                    'password' => bcrypt($request->password),
                    'cCURP' => $request->curp,
                    'cRFC' => $request->rfc,
                    // 'iIDPermiso' => $request->permiso,
                    // 'iIDPuesto' => $request->puesto,
                    'iTelefono' => $request->telefono,
                    'lActivo' => $estatus,
                ]);
            }else{
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
            }

            return response()->json([
                'lSuccess' => true,
                'cMensaje' => '¡El usuario se ha actualizado con éxito!',
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
