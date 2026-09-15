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
        Schema::create('student_classes', function (Blueprint $table) {
            $table->id();
            $table->string('name_bn');
            $table->string('name_en')->nullable();
            $table->string('code')->unique();
            $table->string('department')->nullable()->comment('নূরানী / নাজেরা / হিফজ / কিতাব / সাধারণ');
            $table->decimal('monthly_fee', 10, 2)->default(0);
            $table->decimal('admission_fee', 10, 2)->default(0);
            $table->integer('seat_capacity')->nullable();
            $table->integer('order_level')->default(0);
            $table->text('description')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1: Active, 0: Inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_classes');
    }
};
