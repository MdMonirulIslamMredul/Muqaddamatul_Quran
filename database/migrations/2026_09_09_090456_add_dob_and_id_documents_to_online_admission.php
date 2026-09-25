<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDobAndIdDocumentsToOnlineAdmission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('online_admission', function (Blueprint $table) {
            $table->date('date_of_birth')->nullable()->after('student_name');
            $table->integer('age')->nullable()->after('date_of_birth');
            $table->string('father_id_document', 255)->nullable()->after('father_nid');
            $table->string('mother_id_document', 255)->nullable()->after('mother_nid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('online_admission', function (Blueprint $table) {
            $table->dropColumn(['date_of_birth', 'age', 'father_id_document', 'mother_id_document']);
        });
    }
}
