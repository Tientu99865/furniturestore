<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblInvoiceDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('invoice_details',function (Blueprint $table){
           $table->increments('id');
           $table->integer('id_customers')->unsigned();
           $table->foreign('id_customers')->references('id')->on('customers');
           $table->integer('id_products')->unsigned();
           $table->foreign('id_products')->references('id')->on('products');
           $table->integer('amount')->unsigned();
           $table->integer('id_discount')->unsigned();
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
        Schema::drop('invoice_details');
    }
}
