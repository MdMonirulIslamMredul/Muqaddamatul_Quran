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
        Schema::table('galleries', function (Blueprint $table) {
            if (!Schema::hasColumn('galleries', 'category_id')) {
                $table->unsignedBigInteger('category_id')->nullable()->after('id');
                $table->foreign('category_id')->references('id')->on('gallery_categories')->nullOnDelete();
            }
        });

        Schema::table('video_galleries', function (Blueprint $table) {
            if (!Schema::hasColumn('video_galleries', 'category_id')) {
                $table->unsignedBigInteger('category_id')->nullable()->after('id');
                $table->foreign('category_id')->references('id')->on('gallery_categories')->nullOnDelete();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('galleries', function (Blueprint $table) {
            if (Schema::hasColumn('galleries', 'category_id')) {
                $table->dropForeign(['category_id']);
                $table->dropColumn('category_id');
            }
        });

        Schema::table('video_galleries', function (Blueprint $table) {
            if (Schema::hasColumn('video_galleries', 'category_id')) {
                $table->dropForeign(['category_id']);
                $table->dropColumn('category_id');
            }
        });
    }
};
