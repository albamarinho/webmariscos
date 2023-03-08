<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rols')->insert([
            'key' => 'admin',
            'name' => 'Administrador de la web',
        ]);

        DB::table('rols')->insert([
            'key' => 'regular',
            'name' => 'Usuarios regulares de la web',
        ]);
    }
}
