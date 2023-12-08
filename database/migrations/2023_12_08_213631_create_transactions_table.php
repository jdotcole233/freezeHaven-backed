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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->decimal('weight',10,2);
            $table->decimal('total_price',10,2);
            $table->decimal('amount_paid',10,2);
            $table->decimal('customer_balance',10,2);
            $table->foreignId('product_id')->references('id')->on('products');
            $table->foreignId('employee_id')->references('id')->on('employees');
            $table->foreignId('customer_id')->references('id')->on('customers');
            $table->enum('payment_method', ['CASH','MOBILEMONEY'])->default('CASH');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
