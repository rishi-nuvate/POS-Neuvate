<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('picker_allocations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('stock_allocations')->cascadeOnDelete();
            $table->foreignId('store_id')->constrained('store_generates')->cascadeOnDelete();
            $table->foreignId('emp_id')->constrained('employees')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('picker_allocations');
    }
};
