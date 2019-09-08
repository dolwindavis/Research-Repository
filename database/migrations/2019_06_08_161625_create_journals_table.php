<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->integer('date')->nullable();
            $table->integer('month')->nullable();
            $table->integer('year');
            $table->bigInteger('category')->unsigned();
            $table->string('journal_name');
            $table->bigInteger('journal_category')->unsigned();
            $table->string('issn_isbn_no');
            $table->string('impact_factor')->nullable();
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
        Schema::dropIfExists('journals');
    }
}
