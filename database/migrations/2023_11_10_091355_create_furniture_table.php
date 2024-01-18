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
        Schema::create('furniture', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('material1_id');
            $table->unsignedBigInteger('material2_id');
            $table->unsignedBigInteger('material3_id');
            $table->unsignedBigInteger('material4_id');
            $table->string('sku')->unique();
            $table->string('name')->unique();
            $table->text('description');
            $table->unsignedInteger('length');
            $table->unsignedInteger('width');
            $table->unsignedInteger('height');
            $table->string('size');
            $table->string('keyword');
            $table->float('price');
            $table->enum('payment_options', ['dp', 'full'])->default('dp');
            $table->string('payment_terms')->default('dp 50%');
            $table->enum('delivery_terms', ['fob', 'exw'])->default('fob');
            $table->string('delivery_time');
            $table->string('lead_time');
            $table->enum('packing', ['corrugated paper', 'box'])->default('corrugated paper');
            $table->string('port')->default('Tanjung Emas');
            $table->string('certification')->default('V-Legal');
            $table->unsignedBigInteger('qty_per_month')->default(0);
            $table->unsignedBigInteger('moq')->default(0);
            $table->unsignedBigInteger('stock')->default(0);
            $table->boolean('convertible')->default(0);
            $table->boolean('adjustable')->default(0);
            $table->boolean('folded')->default(0);
            $table->boolean('extendable')->default(0);

            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('material1_id')->references('id')->on('material1')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('material2_id')->references('id')->on('material2')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('material3_id')->references('id')->on('material3')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('material4_id')->references('id')->on('material4')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('furniture');
    }
};
