<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1499053920ProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('manufacturer_id')->unsigned()->nullable();
                $table->foreign('manufacturer_id', '50086_5959bf5f792cf')->references('id')->on('manufacturers')->onDelete('cascade');
                
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('50086_5959bf5f792cf');
            $table->dropIndex('50086_5959bf5f792cf');
            $table->dropColumn('manufacturer_id');
            
        });

    }
}
