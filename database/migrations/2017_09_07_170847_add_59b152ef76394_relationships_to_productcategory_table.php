<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add59b152ef76394RelationshipsToProductCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_categories', function(Blueprint $table) {
            if (!Schema::hasColumn('product_categories', 'parent_id')) {
                $table->integer('parent_id')->unsigned()->nullable();
                $table->foreign('parent_id', '50084_59b152ee8b93e')->references('id')->on('product_categories')->onDelete('cascade');
                }
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_categories', function(Blueprint $table) {
            
        });
    }
}
