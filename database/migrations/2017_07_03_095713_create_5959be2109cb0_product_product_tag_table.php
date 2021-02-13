<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5959be2109cb0ProductProductTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('product_product_tag')) {
            Schema::create('product_product_tag', function (Blueprint $table) {
                $table->integer('product_id')->unsigned()->nullable();
                $table->foreign('product_id', 'fk_p_50086_50085_productt_5959be2109d84')->references('id')->on('products')->onDelete('cascade');
                $table->integer('product_tag_id')->unsigned()->nullable();
                $table->foreign('product_tag_id', 'fk_p_50085_50086_product__5959be2109e0b')->references('id')->on('product_tags')->onDelete('cascade');
                
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
        Schema::dropIfExists('product_product_tag');
    }
}
