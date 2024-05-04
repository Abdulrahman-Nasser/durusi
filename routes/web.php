<?php

use App\Http\Controllers\Api\teacherController;
use App\Http\Controllers\Api\videoController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', function () {
    return view('home');
});

Route::prefix('endpoints')->group(function () {
    Route::get('durusi', [HomeController::class, 'endpoint'])->name('endpoint');
});

Route::get('showTeacher/{name}', [teacherController::class, 'showTeacher']);
Route::middleware('guest')->group(function () {
    Route::get("viewingVideo", [videoController::class, 'getVideoPage'])->name('user.getVideo');
    Route::get("videos/{url}", [videoController::class, 'getOneVideo'])->name('user.getOneVideo');
});
