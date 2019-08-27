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
            $table->string('research_category');
            $table->integer('department_id');
            $table->integer('duration');
            $table->float('amount');
            $table->string('status');
            $table->string('user_role');
            $table->string('agency');  
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
