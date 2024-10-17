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
            $table->string('op_date');
            $table->string('store_name');
            $table->string('store_code')->unique();
            $table->string('store_status');
            $table->string('format');
            $table->string('firm');
            $table->string('gst');
            $table->string('store_phone');
            $table->string('store_email');
            $table->string('store_address_1');
            $table->string('store_address_2');
            $table->string('store_state');
            $table->string('store_city');
            $table->string('store_pincode');
            $table->string('store_area');
            $table->string('map_link')->nullable();
            $table->string('franchise_name');
            $table->integer('franchise_phone');
            $table->string('franchise_email');
            $table->string('datanote_name');
            $table->string('seller_ware_1');
            $table->string('seller_ware_2');
            $table->timestamps();
            $table->softDeletes();
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
