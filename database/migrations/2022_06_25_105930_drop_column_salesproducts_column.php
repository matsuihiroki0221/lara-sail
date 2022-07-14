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
        Schema::table('sales_products', function (Blueprint $table) {
            $table->dropForeign('sales_products_branch_id_foreign');
            $table->dropColumn('branch_id');
            $table->integer('status')->after('number_purchases')->default(1)->comment('注文数');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sales_products', function (Blueprint $table) {
            $table->foreignId('branch_id')->comment('支店ID')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->dropColumn('status');
        });
    }
};
