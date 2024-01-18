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
        Schema::create('invoice', function (Blueprint $table) {
            $table->id();
            $table->string('no_invoice');
            $table->text('consignee');
            $table->text('detail_consignee');
            $table->text('terms_and_conditions');
            $table->string('no_po_buyer');
            $table->string('port_of_loading');
            $table->string('port_of_destination');
            // $table->date('deadline');
            $table->enum('status', ['Cancelled', 'in Progress', 'Finished'])->default('in Progress');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice');
    }
};
