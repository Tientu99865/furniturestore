<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('transactions',function (Blueprint $table){
            $table->increments('id');
            $table->integer('code')->unsigned();
            $table->string('cusName',60);
            $table->string('cusEmail',60);
            $table->integer('cusPhone')->unsigned();
            $table->longText('cusAddress');
            $table->integer('pro_id')->unsigned();
            $table->foreign('pro_id')->references('id')->on('products');
            $table->integer('quantity')->unsigned();
            $table->decimal('subtotal',15,2);
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
        Schema::drop('transactions');
    }
}
