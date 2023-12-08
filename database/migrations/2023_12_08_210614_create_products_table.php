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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name', 100);
            $table->string('product_type', 100);
            $table->string('product_category', 100);
            $table->foreignId('employee_id')->references('id')->on('employees');
            $table->string('product_img', 255)->nullable();
            $table->enum('status', ['OUT_OF_STOCK', 'IN_STOCK'])->default('OUT_OF_STOCK');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
