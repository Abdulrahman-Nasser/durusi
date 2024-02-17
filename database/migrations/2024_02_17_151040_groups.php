<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('teacherID');
            $table->unsignedBigInteger('userID');
            $table->unsignedBigInteger('levelID');
            $table->unsignedBigInteger('coursesID');
            $table->unsignedBigInteger('termID');
            $table->date('date');
            $table->timestamps();
            
            // Foreign key constraints
            $table->foreign('teacherID')->references('id')->on('teachers');
            $table->foreign('userID')->references('id')->on('users');
            $table->foreign('levelID')->references('id')->on('levels');
            $table->foreign('coursesID')->references('id')->on('courses');
            $table->foreign('termID')->references('id')->on('terms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('groups');
    }
};