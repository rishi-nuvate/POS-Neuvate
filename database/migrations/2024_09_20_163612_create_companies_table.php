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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('CompanyName');
            $table->enum('Document', ['pan', 'gst']);
            $table->string('PanGstNo', length: 20);
            $table->string('PanGstFile');
            $table->string('BillingName');
            $table->integer('BillingMobileNo');
            $table->string('BillingEmail');
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
        Schema::dropIfExists('companies');
    }
};
