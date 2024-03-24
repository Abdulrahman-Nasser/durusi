<?php

namespace App\Models\Groups;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $table = 'groups';
    protected $filable = [
        'name',
        'start-time',
        'end-time',
        'first-day',
        'second-day',
        'teacherID',
        'levelID',
        'courseID',
        'termID',
    ];
}
