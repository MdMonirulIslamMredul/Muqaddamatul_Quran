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
        Schema::create('gallery_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name_bn');
            $table->string('name_en')->nullable();
            $table->string('name_ar')->nullable();
            $table->string('slug')->unique();
            $table->enum('type', ['photo', 'video', 'both'])->default('photo')->comment('photo, video, or both');
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
        Schema::dropIfExists('gallery_categories');
    }
};
