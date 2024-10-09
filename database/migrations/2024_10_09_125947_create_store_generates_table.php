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
        Schema::create('store_generates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_type_id')->constrained('store_types');
            $table->string('store_name');
            $table->string('store_code')->unique();
            $table->string('store_address');
            $table->string('store_state');
            $table->string('store_city');
            $table->string('store_pincode');
            $table->string('store_area');
            $table->string('store_rating')->nullable();
            $table->string('manager_name');
            $table->string('manager_number');
            $table->string('manager_email');
            $table->string('store_payment_type')->nullable();
            $table->string('map_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('store_generates');
    }
};
