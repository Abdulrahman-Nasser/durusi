<?php

use App\Http\Controllers\AuthApiController\authController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Return_;




Route::post("/register", [authController::class, "register"]);
Route::post('login' , [authController::class , 'login']);
Route::middleware("auth:sanctum")->group(function () {
    Route::get('/logout', [authController::class, 'logout']);
    Route::get("/home", function () {
        return response("Hello", 200);
    });
});
