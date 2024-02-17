<?php

namespace App\Models\TeacherCourses;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherCoursesData extends Model
{
    use HasFactory;

    protected $table = 'teacher_courses_data';
    protected $filable =[
        'ID',
        'Teacher_name',
        'Teacher_age',
        'Teacher_CourseID',
        'Teacher_LevelID',
        'Course_name',
        'Level_name'
    ];
}
