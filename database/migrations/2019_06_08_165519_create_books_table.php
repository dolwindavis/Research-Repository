<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id'); 
            $table->string('title');
            $table->integer('date')->nullable();
            $table->integer('month')->nullable();
            $table->integer('year');
            $table->string('book_category');
            $table->string('chapter_title')->nullable();
            $table->string('issn_isbn_no')->nullable();
            $table->text('publication_details')->nullable();
            $table->string('faculty_id');
            $table->bigInteger('user_id')->unsigned(); 
            $table->string('slug')->unique();
            $table->bigInteger('authorship')->unsigned();
            $table->string('bibliography_vol')->nullable();
            $table->string('bibliography_issue')->nullable();
            $table->string('bibliography_pages')->nullable();
            $table->foreign('faculty_id')->references('fac_id')->on('users');
            $table->foreign('user_id')->references('id')->on('users');
            $table->index('title');
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
