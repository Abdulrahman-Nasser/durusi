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
            "first_name" => "required|string|min:3|max:20",
            "last_name" => 'required|string|min:3|max:20',
            "email" => "email|required|unique:users,email",
            "phone" => "required",
            "age" => "required",
            "gender" => "required",
            "password" => "required|confirmed|min:8"
        ]);
        $user = User::create([
            "first_name" => $data["first_name"],
            "last_name" => $data["last_name"],
            "email" => $data["email"],
            "phone" => $data["phone"],
            "age" => $data["age"],
            "gender" => $data["gender"],
            "favCourses" => $request->favCourses,
            "yearLevel" => $request->yearLevel,
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

    function guest()
    {

        $username = 'guest' . rand(-100000, 100000);
        $message = [
            "mesgae" => "welcome : " . $username,
        ];

        return response($message, 200);
    }

    function logout()
    {
        auth()->user()->tokens()->delete();
        return response([
            'message' => "Loged Out"
        ]);
    }
}
