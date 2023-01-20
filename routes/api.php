<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TeacherController;
use App\Models\Experience;
use App\Models\Subject;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::post("register/teacher", [TeacherController::class, 'register']);

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth',
], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::get('/user', function () {
    return Auth::user();
});

Route::get('/experiences', function () {
    return Experience::all(['id', 'name']);
});

Route::get('/subjects', function () {
    return Subject::all(['id', 'name']);
});

Route::get("user/{id}", [TeacherController::class, 'getUserById']);

Route::get("teacher/approved/{id}", [TeacherController::class, 'approved']);
