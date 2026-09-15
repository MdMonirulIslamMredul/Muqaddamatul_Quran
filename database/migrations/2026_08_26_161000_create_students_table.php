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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_class_id')->nullable()->constrained('student_classes')->nullOnDelete();
            $table->foreignId('admission_id')->nullable()->constrained('admissions')->nullOnDelete();
            
            // Core Identification
            $table->string('student_id_number')->unique(); // e.g. MQ-2026-0001
            $table->string('academic_year')->default('2026');
            $table->string('roll_no')->nullable();

            // Student Information
            $table->string('student_name_bn');
            $table->string('student_name_en')->nullable();
            $table->date('dob')->nullable();
            $table->string('blood_group', 10)->nullable();
            $table->string('residential_type')->default('residential')->comment('residential, non_residential, day_care');
            $table->string('photo')->nullable();

            // Parents & Guardian
            $table->string('father_name_bn')->nullable();
            $table->string('father_name_en')->nullable();
            $table->string('father_contact')->nullable();
            $table->string('father_profession')->nullable();
            
            $table->string('mother_name_bn')->nullable();
            $table->string('mother_name_en')->nullable();
            $table->string('mother_contact')->nullable();

            $table->string('guardian_name')->nullable();
            $table->string('guardian_contact')->nullable();
            $table->string('guardian_relation')->nullable();
            $table->string('emergency_contact')->nullable();

            // Addresses
            $table->text('present_address')->nullable();
            $table->text('permanent_address')->nullable();

            // Status & Notes
            $table->tinyInteger('status')->default(1)->comment('1: Active, 2: Passed, 3: Transferred/TC, 0: Inactive');
            $table->text('admin_notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
