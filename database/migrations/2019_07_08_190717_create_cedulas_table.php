<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCedulasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cedulas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fechaDes');
            $table->date('fechaRep');
            $table->double('edad');
            $table->double('estatura');
            $table->double('peso');
            $table->string('apellidoPat');
            $table->string('apellidoMat');
            $table->string('nombres');
            $table->longText('mediaFil');
            $table->longText('vestimenta');
            $table->longText('señasPar');
            $table->longText('ultimoAvi');
            $table->string('nombreArch');
            $table->longText('numeroCed');
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
        Schema::dropIfExists('cedulas');
    }
}
