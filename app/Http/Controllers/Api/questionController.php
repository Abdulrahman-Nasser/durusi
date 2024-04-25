<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Questions\Question;
use Illuminate\Http\Request;

class questionController extends Controller
{
    //get all questions
    public function index()
    {
        // $questions = Question::select('id' , 'quesNum' , 'quesBody' , 'firstAns' , 'secondAns' , 'thirdAns' , 'fourthAns' , 'correctAns' )->get();
        $questions = Question::all();

        $message = [
            'message' => 'get All Questions',
            'question' => ['questionData' => $questions],
            'status' => "200 ok"
        ];

        return response($message, 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'quesNum' => 'required',
            'quesBody' => 'required',
            'firstAns' => 'required',
            'secondAns' => 'required',
            'thirdAns' => 'required',
            'fourthAns' => 'required',
            'correctAns' => 'required',
            'unitId' => 'required',
            'groupId' => 'required',
            'videoId' => 'required'
        ]);

        $questions = new Question();

        $questions->quesNum = $data['quesNum'];
        $questions->quesBody = $data['quesBody'];
        $questions->firstAns = $data['firstAns'];
        $questions->secondAns = $data['secondAns'];
        $questions->thirdAns = $data['thirdAns'];
        $questions->fourthAns = $data['fourthAns'];
        $questions->correctAns = $data['correctAns'];
        $questions->unitId = $data['unitId'];
        $questions->groupId = $data['groupId'];
        $questions->videoId = $data['videoId'];
        $questions->save();


        $message = [
            'message' => 'add Question Done',
            'quesResponse' => $questions,
            'status' => 200
        ];

        return response($message, 200);
    }
}
