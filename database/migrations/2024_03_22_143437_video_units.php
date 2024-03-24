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
        DB::statement('CREATE VIEW video_units as
        select `durusi`.`videos`.`id` AS `videoId` ,  `durusi`.`videos`.`name` AS `videoName`,`durusi`.`videos`.`title` AS `videoTitle`,`durusi`.`videos`.`url` AS `videoUrl` , `durusi`.`units`.`id` AS `unitId` , `durusi`.`units`.`name` AS `unitName`, `durusi`.`groups`.`id` AS `groupId` , `durusi`.`groups`.`name` AS `groupName`  FROM videos JOIN units JOIN groups on ( videos.unitID = units.id and units.groupID = groups.id );');
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
