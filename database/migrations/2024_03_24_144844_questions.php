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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('quesNum');
            $table->string('quesBody');
            $table->string('firstAns');
            $table->string('secondAns');
            $table->string('thirdAns');
            $table->string('fourthAns');
            $table->string('correctAns');
            $table->unsignedBigInteger('unitId');
            $table->unsignedBigInteger('groupId');
            $table->unsignedBigInteger('videoId');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();

            $table->foreign('unitId')->references('id')->on('units');
            $table->foreign('groupId')->references('id')->on('groups');
            $table->foreign('videoId')->references('id')->on('videos');

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
    }
};
