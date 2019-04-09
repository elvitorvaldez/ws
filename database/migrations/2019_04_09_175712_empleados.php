<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Empleados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('t_empleados', function (Blueprint $table) {
            $table->increments('id_t_usuarios');
            
            $table->string('nombre');
            $table->string('email');
            $table->string('puesto'); 
            $table->date('fecha_nac');
            $table->string('domicilio');
            $table->string('skill1');            
            $table->int('cal1');
            $table->string('skill2');            
            $table->int('cal2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('t_empleados', function (Blueprint $table) {
            //
        });
    }
}
