<?php

namespace App\Http\Controllers\AuthApiController;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class authController extends Controller
{
    function register(Request $request)
    {
        $data = $request->validate([
            "name" => "required|string|min:3|max:25",
            "email" => "email|required|unique:users,email",
            "phone" => "required",
            "age" => "required",
            "gender" => "required",
            "favCourses" =>"required|string",
            "password" => "required|confirmed"
        ]);
        $user = User::create([
            "name"=>$data["name"],
            "email"=>$data["email"],
            "phone"=>$data["phone"],
            "age"=>$data["age"],
            "gender"=>$data["gender"],
            "favCourses"=>$data["favCourses"],
            "password"=>$data["password"],
        ]);
        $token= $user->createToken("durusiRegister")->plainTextToken;

        $response=[
            "massage"=>"Welcome New User",
            "user"=>$user,
            "token"=>$token
        ];
        return response($response,200);
    }
}
