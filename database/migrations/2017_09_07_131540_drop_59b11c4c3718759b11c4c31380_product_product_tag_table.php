<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop59b11c4c3718759b11c4c31380ProductProductTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('product_product_tag');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(! Schema::hasTable('product_product_tag')) {
            Schema::create('product_product_tag', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('product_id')->unsigned()->nullable();
            $table->foreign('product_id', 'fk_p_50086_50085_productt_5959be20f392c')->references('id')->on('products');
                $table->integer('product_tag_id')->unsigned()->nullable();
            $table->foreign('product_tag_id', 'fk_p_50085_50086_product__5959be20f31a1')->references('id')->on('product_tags');
                
                $table->timestamps();
                
            });
        }
    }
}
