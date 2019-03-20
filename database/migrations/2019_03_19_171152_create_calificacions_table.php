<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalificacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('anho');
            $table->foreign('anho')->references('inicio')->on('anhiolectivos');
            $table->integer('curso_id')->unsigned();
            $table->foreign('curso_id')->references('id')->on('cursos');
            $table->integer('estudiante_id')->unsigned();
            $table->foreign('estudiante_id')->references('id')->on('estudiantes');
            $table->integer('asignatura_id')->unsigned();
            $table->foreign('asignatura_id')->references('id')->on('asignaturas');
            $table->decimal('nota',4,2);
            $table->char('estado',1);
            $table->timestamps();
            $table->string('updatedbyuser')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calificaciones');
    }
}
