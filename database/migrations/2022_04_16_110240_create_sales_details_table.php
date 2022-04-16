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
        Schema::create('sales_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->comment('支店情報ID')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('total_amount')->comment('合計金額');
            $table->integer('total_tax_amount')->comment('合計消費税額');
            $table->integer('total_number_purchases')->comment('合計点数');
            $table->integer('deposit_amount')->comment('預かり金額');
            $table->integer('change')->comment('お釣り');
            $table->dateTime('published_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('売上日時');
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
        Schema::dropIfExists('sales_details');
    }
};
