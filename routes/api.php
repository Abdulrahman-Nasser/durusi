<?php

use App\Http\Controllers\Api\levelController;
use App\Http\Controllers\AuthApiController\authController;
use App\Http\Controllers\SocialiteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Return_;




Route::post("/register", [authController::class, "register"]);
Route::post('login' , [authController::class , 'login']);
Route::get('auth/google',[SocialiteController::class , 'redirectToGoogle'])->middleware('web');
Route::get('auth/google/callback',[SocialiteController::class , 'handelGoogleCallBack'])->middleware('web');
Route::middleware("auth:sanctum")->group(function () {


    //-------------------- Select Level Route ------------//
    Route::post('/select-level' , [levelController::class , 'selectLevel']);


    //--------------------- Logout route ----------------//
    Route::get('/logout', [authController::class, 'logout']);

});
