<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sales_details', function (Blueprint $table) {
            $table->dropColumn('total_amount');
            $table->dropColumn('total_tax_amount');
            $table->integer('deposit_amount')->nullable()->change();
            $table->integer('change')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sales_details', function (Blueprint $table) {
            $table->integer('total_amount')->comment('合計金額');
            $table->integer('total_tax_amount')->comment('合計消費税額');
        });
    }
};
