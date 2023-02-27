<?php

use App\Http\Controllers\API\V1\BillController;
use App\Http\Controllers\API\V1\CourseController;
use App\Http\Controllers\API\V1\FeedbackController;
use App\Http\Controllers\API\V1\LessonController;
use App\Http\Controllers\API\V1\TestController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\API\V1'], function () {
    Route::apiResource('courses', CourseController::class);
});
