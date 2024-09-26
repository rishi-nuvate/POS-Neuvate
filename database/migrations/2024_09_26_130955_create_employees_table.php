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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('emp_name'); // Employee Name
            $table->unsignedBigInteger('company_id'); // Foreign key to company
            $table->unsignedBigInteger('store_id'); // Foreign key to store
            $table->string('emp_type')->nullable(); // Employee type
            $table->string('emp_email')->unique(); // Employee email (unique)
            $table->string('emp_number')->nullable(); // Employee number
            $table->string('emp_role')->nullable(); // Employee role
            $table->string('emp_department')->nullable(); // Department
            $table->string('emp_sub_department')->nullable(); // Sub-department
            $table->date('emp_dob')->nullable(); // Date of Birth
            $table->date('emp_anni_date')->nullable(); // Anniversary date
            $table->string('emp_other_num')->nullable(); // Other number
            $table->date('emp_doj')->nullable(); // Date of joining
            $table->date('emp_dol')->nullable(); // Date of leaving
            $table->string('emp_aadhar_num')->nullable(); // Aadhaar number
            $table->string('emp_pan_num')->nullable(); // PAN number
            $table->enum('emp_gender', ['Male', 'Female'])->nullable(); // Gender

            // Address Fields
            $table->text('emp_addline1')->nullable(); // Address line 1
            $table->text('emp_addline2')->nullable(); // Address line 2
            $table->string('emp_city')->nullable(); // City
            $table->string('emp_state')->nullable(); // State
            $table->string('emp_pincode')->nullable(); // Pincode

            // File Fields
            $table->string('emp_aadhar_file')->nullable(); // Aadhaar file path
            $table->string('emp_pan_file')->nullable(); // PAN file path
            $table->string('emp_profile_pic')->nullable(); // Profile picture path
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
