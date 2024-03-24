<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Views\GroupDataView\groups_data;
use App\Models\Units\Unit;
use App\Models\Videos\Video;
use App\Models\Views\questions_groups_units\QuestionsData;
use App\Models\Views\videoUnits\video_units;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class levelController extends Controller
{
    //select level controller
    public function selectLevel(Request $request)
    {
        $data = $request->validate([
            'levelName' => "required",
        ]);


        // here i get groups Model to make a response that contain group id
        $groups = groups_data::where('Level_name', $data['levelName'])->get();
        $groupID = $groups->pluck('id')->all();

        // here i get the units to make a compare withe video model to send an array with videos
        $units = Unit::where('groupID', '=', $groupID)->get();
        $unitID = $units->pluck('id')->all();

        $videos = video_units::where('unitId', $unitID)->get();
        $videoId = $videos->pluck('id')->all();

        // this get all the questions that related with the video and unit and group
        $questions = QuestionsData::where('groupId', $groupID)->where('unitId', $unitID)->where('videoId', $videoId)->get();

        // response for mobile API
        $response = [
            'message' => "جميع المجموعات الخاصة بالسنة الدراسية - " . $data['levelName'],
            'group_data' => $groups,
            'units' => ['unitsData' => $units, 'videoList' => $videos, 'questionList' => $questions]
        ];
        return response($response, 200);
    }

    // selecting groups denpending on the course name
    public function filterByCourseName($course_name)
    {

        $groups = groups_data::where('course_name', $course_name)->get();

        if ($groups->isEmpty()) {
            $response = [
                'message' => "لا توجد بيانات متاحة لهذه الدورة - " . $course_name,
                'group_data' => [],
            ];
        } else {
            $response = [
                'message' => "جميع المجموعات الخاصة بالسنة الدراسية واسم الدورة - " . $course_name,
                'group_data' => $groups,
            ];
        }

        return response($response, 200);
    }

    // slecting details course
    public function detailsCourse($id)
    {
        $groups = groups_data::where('id', $id)->get();
        if ($groups->isEmpty()) {
            $response = [
                'message' => "لا توجد بيانات متاحة لهذه المجموعة",
                'group_data' => [],
            ];
        } else {
            foreach ($groups as $data) {
                $group_name = $data->Group_name;
                $response = [
                    'message' => "بيانات تفصيلية - " . $group_name,
                    'group_data' => $groups,
                ];
            }
        }

        return response($response, 200);
    }

    // selecting unit for the group


}
