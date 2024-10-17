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
        Schema::create('store_attachment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->constrained('store_generates')->cascadeOnDelete();
            $table->string('loi')->nullable();
            $table->string('agreement')->nullable();
            $table->string('architecture_draw')->nullable();
            $table->string('photo')->nullable();
            $table->string('aadhar_file')->nullable();
            $table->string('pan_file')->nullable();
            $table->string('gst_file')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attachment');
    }
};
