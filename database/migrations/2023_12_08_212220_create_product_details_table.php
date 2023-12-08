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
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->decimal('weight');
            $table->decimal('quantity');
            $table->decimal('cost_price');
            $table->decimal('unit_price');
            $table->decimal('total_income');
            $table->decimal('profit_or_loss');
            $table->foreignId('employee_id')->references('id')->on('employees');
            $table->foreignId('product_id')->references('id')->on('products');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_details');
    }
};
