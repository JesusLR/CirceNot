<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Administrador;
use App\Models\PersonasAutorizadas;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(adminSeeder::class);
        $this->call(personaAutorizadaSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
