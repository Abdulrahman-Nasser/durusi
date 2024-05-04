<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Teacher\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class teacherController extends Controller
{
    //
    public function index()
    {

        $teachers = Teacher::all();
        return response()->json([
            'message' => 'get all teachers',
            "teachers Data" => $teachers
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'phone' => "required",
            'imageUpload' => 'required',
            'courseID' => 'required',
            'levelID' => 'required'

        ]);


        $teachers = new Teacher();
        $teachers->name = $request->name;
        $teachers->phone = $request->phone;
        $teachers->age = $request->age;


        $imageFile = $request->file('imageUpload');
        $imageName = time() . rand() . $imageFile->getClientOriginalName();
        $location = public_path('uploads/img/');
        $imageFile->move($location, $imageName);
        $teachers->image =  $imageName;
        $teachers->path = 'http://localhost:8000/showTeacher/' . $imageName;
        $teachers->course_id = 1;
        $teachers->level_id = 1;

        $teachers->save();

        return response()->json([
            'message' => 'add new teacher',
            "teachers Data" => $teachers
        ]);
    }

    public function showTeacher($name)
    {
        $teachers = Teacher::where('image', $name)->get();
        return view('teacher.profile')->with('teachers', $teachers);
    }
}


