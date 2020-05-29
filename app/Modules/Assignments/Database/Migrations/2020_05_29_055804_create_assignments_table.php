<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('class')->nullable();
            $table->string('section')->nullable();
            $table->string('session')->nullable();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('subject')->nullable();
            $table->string('docs')->nullable();
            $table->integer('created_by')->nullable();
            $table->date('submission_date')->nullable();
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
        Schema::dropIfExists('assignments');
    }
}
