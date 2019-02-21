<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnhioLectivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('anhiolectivo')->insert([
            'inicio' => 2019,
            'fin' => 2020,
            'descripcion' => '2019 - 2020',
            'enabled' => '*'
        ]);
    }
}
