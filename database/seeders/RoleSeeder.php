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
        Role::create(['name' => 'Administrador', 'guard_name' => 'admin']);
        Role::create(['name' => 'Usuario', 'guard_name' => 'auto']);
    }
}
