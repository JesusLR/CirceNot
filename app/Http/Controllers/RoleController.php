<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Administrador;
use App\Models\PersonasAutorizadas;

class RoleController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    public function index(){
        return view('admin.roles.index');
    }
    public function gridProfiles(){
        $profiles = Role::orderBy('id', 'asc')->get();
        return $profiles;
    }
    public function editProfilePermission($id){

        $role = Role::findOrFail($id);
        $permissions = $role->permissions;
        $allPermissions = [];
        foreach ($permissions as $perm) {
            $allPermissions[] = $perm->name;
        }
        $permissionNotIncluded = Permission::whereNotIn('name', $allPermissions)->get();
        $adminUser = Administrador::role($role->name)->get();
        $userWithRole =PersonasAutorizadas::role($role->name)->get();
        return view('admin.roles.edit', compact('permissions', 'role', 'permissionNotIncluded', 'adminUser', 'userWithRole'));
    }

}
