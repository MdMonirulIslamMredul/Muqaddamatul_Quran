<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDocumentsToTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teachers', function (Blueprint $table) {
            $table->string('nid_or_birth_certificate')->nullable()->after('image');
            $table->string('academic_certificate')->nullable()->after('nid_or_birth_certificate');
            $table->string('resume')->nullable()->after('academic_certificate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teachers', function (Blueprint $table) {
            $table->dropColumn(['nid_or_birth_certificate', 'academic_certificate', 'resume']);
        });
    }
}
