<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResearchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable();
            $table->text('short_details')->nullable();
            $table->text('main_image')->nullable();


            $table->text('banner_image')->nullable();
            $table->text('details_image1')->nullable();
            $table->text('details_image2')->nullable();
            $table->text('details_image3')->nullable();
            $table->longText('details1')->nullable();
            $table->longText('details2')->nullable();


            $table->integer('add_home')->nullable();
            $table->integer('status')->default(1)->comment("1= active; 0=deactive");
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
        Schema::dropIfExists('research');
    }
}
