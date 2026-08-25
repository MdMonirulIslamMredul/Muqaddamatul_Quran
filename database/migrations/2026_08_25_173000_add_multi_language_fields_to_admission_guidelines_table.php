<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMultiLanguageFieldsToAdmissionGuidelinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admission_guidelines', function (Blueprint $table) {
            if (!Schema::hasColumn('admission_guidelines', 'section_title_bn')) {
                $table->string('section_title_bn')->nullable()->after('section_title');
            }
            if (!Schema::hasColumn('admission_guidelines', 'section_title_ab')) {
                $table->string('section_title_ab')->nullable()->after('section_title_bn');
            }

            if (!Schema::hasColumn('admission_guidelines', 'details_bn')) {
                $table->longText('details_bn')->nullable()->after('details');
            }
            if (!Schema::hasColumn('admission_guidelines', 'details_ab')) {
                $table->longText('details_ab')->nullable()->after('details_bn');
            }

            if (!Schema::hasColumn('admission_guidelines', 'process_bn')) {
                $table->longText('process_bn')->nullable()->after('process');
            }
            if (!Schema::hasColumn('admission_guidelines', 'process_ab')) {
                $table->longText('process_ab')->nullable()->after('process_bn');
            }

            if (!Schema::hasColumn('admission_guidelines', 'admission_fees_bn')) {
                $table->longText('admission_fees_bn')->nullable()->after('admission_fees');
            }
            if (!Schema::hasColumn('admission_guidelines', 'admission_fees_ab')) {
                $table->longText('admission_fees_ab')->nullable()->after('admission_fees_bn');
            }

            if (!Schema::hasColumn('admission_guidelines', 'monthly_fees_bn')) {
                $table->longText('monthly_fees_bn')->nullable()->after('monthly_fees');
            }
            if (!Schema::hasColumn('admission_guidelines', 'monthly_fees_ab')) {
                $table->longText('monthly_fees_ab')->nullable()->after('monthly_fees_bn');
            }

            if (!Schema::hasColumn('admission_guidelines', 'others_fees_bn')) {
                $table->longText('others_fees_bn')->nullable()->after('others_fees');
            }
            if (!Schema::hasColumn('admission_guidelines', 'others_fees_ab')) {
                $table->longText('others_fees_ab')->nullable()->after('others_fees_bn');
            }

            if (!Schema::hasColumn('admission_guidelines', 'payment_rules_bn')) {
                $table->longText('payment_rules_bn')->nullable()->after('payment_rules');
            }
            if (!Schema::hasColumn('admission_guidelines', 'payment_rules_ab')) {
                $table->longText('payment_rules_ab')->nullable()->after('payment_rules_bn');
            }

            if (!Schema::hasColumn('admission_guidelines', 'points_bn')) {
                $table->json('points_bn')->nullable()->after('points');
            }
            if (!Schema::hasColumn('admission_guidelines', 'points_ab')) {
                $table->json('points_ab')->nullable()->after('points_bn');
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
        Schema::table('admission_guidelines', function (Blueprint $table) {
            $cols = [
                'section_title_bn', 'section_title_ab',
                'details_bn', 'details_ab',
                'process_bn', 'process_ab',
                'admission_fees_bn', 'admission_fees_ab',
                'monthly_fees_bn', 'monthly_fees_ab',
                'others_fees_bn', 'others_fees_ab',
                'payment_rules_bn', 'payment_rules_ab',
                'points_bn', 'points_ab',
            ];
            foreach ($cols as $col) {
                if (Schema::hasColumn('admission_guidelines', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }
}
