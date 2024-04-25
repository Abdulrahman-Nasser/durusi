<?php

namespace App\Models\Questions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';
    protected $filable = [
        'quesNum',
        'quesBody',
        'firstAns',
        'secondAns',
        'thirdAns',
        'fourthAns',
        'correctAns',
        'unitId',
        'groupId',
        'videoId'
    ];
}
