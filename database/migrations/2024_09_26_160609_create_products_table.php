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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name'); // Product name
            $table->string('product_code')->unique(); // Unique product code
            $table->string('hsn_code'); // HSN code
            $table->text('product_description')->nullable(); // Product description
            $table->foreignId('cat_id')->nullable()->constrained('categories'); // Category ID
            $table->foreignId('sub_cat_id')->nullable()->constrained('sub_categories'); // Sub-category ID
            $table->string('tag_id')->nullable(); // Tag ID
            $table->foreignId('season_id')->nullable()->constrained('seasons'); // Season ID
            $table->foreignId('brand_id')->nullable()->constrained('brands'); // Brand ID
            $table->integer('cost_price'); // Cost price
            $table->integer('sell_price'); // Selling price
            $table->integer('product_mrp'); // Maximum retail price (MRP)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
