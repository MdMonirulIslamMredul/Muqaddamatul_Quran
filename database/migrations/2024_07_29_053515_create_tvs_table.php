<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tvs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('tvcategories')->onDelete('cascade');
            $table->foreignId('subcategory_id')->constrained('tvsubcategories')->onDelete('cascade');
            $table->string('title_en')->nullable();
            $table->string('title_bn')->nullable();
            $table->text('short_details_en')->nullable();
            $table->text('short_details_bn')->nullable();
            $table->longText('details_en')->nullable();
            $table->longText('details_bn')->nullable();
            $table->longText('embed_video')->nullable();
            $table->string('file_upload')->nullable();
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
        Schema::dropIfExists('tvs');
    }
}
