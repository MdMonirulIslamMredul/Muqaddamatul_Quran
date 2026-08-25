<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMultiLanguageFieldsToAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('abouts', function (Blueprint $table) {
            if (!Schema::hasColumn('abouts', 'specialties_bn')) {
                $table->longText('specialties_bn')->nullable()->after('specialties');
            }
            if (!Schema::hasColumn('abouts', 'specialties_ab')) {
                $table->longText('specialties_ab')->nullable()->after('specialties_bn');
            }

            if (!Schema::hasColumn('abouts', 'features_bn')) {
                $table->longText('features_bn')->nullable()->after('features');
            }
            if (!Schema::hasColumn('abouts', 'features_ab')) {
                $table->longText('features_ab')->nullable()->after('features_bn');
            }

            if (!Schema::hasColumn('abouts', 'hifz_edu_details_bn')) {
                $table->longText('hifz_edu_details_bn')->nullable()->after('hifz_edu_details');
            }
            if (!Schema::hasColumn('abouts', 'hifz_edu_details_ab')) {
                $table->longText('hifz_edu_details_ab')->nullable()->after('hifz_edu_details_bn');
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
                'specialties_bn',
                'specialties_ab',
                'features_bn',
                'features_ab',
                'hifz_edu_details_bn',
                'hifz_edu_details_ab',
            ];
            foreach ($cols as $col) {
                if (Schema::hasColumn('abouts', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }
}
