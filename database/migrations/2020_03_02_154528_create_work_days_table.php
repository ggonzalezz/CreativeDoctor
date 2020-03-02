<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_days', function (Blueprint $table) {
            $table->increments('id');
            //day numero del dia, active estado del horario
            $table->unsignedSmallInteger('day');
            $table->boolean('active');

            //parametros de horario de la ma;ana
            $table->time('morning_start');
            $table->time('morning_end');

            //parametros de horario de la tarde
            $table->time('afternoon_start');
            $table->time('afternoon_end');
            //llave foranea a la tabla usuarios
            // Me generaba un problema usando unsignedBigInteger esta funcion 
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_days');
    }
}
