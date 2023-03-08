<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MariscoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mariscos')->insert([
            'tipo' => 'Ameixa Fina',
            'cantidade' => 160,
            'custo_unitario' => 3,
            'fotografia' => 'fina',
        ]);

        DB::table('mariscos')->insert([
            'tipo' => 'Ameixa Japónica',
            'cantidade' => 200,
            'custo_unitario' => 3,
            'fotografia' => 'japonica',
        ]);

        DB::table('mariscos')->insert([
            'tipo' => 'Ameixa Babosa',
            'cantidade' => 350,
            'custo_unitario' => 3,
            'fotografia' => 'babosa',
        ]);

        DB::table('mariscos')->insert([
            'tipo' => 'Berberecho',
            'cantidade' => 100,
            'custo_unitario' => 3,
            'fotografia' => 'berberecho',
        ]);
    }
}
