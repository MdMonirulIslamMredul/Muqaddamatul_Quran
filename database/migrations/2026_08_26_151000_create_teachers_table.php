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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_category_id')->nullable()->constrained('teacher_categories')->nullOnDelete();
            
            // Name fields
            $table->string('name_bn');
            $table->string('name_en')->nullable();
            $table->string('name_ar')->nullable();

            // Designation
            $table->string('designation_bn');
            $table->string('designation_en')->nullable();
            $table->string('designation_ar')->nullable();

            // Educational Qualification
            $table->text('qualification_bn')->nullable();
            $table->text('qualification_en')->nullable();

            // Subject / Department Taught
            $table->string('subject_department_bn')->nullable();
            $table->string('subject_department_en')->nullable();

            // Contact & Bio
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->text('bio_bn')->nullable();
            $table->text('bio_en')->nullable();
            $table->string('image')->nullable();

            // Social links
            $table->string('facebook')->nullable();
            $table->string('youtube')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('whatsapp')->nullable();

            // Experience & Meta
            $table->string('experience')->nullable();
            $table->date('joining_date')->nullable();
            $table->boolean('is_featured')->default(false)->comment('Show on homepage');
            $table->integer('sort_order')->default(0);
            $table->tinyInteger('status')->default(1)->comment('1: Active, 0: Inactive');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
