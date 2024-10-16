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
        Schema::create('shelf_manages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warehouse_id')->constrained('central_warehouses')->onDelete('cascade');
            $table->integer('row_num')->nullable();
            $table->integer('column_num')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shelf_manages');
    }
};
