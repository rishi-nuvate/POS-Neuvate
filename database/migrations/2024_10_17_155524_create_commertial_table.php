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
        Schema::create('commercial', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->constrained('store_generates')->cascadeOnDelete();
            $table->string('sba_sqft')->nullable();
            $table->string('ca_sqft')->nullable();
            $table->string('store_rating')->nullable();
            $table->string('commercial_model')->nullable();
            $table->string('margin')->nullable();
            $table->string('add_support')->nullable();
            $table->string('security_deposit')->nullable();
            $table->string('capex')->nullable();
            $table->string('rent')->nullable();
            $table->string('bep')->nullable();
            $table->string('mf')->nullable();
            $table->string('mf_percent')->nullable();
            $table->string('asm')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commercial');
    }
};
