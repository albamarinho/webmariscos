<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Alba',
            'surname' => 'Mariño',
            'dni' => '35631938Q',
            'enderezo' => 'rúa Redondo nº26, 1ºC',
            'email' => 'alba.marinho@yahoo.es',
            'password' => Hash::make('abc123.'),
            'tipo_compra' => 'envio',
            'rol_id' => '1',
        ]);
    }
}
