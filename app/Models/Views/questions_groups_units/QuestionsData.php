<?php

namespace App\Models\Views\questions_groups_units;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionsData extends Model
{
    use HasFactory;

    protected $table = 'questions_groups_units_videos';
    protected $filable = [
        'quesId',
        'quesNum',
        'quesBody',
        'fisrtAns',
        'secondAns',
        'thirdAns',
        'fourthAns',
        'correctAns',
        'groupId',
        'groupName',
        'unitId',
        'unitName',
        'videoId',
        'videoName'
    ];
}
