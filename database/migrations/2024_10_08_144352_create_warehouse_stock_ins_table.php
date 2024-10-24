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
        Schema::create('warehouse_stock_ins', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('warehouse_id')->constrained('central_warehouses')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('sku_id')->constrained('product_variants')->onDelete('cascade');
            $table->foreignId('po_id')->constrained('purchase_orders')->onDelete('cascade');
            $table->enum('description', ['import', 'single','bulk']);
            $table->enum('type', ['inward', 'outward']);
            $table->string('barcode_number')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouse_stock_ins');
    }
};
