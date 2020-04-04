<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblContacts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('contacts',function (Blueprint $table){
           $table->increments('id');
           $table->integer('id_customer')->unsigned();
           $table->foreign('id_customer')->references('id')->on('customers');
           $table->longText('content');
           $table->boolean('status')->default('0');
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
        Schema::drop('contacts');
    }
}
