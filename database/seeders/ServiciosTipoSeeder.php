<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class ServiciosTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbServiciosTipo')->insert([
            'cNombre' => 'Certificacación de documentos',
            'lActivo' => true
        ]);
        DB::table('tbServiciosTipo')->insert([
            'cNombre' => 'Contratos',
            'lActivo' => true
        ]);
        DB::table('tbServiciosTipo')->insert([
            'cNombre' => 'Poderes',
            'lActivo' => true
        ]);
        DB::table('tbServiciosTipo')->insert([
            'cNombre' => 'Asamblea',
            'lActivo' => true
        ]);
        DB::table('tbServiciosTipo')->insert([
            'cNombre' => 'Actas Notariales',
            'lActivo' => true
        ]);
    }
}
