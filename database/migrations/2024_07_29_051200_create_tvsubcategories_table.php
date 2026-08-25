<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTvsubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tvsubcategories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('tvcategories')->onDelete('cascade');
            $table->string('subcategory_name');
            $table->string('subcategory_name_ban');
            $table->string('subcategory_name_ab');
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
        Schema::dropIfExists('tvsubcategories');
    }
}
