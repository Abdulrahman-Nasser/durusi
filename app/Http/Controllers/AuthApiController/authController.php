<?php

namespace App\Http\Controllers\AuthApiController;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            "favCourses" => "required|string",
            "password" => "required|confirmed"
        ]);
        $user = User::create([
            "name" => $data["name"],
            "email" => $data["email"],
            "phone" => $data["phone"],
            "age" => $data["age"],
            "gender" => $data["gender"],
            "favCourses" => $data["favCourses"],
            "password" => bcrypt($data["password"]),
        ]);
        $token = $user->createToken("durusiRegister")->plainTextToken;

        $response = [
            "massage" => "Welcome New User",
            "user" => $user,
            "token" => $token
        ];
        return response($response, 200);
    }



    function login(Request $request)
    {
        $data = $request->validate([
            'email' => "required|email",
            'password' => "required"
        ]);

        $user = User::where('email', '=', $data['email'])->first();
        if (!$user || !Hash::check($data['password'], $user->password)) {
            return ('wrong Email or password');
        }

        $token = $user->createToken('durusi')->plainTextToken;

        $response = [
            'message' => "Welcome again",
            'user' => $user,
            'token' => $token
        ];

        return response($response, 200);
    }

    function logout()
    {
        auth()->user()->tokens()->delete();
        return response([
            'message' => "Loged Out"
        ]);
    }
}
