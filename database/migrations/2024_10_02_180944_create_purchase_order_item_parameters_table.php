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
        Schema::create('purchase_order_item_parameters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('po_id')->constrained('purchase_orders');
            $table->foreignId('po_item_id')->constrained('purchase_order_items');
            $table->string('item_sku');
            $table->string('item_color')->nullable();
            $table->string('item_size')->nullable();
            $table->integer('item_qty')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_order_item_parameters');
    }
};
