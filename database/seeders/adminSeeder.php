<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Administrador;
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
        DB::table('administradors')->insert([
            'cNombre' => 'Jesus',
            'cPrimerApellido' => 'Lira',
            'cSegundoApellido' => 'Romero',
            'email' => 'jesus@example.com',
            'password' => bcrypt('1234567'),
        ]);
    }
}
