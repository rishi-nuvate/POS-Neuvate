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
        Schema::create('stock_allocation_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stock_allocation_id')->constrained('stock_allocations');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->foreignId('sku_id')->constrained('product_variants');
            $table->string('quantity');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_allocation_products');
    }
};
