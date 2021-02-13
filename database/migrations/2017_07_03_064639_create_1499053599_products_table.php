<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1499053599ProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('products')) {
            Schema::create('products', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->nullable();
                $table->string('slug')->nullable();
                $table->text('description')->nullable();
                $table->decimal('price', 15, 2)->nullable();
                $table->string('photo1')->nullable();
                $table->string('photo2')->nullable();
                $table->string('photo3')->nullable();
                $table->string('video')->nullable();
                $table->string('link')->nullable();
                $table->integer('visible')->nullable()->unsigned();     
                $table->string('pdf')->nullable();           
                $table->timestamps();
                
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
        Schema::dropIfExists('products');
    }
}
