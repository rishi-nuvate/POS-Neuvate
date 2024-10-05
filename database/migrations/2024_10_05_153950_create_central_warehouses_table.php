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
        Schema::create('central_warehouses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
            $table->string('warehouse_name');
            $table->integer('contact_person_name');
            $table->string('contact_person_email');
            $table->string('ShipGstNo');
            $table->text('address_line_1');
            $table->text('address_line_2');
            $table->string('city');
            $table->string('state');
            $table->integer('pincode');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('central_warehouses');
    }
};
