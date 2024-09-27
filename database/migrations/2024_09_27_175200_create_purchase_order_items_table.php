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
        Schema::create('purchase_order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('po_id')->constrained('purchase_orders'); // Assuming this references a purchase order table
            $table->string('sku_code');
            $table->text('description')->nullable();
            $table->integer('quantity');
            $table->decimal('amount', 11, 2); // 10 digits total, 2 decimal places
            $table->decimal('unit_price', 11, 2);
            $table->decimal('tax_amount', 11, 2)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_order_items');
    }
};
