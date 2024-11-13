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
        Schema::create('picker_allocation_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('picker_allocation_id')->constrained('picker_allocations');
            $table->foreignId('order_id')->constrained('stock_allocations')->cascadeOnDelete();
            $table->foreignId('product_id')->constrained('products');
            $table->integer('quantity')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('picker_allocation_products');
    }
};
