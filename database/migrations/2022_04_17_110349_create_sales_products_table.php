<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->comment('支店ID')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('sales_detail_id')->comment('売上明細ID')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('basic_product_information_id')->comment('商品マスタID')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->dateTime('published_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('売上日時');
            $table->integer('number_purchases')->comment('購入点数');
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
        Schema::dropIfExists('sales_products');
    }
};
