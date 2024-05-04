<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Videos\Video;
use App\Models\Views\videoUnits\video_units;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class videoController extends Controller
{

    // get all videos
    public function index()
    {
        $videos = video_units::all();

        $message = [
            'message' => 'الفيديوهات المسجلة داخل المجموعات',
            'videos' => $videos ,
            'status' => 200
        ];

        return response($message, 200);
    }

    // add new video
    public function store(Request $request)
    {
        try {
            // request validation for adding a new video in the video model
            $request->validate([
                'title' => 'required|string',
                'videoUpload' => 'required|mimes:mp4,mov,avi', // Adjust accepted file types as needed
                'unitID' => 'required',
                'groupID' => 'required'
            ]);

            // upload file
            if ($request->hasFile('videoUpload')) {
                $video_data = $request->file('videoUpload');
                $video_name = time() . '_' . $video_data->getClientOriginalName();
                $location = public_path('Video/video_uploads/');
                $video_data->move($location, $video_name);

                // Create new video in the video model
                $video = new Video();

                $video->name = $video_name;
                $video->title = $request->title;
                $video->url = 'http://localhost:8000/videos/'. $video_name; // Adjust as needed
                $video->unitID = $request->unitID;
                $video->groupID = $request->groupID;
                $video->save();

                $message = [
                    "message" => 'Add New Video Success',
                    'videoData' => $video,
                ];

                return response()->json($message, 200);
            } else {
                // Handle case when no file is uploaded
                return response()->json(['error' => 'No file uploaded.'], 400);
            }
        } catch (\Exception $e) {
            // Handle any exceptions
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // viewing all videos
    public function getVideoPage()
    {
        $videos = video_units::all();
        return view('videos.video')->with('videos', $videos);
    }

    // get one video web route
    public function getOneVideo($name)
    {

        $videos = video_units::where('videoName', $name)->get();
        return view('videos.specificVideo')->with('videos', $videos);
    }

    // get one video api route
    public function getVideo($name)
    {
        $videos = video_units::where('videoName', $name)->get();

        $message = [
            'message' => 'get one video',
            'Video Data' => ['video' => $videos, 'url' => 'http://localhost:8000/videos/' . $name]

        ];

        return response($message, 200);
    }
}
