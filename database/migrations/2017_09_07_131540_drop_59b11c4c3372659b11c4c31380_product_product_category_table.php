<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop59b11c4c3372659b11c4c31380ProductProductCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('product_product_category');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(! Schema::hasTable('product_product_category')) {
            Schema::create('product_product_category', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('product_id')->unsigned()->nullable();
            $table->foreign('product_id', 'fk_p_50086_50084_productc_5959be2072a01')->references('id')->on('products');
                $table->integer('product_category_id')->unsigned()->nullable();
            $table->foreign('product_category_id', 'fk_p_50084_50086_product__5959be2072275')->references('id')->on('product_categories');
                
                $table->timestamps();
                
            });
        }
    }
}
