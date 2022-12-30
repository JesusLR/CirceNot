<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\PersonasAutorizadas;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        return view('admin.roles.index');
    }
    public function gridProfiles()
    {
        $profiles = Role::orderBy('id', 'asc')->get();
        return $profiles;
    }
    public function editProfilePermission($id)
    {
        try {
            $role = Role::findOrFail($id);
            $permissions = $role->permissions;
            $allPermissions = [];
            foreach ($permissions as $perm) {
                $allPermissions[] = $perm->name;
            }
            $permissionNotIncluded = Permission::whereNotIn('name', $allPermissions)->get();
            switch ($role->guard_name) {
                case 'admin':
                    $users = Administrador::role($role->name)->get();
                    break;
                case 'auto':
                    $users = PersonasAutorizadas::role($role->name)->get();
                    break;
            }

            return view('admin.roles.edit', compact('permissions', 'role', 'permissionNotIncluded', 'users'));
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'lSuccess' => false,
                'cMensaje' => $th->getMessage(),
            ]);
        }

    }
    public function updateProfilePermissions(Request $request, $roleId)
    {
        try {

            $role = Role::findOrFail($roleId);
            $role->revokePermissionTo($request->permisos);

            return back()->with('success', 'Se ha actualizado con extio el perfil de ' . $role->name);

        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('error', 'Se ha producido un error. Intente nuevamente.');
        }
    }
    public function assignProfilePermissions(Request $request, $roleId)
    {
        try {

            $role = Role::findOrFail($roleId);
            $role->givePermissionTo($request->permisos);

            return back()->with('success', 'Se ha actualizado con extio el perfil de ' . $role->name);

        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('error', $th->getMessage());
        }
    }

}
