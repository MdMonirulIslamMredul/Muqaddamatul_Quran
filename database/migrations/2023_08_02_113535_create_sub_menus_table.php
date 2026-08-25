<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_menus', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('title_bangla')->nullable();
            $table->string('designation')->nullable();
            $table->string('name')->nullable();
            $table->integer('menu_id')->nullable();
            $table->integer('image')->nullable();
            $table->text('banner_image')->nullable();
            $table->text('details_image1')->nullable();
            $table->text('details_image2')->nullable();
            $table->text('details_image3')->nullable();
            $table->longText('details1')->nullable();
            $table->longText('details2')->nullable();
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
        Schema::dropIfExists('sub_menus');
    }
}
