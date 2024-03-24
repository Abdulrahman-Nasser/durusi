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
        DB::statement(
            'CREATE VIEW `groups_data` as
            select `durusi`.`groups`.`id` AS `id`,`durusi`.`groups`.`name` AS `Group_name`,`durusi`.`teachers`.`name` AS `Teacher_name`,`durusi`.`teachers`.`age` AS `Teacher_age`,`durusi`.`teachers`.`phone` AS `Teacher_phone`, `groups`.`start-time` as groupStartTime , `groups`.`end-time` as groupEndTime , `groups`.`first-day` as firstSession , `groups`.`second-day` as secondSession ,  `durusi`.`levels`.`name` AS `Level_name`,`durusi`.`courses`.`name` AS `Group_subject`,`durusi`.`terms`.`name` AS `Term_name`,`durusi`.`groups`.`created_at` AS `Groupe_date`,`durusi`.`groups`.`updated_at` AS `Group_update_date` from ((((`durusi`.`groups` left join `durusi`.`teachers` on(`durusi`.`groups`.`teacherID` = `durusi`.`teachers`.`id`)) join `durusi`.`levels` on(`durusi`.`groups`.`levelID` = `durusi`.`levels`.`id`)) join `durusi`.`courses` on(`durusi`.`groups`.`coursesID` = `durusi`.`courses`.`id`)) join `durusi`.`terms` on(`durusi`.`groups`.`termID` = `durusi`.`terms`.`id`));'
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        DB::statement('DROP VIEW groups_data');
    }
};
