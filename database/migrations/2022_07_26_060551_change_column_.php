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
            $table->dropColumn('published_at');
            $table->dateTime('paid_at')->nullable();
        });
        Schema::table('sales_products', function (Blueprint $table) {
            $table->dropColumn('published_at');
            $table->dateTime('finished_at')->nullable();
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
            $table->dropColumn('paid_at');
            $table->dateTime('published_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('売上日時');
        });
        Schema::table('sales_products', function (Blueprint $table) {
            $table->dropColumn('finished_at');
            $table->dateTime('published_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('売上日時');
        });
    }
};
