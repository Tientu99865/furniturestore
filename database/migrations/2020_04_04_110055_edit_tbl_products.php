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
            $table->integer('import_price')->unsigned();
            $table->integer('img_id')->unsigned()->nullable();
            $table->foreign('img_id')->references('id')->on('gallery')->onDelete('cascade');
            $table->integer('manu_id')->unsigned()->nullable();
            $table->foreign('manu_id')->references('id')->on('manufacture')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::drop('products');
        Schema::enableForeignKeyConstraints();
    }
}
