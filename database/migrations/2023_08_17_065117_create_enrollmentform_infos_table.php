<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrollmentformInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollmentform_infos', function (Blueprint $table) {
            $table->id();
            $table->string('institute_name')->nullable();
            $table->string('institute_address')->nullable();
            $table->string('institute_owner')->nullable();
            $table->text('institute_Instructions')->nullable();            
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
        Schema::dropIfExists('enrollmentform_infos');
    }
}
