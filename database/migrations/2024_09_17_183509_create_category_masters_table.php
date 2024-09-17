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
        Schema::create('category_masters', function (Blueprint $table) {
            $table->id();
            $table->string('CategoryName')->nullable();
            $table->timestamps();
        });

        Schema::create('sub_category_masters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cat_id')->constrained('category_masters');
            $table->string('SubCatName')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_masters');
    }
};
