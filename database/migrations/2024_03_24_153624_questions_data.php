<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        DB::statement('CREATE VIEW questions_groups_units_videos as
        SELECT questions.id as quesId , questions.quesNum as quesNum , questions.quesBody as quesBody , questions.firstAns as firstAns , questions.secondAns as secondAns , questions.thirdAns as thirdAns , questions.fourthAns as fourthAns , questions.correctAns as correctAns , questions.groupId as groupId , groups.name as groupName , questions.unitId as unitId , units.name as unitName , questions.videoId as videoId , videos.name as videoName FROM `questions` JOIN units JOIN groups JOIN videos on ( questions.videoId = videos.id and questions.unitId = units.id and questions.groupId = groups.id );');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        DB::statement("DROP VIEW video_units");
    }
};
