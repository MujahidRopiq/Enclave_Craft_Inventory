<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stock_in', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('purchase_order_id');
            $table->unsignedBigInteger('furniture_id');
            $table->string('sku');
            $table->string('furniture_sku');
            $table->string('furniture_name');
            $table->unsignedFloat('furniture_price');
            $table->bigInteger('amount');
            $table->bigInteger('initial_stock');
            $table->bigInteger('final_stock');
            $table->unsignedFloat('total');

            $table->foreign('purchase_order_id')->references('id')->on('purchase_order')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_in');
    }
};
