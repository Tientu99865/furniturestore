<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditTblProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            //
            $table->longText('content');
            $table->integer('amount')->unsigned()->nullable();
            $table->integer('img_id')->unsigned()->nullable();
            $table->foreign('img_id')->references('id')->on('gallery');
            $table->integer('manu_id')->unsigned()->nullable();
            $table->foreign('manu_id')->references('id')->on('manufacture');
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
            //
            $table->dropColumn(['content', 'amount','img_id', 'manu_id']);
        });
    }
}
