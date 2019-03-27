<?php

use Illuminate\Database\Seeder;
use notascole\Curso;
use notascole\Colegio;

class CursosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Curso::create([
            'grado'=>1,
            'paralelo'=>'B',
            'nivel'=>'Basico',
            'descripcion'=>'Primero de Básico - paralelo B',
            'estado'=>'A',
            'colegio_id' => 1
        ]);



    }
}
