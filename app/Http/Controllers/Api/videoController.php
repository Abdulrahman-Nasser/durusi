<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Videos\Video;
use App\Models\Views\videoUnits\video_units;
use Illuminate\Http\Request;

class videoController extends Controller
{

    // get all videos
    public function index()
    {
        $videos = video_units::all();

        $message = [
            'message' => 'الفيديوهات المسجلة داخل المجموعات',
            'videos' => $videos,
            'status' => 200
        ];

        return response($message, 200);
    }

    // add new video
    public function store(Request $request)
    {
        // request validation for adding new video in video model
        $request->validate([
            'name' => 'required',
            'title' => 'required|string',
            'videoUpload' => "required",
            'unitID' => 'required',
            'groupID' => 'required'
        ]);

        // upload file
        $video_data = $request->file('videoUpload');
        $video_name = time() . $video_data->getClientOriginalName();
        $location = public_path('./Video/video_uploads/');
        $video_data->move($location, $video_name);


        // Create new video into video model
        $videos = new Video();

        $videos->name = $request->name;
        $videos->title = $request->title;
        $videos->url =   './Video/video_uploads/' . $video_name;
        $videos->unitID = $request->unitID;
        $videos->groupID = $request->groupID;
        $videos->save();


        $message = [
            "message" => 'Add New Video Success',
            'videoData' => $videos,
        ];

        return response($message, 200);
    }

    // viewing all videos
    public function getVideoPage()
    {
        $videos = video_units::all();
        return view('videos.video')->with('videos', $videos);
    }

    // get one video
    public function getOneVideo($id)
    {
        $videos = video_units::where('videoId', $id)->get();
    }
}
