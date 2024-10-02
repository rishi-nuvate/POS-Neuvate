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
        Schema::create('sleeves', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cat_id')->nullable()->constrained('categories'); // Category ID
            $table->foreignId('sub_cat_id')->nullable()->constrained('sub_categories'); // Sub-category ID
            $table->string('sleeve_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sleeves');
    }
};
