<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAchievementsFieldsToAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('abouts', function (Blueprint $table) {
            if (!Schema::hasColumn('abouts', 'achievement')) {
                $table->longText('achievement')->nullable()->after('hifz_edu_details_ab');
            }
            if (!Schema::hasColumn('abouts', 'achievement_bn')) {
                $table->longText('achievement_bn')->nullable()->after('achievement');
            }
            if (!Schema::hasColumn('abouts', 'achievement_ab')) {
                $table->longText('achievement_ab')->nullable()->after('achievement_bn');
            }

            if (!Schema::hasColumn('abouts', 'int_achievement')) {
                $table->longText('int_achievement')->nullable()->after('achievement_ab');
            }
            if (!Schema::hasColumn('abouts', 'int_achievement_bn')) {
                $table->longText('int_achievement_bn')->nullable()->after('int_achievement');
            }
            if (!Schema::hasColumn('abouts', 'int_achievement_ab')) {
                $table->longText('int_achievement_ab')->nullable()->after('int_achievement_bn');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('abouts', function (Blueprint $table) {
            $cols = [
                'achievement',
                'achievement_bn',
                'achievement_ab',
                'int_achievement',
                'int_achievement_bn',
                'int_achievement_ab',
            ];
            foreach ($cols as $col) {
                if (Schema::hasColumn('abouts', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }
}
