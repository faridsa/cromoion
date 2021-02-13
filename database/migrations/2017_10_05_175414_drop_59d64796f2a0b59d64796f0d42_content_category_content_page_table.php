<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop59d64796f2a0b59d64796f0d42ContentCategoryContentPageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('content_category_content_page');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(! Schema::hasTable('content_category_content_page')) {
            Schema::create('content_category_content_page', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('content_category_id')->unsigned()->nullable();
            $table->foreign('content_category_id', 'fk_p_50080_50082_contentp_5959bdffda47e')->references('id')->on('content_categories');
                $table->integer('content_page_id')->unsigned()->nullable();
            $table->foreign('content_page_id', 'fk_p_50082_50080_contentc_5959bdffdab8e')->references('id')->on('content_pages');
                
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }
}
