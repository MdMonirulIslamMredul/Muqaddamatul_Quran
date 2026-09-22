<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddCustomFieldsToBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE `banners` MODIFY `short_details` TEXT NULL, MODIFY `short_details_bn` TEXT NULL, MODIFY `short_details_ab` TEXT NULL");

        Schema::table('banners', function (Blueprint $table) {
            if (!Schema::hasColumn('banners', 'button_text')) {
                $table->string('button_text')->nullable()->after('short_details_ab');
            }
            if (!Schema::hasColumn('banners', 'button_text_bn')) {
                $table->string('button_text_bn')->nullable()->after('button_text');
            }
            if (!Schema::hasColumn('banners', 'button_text_ab')) {
                $table->string('button_text_ab')->nullable()->after('button_text_bn');
            }
            if (!Schema::hasColumn('banners', 'button_url')) {
                $table->string('button_url')->nullable()->after('button_text_ab');
            }
            if (!Schema::hasColumn('banners', 'achievement_subtitle')) {
                $table->string('achievement_subtitle')->nullable()->after('button_url');
            }
            if (!Schema::hasColumn('banners', 'stat1_value')) {
                $table->string('stat1_value', 50)->nullable()->after('achievement_subtitle');
            }
            if (!Schema::hasColumn('banners', 'stat1_label')) {
                $table->string('stat1_label', 100)->nullable()->after('stat1_value');
            }
            if (!Schema::hasColumn('banners', 'stat2_value')) {
                $table->string('stat2_value', 50)->nullable()->after('stat1_label');
            }
            if (!Schema::hasColumn('banners', 'stat2_label')) {
                $table->string('stat2_label', 100)->nullable()->after('stat2_value');
            }
            if (!Schema::hasColumn('banners', 'stat3_value')) {
                $table->string('stat3_value', 50)->nullable()->after('stat2_label');
            }
            if (!Schema::hasColumn('banners', 'stat3_label')) {
                $table->string('stat3_label', 100)->nullable()->after('stat3_value');
            }
        });

        // Update existing first banner to match the screenshot details
        $firstBanner = DB::table('banners')->first();
        if ($firstBanner) {
            DB::table('banners')->where('id', $firstBanner->id)->update([
                'title_bn' => 'নূরুল কুরআন একাডেমি',
                'title' => 'Noorul Quran Academy',
                'title_ab' => 'أكاديمية نور القرآن',
                'short_details_bn' => 'শায়খ আহমাদুল্লাহ এর আস-সুন্নাহ ফাউন্ডেশন কর্তৃক পুরষ্কারপ্রাপ্ত অনলাইন একাডেমী। এতে রয়েছে আরবিভাষা, কুরআন, হাদীস, ফিকহ, আকীদা, হিফজসহ বিভিন্ন বিষয়ে অভিজ্ঞ শিক্ষকদের তত্ত্বাবধানে সাজানো লাইভ ও রেকর্ডেড কোর্সসমূহ। ঘরে বসেই শিখুন সহজ ও মানসম্মত ইসলামী শিক্ষা।',
                'short_details' => 'Award-winning Islamic academy providing authentic Quran, Hadith, Arabic language, Fiqh and Hifz courses under the supervision of qualified Islamic scholars.',
                'button_text_bn' => 'ই-ক্যাম্পাস',
                'button_text' => 'E-Campus',
                'button_text_ab' => 'الحرم الإلكتروني',
                'button_url' => '/online-admission',
                'achievement_subtitle' => 'বিগত ৫ বছর ধরে আমাদের সাফল্য',
                'stat1_value' => '১০,০০০',
                'stat1_label' => 'শিক্ষার্থী',
                'stat2_value' => '৪০+',
                'stat2_label' => 'শিক্ষক',
                'stat3_value' => '৮৯%',
                'stat3_label' => 'কোর্স কমপ্লিট রেট',
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->dropColumn([
                'button_text',
                'button_text_bn',
                'button_text_ab',
                'button_url',
                'achievement_subtitle',
                'stat1_value',
                'stat1_label',
                'stat2_value',
                'stat2_label',
                'stat3_value',
                'stat3_label'
            ]);
        });
    }
}
