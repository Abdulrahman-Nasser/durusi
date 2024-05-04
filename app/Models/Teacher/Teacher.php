<?php

namespace App\Models\Teacher;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table = 'teachers';
    protected $filable = [
        'name',
        'age',
        'phone',
        'image',
        'path',
        'course_id',
        'level_id',
    ];
}
