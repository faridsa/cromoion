<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add59eb9638ab955RelationshipsToProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function(Blueprint $table) {
            if (!Schema::hasColumn('products', 'category_id')) {
                $table->integer('category_id')->unsigned()->nullable();
                $table->foreign('category_id', '50086_59b11c4c478d1')->references('id')->on('product_categories')->onDelete('cascade');
                }
                if (!Schema::hasColumn('products', 'manufacturer_id')) {
                $table->integer('manufacturer_id')->unsigned()->nullable();
                $table->foreign('manufacturer_id', '50086_5959bf5f792cf')->references('id')->on('manufacturers')->onDelete('cascade');
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
        Schema::table('products', function(Blueprint $table) {
            
        });
    }
}
