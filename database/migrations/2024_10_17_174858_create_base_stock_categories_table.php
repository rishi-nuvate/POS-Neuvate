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
        Schema::create('base_stock_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->constrained('store_generates')->cascadeOnDelete();
            $table->foreignId('cat_id')->constrained('categories')->cascadeOnDelete();
            $table->integer('cat_qty');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('base_stock_categories');
    }
};
