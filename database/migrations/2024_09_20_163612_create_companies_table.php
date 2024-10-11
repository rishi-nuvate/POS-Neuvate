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
            $table->string('company_name');
            $table->enum('document', ['pan', 'gst']);
            $table->string('gst_no', length: 20);
            $table->string('gst_file');
            $table->string('billing_name');
            $table->integer('billing_mobile_no');
            $table->string('BillingEmail');
            $table->text('add_line1');
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
