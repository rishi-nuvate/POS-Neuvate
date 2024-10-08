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
        Schema::create('warehouse_inventories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warehouse_id')->constrained('central_warehouses')->cascadeOnDelete();
            $table->unsignedBigInteger('product_id')->constrained('products')->cascadeOnDelete();
            $table->unsignedBigInteger('sku_id')->constrained('product_variants')->cascadeOnDelete();
            $table->string('good_inventory')->nullable();
            $table->string('bad_inventory')->nullable();
            $table->string('block_inventory')->nullable();
            $table->string('total_inventory')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouse_inventories');
    }
};
