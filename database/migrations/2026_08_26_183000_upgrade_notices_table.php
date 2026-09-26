<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UpgradeNoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notices', function (Blueprint $table) {
            if (!Schema::hasColumn('notices', 'title')) {
                $table->string('title')->nullable()->after('id');
            }
            if (!Schema::hasColumn('notices', 'title_bn')) {
                $table->string('title_bn')->nullable()->after('title');
            }
            if (!Schema::hasColumn('notices', 'title_ar')) {
                $table->string('title_ar')->nullable()->after('title_bn');
            }
            if (!Schema::hasColumn('notices', 'notice_category')) {
                $table->string('notice_category')->default('general')->after('title_ar');
            }
            if (!Schema::hasColumn('notices', 'notice_no')) {
                $table->string('notice_no')->nullable()->after('notice_category');
            }
            if (!Schema::hasColumn('notices', 'publish_date')) {
                $table->date('publish_date')->nullable()->after('notice_no');
            }
            if (!Schema::hasColumn('notices', 'expire_date')) {
                $table->date('expire_date')->nullable()->after('publish_date');
            }
            if (!Schema::hasColumn('notices', 'short_des_bn')) {
                $table->text('short_des_bn')->nullable()->after('short_des');
            }
            if (!Schema::hasColumn('notices', 'long_des_bn')) {
                $table->longText('long_des_bn')->nullable()->after('long_des');
            }
            if (!Schema::hasColumn('notices', 'file_type')) {
                $table->string('file_type', 50)->nullable()->after('pdf_file');
            }
            if (!Schema::hasColumn('notices', 'file_size')) {
                $table->string('file_size', 50)->nullable()->after('file_type');
            }
            if (!Schema::hasColumn('notices', 'is_pinned')) {
                $table->boolean('is_pinned')->default(0)->after('file_size');
            }
            if (!Schema::hasColumn('notices', 'is_ticker')) {
                $table->boolean('is_ticker')->default(1)->after('is_pinned');
            }
            if (!Schema::hasColumn('notices', 'views_count')) {
                $table->unsignedInteger('views_count')->default(0)->after('is_ticker');
            }
            if (!Schema::hasColumn('notices', 'status')) {
                $table->tinyInteger('status')->default(1)->after('views_count');
            }
        });

        // Populate existing notices with fallback titles and publish dates
        $notices = DB::table('notices')->get();
        foreach ($notices as $notice) {
            $updates = [];
            if (empty($notice->publish_date)) {
                $updates['publish_date'] = $notice->created_at ? date('Y-m-d', strtotime($notice->created_at)) : date('Y-m-d');
            }
            if (empty($notice->title) && empty($notice->title_bn)) {
                $plain = trim(strip_tags($notice->short_des ?? ''));
                $fallbackTitle = !empty($plain) ? mb_substr($plain, 0, 80) : 'মাদ্রাসার জরুরি বিজ্ঞপ্তি #' . $notice->id;
                $updates['title'] = $fallbackTitle;
                $updates['title_bn'] = $fallbackTitle;
            }
            if (empty($notice->notice_no)) {
                $updates['notice_no'] = 'MQIA-NOT-' . date('Y') . '-' . str_pad($notice->id, 3, '0', STR_PAD_LEFT);
            }
            if (empty($notice->file_type) && !empty($notice->pdf_file)) {
                $ext = strtolower(pathinfo($notice->pdf_file, PATHINFO_EXTENSION));
                $updates['file_type'] = $ext ?: 'pdf';
            }
            if (!empty($updates)) {
                DB::table('notices')->where('id', $notice->id)->update($updates);
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notices', function (Blueprint $table) {
            $table->dropColumn([
                'title',
                'title_bn',
                'title_ar',
                'notice_category',
                'notice_no',
                'publish_date',
                'expire_date',
                'short_des_bn',
                'long_des_bn',
                'file_type',
                'file_size',
                'is_pinned',
                'is_ticker',
                'views_count'
            ]);
        });
    }
}
