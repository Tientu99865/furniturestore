<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblImportInvoice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('import_invoice',function (Blueprint $table){
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('pro_id')->unsigned();
            $table->foreign('pro_id')->references('id')->on('products');
            $table->decimal('import_price', 15, 2)->unsigned();
            $table->integer('quantity')->unsigned();
            $table->decimal('total', 15, 2)->unsigned();
            $table->timestamps();
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
        Schema::drop('import_invoice');
        Schema::enableForeignKeyConstraints();
    }
}
