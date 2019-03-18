<?php

use Illuminate\Database\Seeder;
use notascole\Asignatura;
use notascole\Curso;

class AsignaturasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mate = Asignatura::create([
            'descripcion' => 'Matematicas',
            'estado' => 'A'
        ]);
        $lenguaje = Asignatura::create([
            'descripcion' => 'Lenguaje',
            'estado' => 'A'
        ]);
        $compu = Asignatura::create([
            'descripcion' => 'Computación',
            'estado' => 'A'
        ]);

        $curso = Curso::first();

        $curso->asignaturas()->attach($mate);
        $curso->asignaturas()->attach($lenguaje);
        $curso->asignaturas()->attach($compu);

    }
}
