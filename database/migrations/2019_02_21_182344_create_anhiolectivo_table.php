<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnhiolectivoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anhiolectivos', function (Blueprint $table) {
            $table->smallInteger('inicio');
            $table->smallInteger('fin');
            $table->string('descripcion');
            $table->char('enabled',1)->default('-');

            $table->primary('inicio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anhiolectivos');
    }
}
