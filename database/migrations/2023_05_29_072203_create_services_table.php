<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->text('service_title')->nullable();
            $table->text('main_image')->nullable();
            $table->integer('price')->nullable();
            $table->text('banner_image')->nullable();
            $table->text('details_image1')->nullable();
            $table->text('details_image2')->nullable();
            $table->text('details_image3')->nullable();
            $table->integer('service_home')->nullable();
            $table->longText('service_details_small')->nullable();
            $table->longText('service_details1')->nullable();
            $table->longText('service_details2')->nullable();
            $table->longText('service_details3')->nullable();
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
        Schema::dropIfExists('services');
    }
}
