<?php

use Illuminate\Database\Seeder;
use notascole\Calificacion;
use notascole\Curso;
use notascole\Asignatura;

class CalificacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $uno = 1;
        $dos = 2;
        $tres = 3;

        $cursos = Curso::find($uno);
        foreach($cursos->asignaturas as $asignatura)
        {

            Calificacion::create([
                'anho' => 2019,
                'curso_id' => $uno,
                'estudiante_id' => $uno,
                'asignatura_id' => $asignatura->id,
                'nota1' => 7.5,
                'estado' => 'A',
                'updatedbyuser' => 'seed'
            ]);
            Calificacion::create([
                'anho' => 2019,
                'curso_id' => $uno,
                'estudiante_id' => $dos,
                'asignatura_id' => $asignatura->id,
                'nota1' => 7.5,
                'estado' => 'A',
                'updatedbyuser' => 'seed'
            ]);
            Calificacion::create([
                'anho' => 2019,
                'curso_id' => $uno,
                'estudiante_id' => $tres,
                'asignatura_id' => $asignatura->id,
                'nota1' => 7.5,
                'estado' => 'A',
                'updatedbyuser' => 'seed'
            ]);
        }


    }
}
