<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAboutsTableRemoveFoundationAddSpecialties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('abouts', function (Blueprint $table) {
            $columnsToDrop = [
                'foundation_name',
                'foundation_name_bangla',
                'foundation_name_ab',
                'director_name',
                'director_name_bangla',
                'director_name_ab',
                'foundation_image',
            ];

            foreach ($columnsToDrop as $col) {
                if (Schema::hasColumn('abouts', $col)) {
                    $table->dropColumn($col);
                }
            }

            if (!Schema::hasColumn('abouts', 'specialties')) {
                $table->longText('specialties')->nullable();
            }
            if (!Schema::hasColumn('abouts', 'features')) {
                $table->longText('features')->nullable();
            }
            if (!Schema::hasColumn('abouts', 'hifz_edu_details')) {
                $table->longText('hifz_edu_details')->nullable();
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
            if (Schema::hasColumn('abouts', 'specialties')) {
                $table->dropColumn('specialties');
            }
            if (Schema::hasColumn('abouts', 'features')) {
                $table->dropColumn('features');
            }
            if (Schema::hasColumn('abouts', 'hifz_edu_details')) {
                $table->dropColumn('hifz_edu_details');
            }

            $table->text('foundation_name')->nullable();
            $table->text('foundation_name_bangla')->nullable();
            $table->text('foundation_name_ab')->nullable();
            $table->text('director_name')->nullable();
            $table->text('director_name_bangla')->nullable();
            $table->text('director_name_ab')->nullable();
            $table->text('foundation_image')->nullable();
        });
    }
}
