<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddRawVideoFieldsToVideoGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('video_galleries', function (Blueprint $table) {
            if (!Schema::hasColumn('video_galleries', 'title')) {
                $table->string('title')->nullable()->after('id');
            }
            if (!Schema::hasColumn('video_galleries', 'thumbnail')) {
                $table->string('thumbnail')->nullable()->after('title');
            }
            if (!Schema::hasColumn('video_galleries', 'video_file')) {
                $table->string('video_file')->nullable()->after('thumbnail');
            }
        });

        // Make video_link nullable for records that only have raw video files
        DB::statement("ALTER TABLE video_galleries MODIFY video_link TEXT NULL");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('video_galleries', function (Blueprint $table) {
            if (Schema::hasColumn('video_galleries', 'title')) {
                $table->dropColumn('title');
            }
            if (Schema::hasColumn('video_galleries', 'thumbnail')) {
                $table->dropColumn('thumbnail');
            }
            if (Schema::hasColumn('video_galleries', 'video_file')) {
                $table->dropColumn('video_file');
            }
        });
    }
}
