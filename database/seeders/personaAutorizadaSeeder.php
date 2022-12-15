<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PersonasAutorizadas;
use Spatie\Permission\Models\Role;
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
        PersonasAutorizadas::create([
            'cNombre' => 'Cosme',
            'cPrimerApellido' => 'Magaña',
            'cSegundoApellido' => 'Serviran',
            'email' => 'cosme@example.com',
            'emailDos' => 'cosme2@example.com',
            'cUsuario' => 'cosme.magana',
            'password' => bcrypt('1234567')
        ])->assignRole('Usuario');
    }
}
