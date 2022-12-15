<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'Notario', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Jefe', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Usuario', 'guard_name' => 'auto']);
    }
}
