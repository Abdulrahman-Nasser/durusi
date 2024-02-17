<?php

use App\Http\Controllers\Api\levelController;
use App\Http\Controllers\AuthApiController\authController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Return_;




Route::post("/register", [authController::class, "register"]);
Route::post('login' , [authController::class , 'login']);
Route::middleware("auth:sanctum")->group(function () {


    //-------------------- Select Level Route ------------//
    Route::post('/select-level' , [levelController::class , 'selectLevel']);


    //--------------------- Logout route ----------------//
    Route::get('/logout', [authController::class, 'logout']);

});
