<?php

use App\Http\Controllers\Api\levelController;
use App\Http\Controllers\Api\unitController;
use App\Http\Controllers\Api\videoController;
use App\Http\Controllers\AuthApiController\authController;
use App\Http\Controllers\SocialiteController;
use Illuminate\Support\Facades\Route;




Route::post("/register", [authController::class, "register"]);
Route::post('login', [authController::class, 'login']);
// Route::get('auth/google', [SocialiteController::class, 'redirectToGoogle'])->middleware('web');
// Route::get('auth/google/callback', [SocialiteController::class, 'handelGoogleCallBack'])->middleware('web');
Route::middleware("auth:sanctum")->group(function () {

    //*************************************  Level Controller   *****************************//
    //-------------------- Select Level  ------------//
    Route::post('/selectLevel', [levelController::class, 'selectLevel']);
    //-------------------- Select Details Subject----------//
    Route::get('/selectGroupDetalis/{id}', [levelController::class, 'detailsCourse']);

    //*************************************  video Controller   *****************************//
    // ------------------- Get All Videos -----------------//
    Route::get('/videos', [videoController::class, 'index']);
    // ------------------- Add New Video -----------------//
    Route::post('/videos', [videoController::class, 'store']);

    //*************************************  unit Controller   *****************************//
    // ------------------- Get All units -----------------//
    Route::get('/units', [unitController::class, 'index']);
    // ------------------- Add New Unit -----------------//
    Route::post('/units', [unitController::class, 'store']);


    //--------------------- Logout  ----------------------//
    Route::get('/logout', [authController::class, 'logout']);
});


Route::middleware("guest")->group(function () {
    Route::get('/login-guest', [authController::class, 'guest']);
    Route::post('/select-level-guest', [levelController::class, 'selectLevel']);

    //-------------------- Select Details Course----------//
    Route::get('/details-course-guest/{id}', [levelController::class, 'detailsCourse']);
    //-------------------- Select Groups by Course name --//
    Route::get('/select-group-guest/{course_name}', [levelController::class, 'filterByCourseName']);
});
