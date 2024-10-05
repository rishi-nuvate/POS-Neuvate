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
        Schema::create('barcode_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barcode_id')->constrained('barcodes')->onDelete('cascade');
            $table->foreignId('sku_id')->constrained('product_variants')->onDelete('cascade');
            $table->integer('sku_quantity');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barcode_items');
    }
};
