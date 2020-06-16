<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblGallery extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('gallery',function (Blueprint $table){
           $table->increments('id');
           $table->integer('id_product')->unsigned();
           $table->foreign('id_product')->references('id')->on('products');
           $table->text('product_imgs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::disableForeignKeyConstraints();

        Schema::drop('gallery');
        Schema::enableForeignKeyConstraints();

    }
}
