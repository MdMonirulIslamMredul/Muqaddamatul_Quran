<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrollmentformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollmentforms', function (Blueprint $table) {
            $table->id();
            $table->string('b_name')->nullable();
            $table->string('english_name')->nullable();
            $table->string('division')->nullable();
            $table->string('school_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_profession')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_profession')->nullable();
            $table->string('alter_guardian')->nullable();
            $table->string('relation')->nullable();
            $table->string('dob')->nullable();
            $table->string('religion')->nullable();
            $table->string('personal_mobile')->nullable();
            $table->string('guardian_mobile')->nullable();
            $table->string('present_address')->nullable();
            $table->string('post_office')->nullable();
            $table->string('upzilla_name')->nullable();
            $table->string('district_name')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enrollmentforms');
    }
}
