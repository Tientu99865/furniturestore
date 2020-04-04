<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditTblInvoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            //
            $table->integer('id_customers')->unsigned();
            $table->foreign('id_customers')->references('id')->on('customers');
            $table->integer('id_invoice_details')->unsigned();
            $table->foreign('id_invoice_details')->references('id')->on('invoice_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoices', function (Blueprint $table) {
            //
            $table->dropColumn(['id_customers']);
            $table->dropColumn(['id_invoice_details']);
        });
    }
}
