<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PersonasAutorizadas;
use DB;

class personaAutorizadaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('personas_autorizadas')->insert([
            'cNombre' => 'Rodrigo',
            'cPrimerApellido' => 'Diaz',
            'cSegundoApellido' => 'Serviran',
            'email' => 'rodrigo@example.com',
            'password' => bcrypt('1234567'),
        ]);
    }
}
