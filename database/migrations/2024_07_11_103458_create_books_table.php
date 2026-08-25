<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('bookcategories')->onDelete('cascade');
            $table->foreignId('subcategory_id')->constrained('booksubcategories')->onDelete('cascade');
            $table->string('title_en')->nullable();
            $table->string('title_bn')->nullable();
            $table->string('title_ab')->nullable();
            $table->longText('des_en')->nullable();
            $table->longText('des_bn')->nullable();
            $table->longText('des_ab')->nullable();
            $table->string('book_image')->nullable();
            $table->string('pdf_file')->nullable();
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
        Schema::dropIfExists('books');
    }
}
