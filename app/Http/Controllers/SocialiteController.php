<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
class SocialiteController extends Controller
{
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }
    public function handelGoogleCallBack(){
        try{
            $user = Socialite::driver('google')->user();
            $finduser=User::where('social_id',$user->id)->first();
            if($finduser){
                Auth::login($finduser);
                return response()->json($finduser);
            }else{
                $newuser=User::create([
                    "name" => $user["name"],
                    "email" => $user["email"],
                    "phone" => $user["phone"],
                    "age" => $user["age"],
                    "gender" => $user["gender"],
                    "favCourses" => $user["favCourses"],
                    "password" => bcrypt($user["password"]),
                    "social_id" => $user["id"],
                    "social_type"=> 'google',
                ]);
                Auth::login($newuser);
                return redirect()->json($newuser);
            }
        } catch(Exception $e){
            dd($e->getMessage());
        }
    }

}
