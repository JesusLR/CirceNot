<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Administrador', 'guard_name' => 'admin'])->givePermissionTo(['Notario', 'Jefe']);
        Role::create(['name' => 'Notario', 'guard_name' => 'admin'])->givePermissionTo('Notario');
        Role::create(['name' => 'Abogado(a)', 'guard_name' => 'auto'])->givePermissionTo('Usuario');
        Role::create(['name' => 'Secreatario(a)', 'guard_name' => 'auto'])->givePermissionTo('Usuario');
    }
}
