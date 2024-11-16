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
        Schema::create('grn_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('grn_id')->constrained('grns');
            $table->foreignId('po_item_parameter_id')->constrained('purchase_order_item_parameters')->cascadeOnDelete();
            $table->foreignId('sku_id')->constrained('product_variants')->cascadeOnDelete();
            $table->string('received_quantity')->nullable();
            $table->enum('quality_check', ['good', 'bad'])->default('bad');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grn_items');
    }
};
