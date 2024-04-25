<?php

use App\Http\Controllers\Api\videoController;
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



Route::middleware('guest')->group(function () {
    Route::get("viewingVideo", [videoController::class, 'getVideoPage'])->name('user.getVideo');
    Route::get("videos/{url}", [videoController::class, 'getOneVideo'])->name('user.getOneVideo');
});
