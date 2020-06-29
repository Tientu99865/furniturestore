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
            $table->integer('invoice_id')->unsigned();
            $table->foreign('invoice_id')->references('id')->on('invoices');
           $table->integer('id_products')->unsigned();
           $table->foreign('id_products')->references('id')->on('products');
           $table->integer('quantity')->unsigned();
            $table->decimal('total', 15, 2)->unsigned();
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
        Schema::drop('invoice_details');
        Schema::enableForeignKeyConstraints();
    }
}
