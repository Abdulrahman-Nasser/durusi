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
        DB::statement("
            CREATE VIEW teachers_courses_data as
            SELECT teachers.id as ID , teachers.name as Teacher_name
            , teachers.age as Teacher_age , teachers.phone as Teacher_phone
            , teachers.course_id as Teacher_CourseID , teachers.level_id as Teacher_LevelID
            , courses.name as Course_name , levels.name as Level_name FROM `teachers` LEFT JOIN courses
            ON (teachers.course_id = courses.id) JOIN levels ON (teachers.level_id = levels.id);
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        DB::statement('DROP VIEW teachers_courses_data');
    }
};
