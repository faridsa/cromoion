<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1507083975EncuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('encuestas')) {
            Schema::create('encuestas', function (Blueprint $table) {
                $table->increments('id');
                $table->string('empresa')->nullable();
                $table->string('nombre')->nullable();
                $table->string('pais')->nullable();
                $table->string('atencion_rapidez')->nullable();
                $table->string('atencion_cortesia')->nullable();
                $table->string('atencion_solucion')->nullable();
                $table->string('servicio_cumplimiento_plazos_entrega')->nullable();
                $table->string('servicio_rapidez_asesoramiento')->nullable();
                $table->string('servicio_calidad_servicio_postventa')->nullable();
                $table->string('servicio_velocidad_respuesta')->nullable();
                $table->string('servicio_respuesta_ante_imprevistos')->nullable();
                $table->text('comentarios')->nullable();
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('encuestas');
    }
}
