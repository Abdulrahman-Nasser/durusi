<?php

namespace App\Models\Views\GroupDataView;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class groups_data extends Model
{
    use HasFactory;
    protected $table = 'groups_data';
    protected $filable=[
        'Group_name',
        'Teacher_name',
        'Teacher_age',
        'teacher_phone',
        'Level_name',
        'Course_name',
        'Term_name'
    ];

}
