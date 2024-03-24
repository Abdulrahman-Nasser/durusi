<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Google\Service\ArtifactRegistry\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
class SocialiteController extends Controller
{
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }
    public function handelGoogleCallBack(){
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('social_id', $user->id)->first();

            if ($finduser) {
                Auth::login($finduser);
                return response()->json($finduser);
            } else {
                $newUser = User::create([
                    "name" => $user->name,
                    "email" => $user->email,
                    // Add other required fields here
                    "password" => bcrypt(rand(100 , 1000)), // Do not store social passwords like this
                    "social_id" => $user->id,
                    "social_type" => 'google',
                ]);
                Auth::login($newUser);
                return response()->json($newUser);
            }
        } catch(Exception $e) {
            // Handle the exception gracefully, log the error, and return a meaningful response
            return response()->json(['error' => 'An error occurred while processing the request.']);
        }
    }
}
