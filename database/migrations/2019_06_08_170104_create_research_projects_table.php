<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearchProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research_projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('project_code');
            $table->bigInteger('research_category')->unsigned();
            $table->integer('department_id');
            $table->integer('duration');
            $table->float('amount');
            $table->string('status');
            $table->bigInteger('user_role')->unsigned();
            $table->bigInteger('agency')->unsigned();  
            $table->string('fac_id');
            $table->string('slug');
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
        Schema::dropIfExists('research_projects');
    }
}
