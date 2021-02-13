<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1499077302EventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('eventos')) {
            Schema::create('eventos', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nombre')->nullable();
                $table->string('lugar')->nullable();
                $table->time('fecha')->nullable();
                $table->integer('publicado')->nullable()->unsigned();
                
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
        Schema::dropIfExists('eventos');
    }
}
