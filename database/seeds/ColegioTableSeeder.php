<?php

use Illuminate\Database\Seeder;
use notascole\Colegio;

class ColegioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Colegio::create([
            'descripcion'=>'La Salle',
            'formato'=>'T',
            'estado'=>'A'
        ]);

    }
}
