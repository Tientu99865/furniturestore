<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnSellingPriceAndPromotedPriceInTblImportInvoice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('import_invoice', function (Blueprint $table) {
            //
            $table->decimal('selling_price', 15, 2)->unsigned();
            $table->decimal('promoted_price', 15, 2)->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('import_invoice', function (Blueprint $table) {
            //
            $table->dropColumn(['selling_price','promoted_price']);
        });
    }
}
