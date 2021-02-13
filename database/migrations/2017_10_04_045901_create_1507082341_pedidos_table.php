<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1507082341PedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('pedidos')) {
            Schema::create('pedidos', function (Blueprint $table) {
                $table->increments('id');
                $table->string('empresa')->nullable();
                $table->string('nombre')->nullable();
                $table->string('telefono')->nullable();
                $table->string('email')->nullable();
                $table->enum('tipo_de_producto', array('Equipo', 'Insumo', 'Reactivo'))->nullable();
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
        Schema::dropIfExists('pedidos');
    }
}
