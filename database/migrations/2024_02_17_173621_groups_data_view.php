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
            'CREATE VIEW groups_data as
        SELECT groups.id as id , groups.name as Group_name , teachers.name as Teacher_name , teachers.age as Teacher_age , teachers.phone as teacher_phone , levels.name as Level_name , courses.name as Course_name , terms.name as Term_name , groups.created_at as Groupe_date , groups.updated_at as Group_update_date FROM `groups` LEFT JOIN teachers ON (groups.teacherID = teachers.id) JOIN levels ON (groups.levelID = levels.id) JOIN courses ON(groups.coursesID = courses.id) JOIN terms ON (groups.termID = terms.id);'
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
