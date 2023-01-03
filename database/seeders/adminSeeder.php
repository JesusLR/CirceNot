<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Administrador;
use Spatie\Permission\Models\Role;
use DB;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Administrador::create([
            'cNombre' => 'Jesus',
            'cPrimerApellido' => 'Lira',
            'cSegundoApellido' => 'Romero',
            'email' => 'jesus@example.com',
            'password' => bcrypt('1234567'),
            'lActivo' => 1
        ])->assignRole('Administrador');
    }
}
