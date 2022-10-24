<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRitaAnexos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anexos_rita', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('rita_id')->unsigned();
            $table->string('radicado',40)->comment("Numero de radicado Unico");
            $table->string('titulo',100)->comment("titulo del documento");
            $table->string('nombre_archivo',100)->comment("nombre del archivo");
            $table->string('ruta',500)->comment("Ruta del documento");
            $table->timestamps();
        });

        Schema::table('anexos_rita', function (Blueprint $table) {
            $table->foreign('rita_id')->references('id')->on('rita');
            $table->index('rita_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anexos_rita');
    }
}
