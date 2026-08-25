<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddFieldsToAdmissionGuidelinesAndDropFeeStructures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admission_guidelines', function (Blueprint $table) {
            if (!Schema::hasColumn('admission_guidelines', 'details')) {
                $table->longText('details')->nullable()->after('section_title');
            }
            if (!Schema::hasColumn('admission_guidelines', 'process')) {
                $table->longText('process')->nullable()->after('details');
            }
            if (!Schema::hasColumn('admission_guidelines', 'admission_fees')) {
                $table->longText('admission_fees')->nullable()->after('process');
            }
            if (!Schema::hasColumn('admission_guidelines', 'monthly_fees')) {
                $table->longText('monthly_fees')->nullable()->after('admission_fees');
            }
            if (!Schema::hasColumn('admission_guidelines', 'others_fees')) {
                $table->longText('others_fees')->nullable()->after('monthly_fees');
            }
            if (!Schema::hasColumn('admission_guidelines', 'payment_rules')) {
                $table->longText('payment_rules')->nullable()->after('others_fees');
            }
        });

        // Make points nullable via raw MySQL statement
        try {
            DB::statement('ALTER TABLE admission_guidelines MODIFY points JSON NULL');
        } catch (\Exception $e) {
            // Ignore if already nullable or different driver
        }

        // Drop fee_structures table if exists
        Schema::dropIfExists('fee_structures');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admission_guidelines', function (Blueprint $table) {
            $cols = ['details', 'process', 'admission_fees', 'monthly_fees', 'others_fees', 'payment_rules'];
            foreach ($cols as $col) {
                if (Schema::hasColumn('admission_guidelines', $col)) {
                    $table->dropColumn($col);
                }
            }
        });

        if (!Schema::hasTable('fee_structures')) {
            Schema::create('fee_structures', function (Blueprint $table) {
                $table->id();
                $table->string('category');
                $table->string('description')->nullable();
                $table->integer('residential_khat')->nullable();
                $table->integer('residential_general')->nullable();
                $table->integer('day_care')->nullable();
                $table->integer('non_residential')->nullable();
                $table->timestamps();
            });
        }
    }
}
