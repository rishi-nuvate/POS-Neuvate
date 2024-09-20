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
        Schema::create('company_ship_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies');
            $table->string('ShipCompName');
            $table->integer('ShipPersonNo');
            $table->string('ShipPersonEmail');
            $table->string('ShipGstNo');
            $table->text('AddLine1');
            $table->text('AddLine2');
            $table->string('City');
            $table->string('State');
            $table->integer('PinCode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_ship_addresses');
    }
};
