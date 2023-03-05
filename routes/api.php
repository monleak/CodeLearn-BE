<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\V1\Auth\LoginController;
use App\Http\Controllers\API\V1\Auth\RegisterController;
use App\Http\Controllers\API\V1\CourseController;
use App\Http\Controllers\API\V1\FeedbackController;
use App\Http\Controllers\API\V1\PermissionController;
use App\Http\Controllers\API\V1\LessonController;
use App\Http\Controllers\API\V1\UserController;

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

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\API\V1'], function () {
    // Authentication APIs
    Route::post('login', [LoginController::class, 'login']);
    Route::post('register', [RegisterController::class, 'register']);
    Route::middleware('auth:sanctum')->get('/current-user', [UserController::class, 'currentUser']);

    Route::apiResource('courses', CourseController::class);
    Route::apiResource('users', UserController::class);
    Route::apiResource('chapters', ChapterController::class);

    Route::get('courses/{course}/curriculum', [CourseController::class, 'getCurriculum']);

    Route::group(["prefix" => "lessons"], function () {
        Route::get("{lesson}", [LessonController::class, 'show']);
        Route::post("create-lesson/{chapter}", [LessonController::class, 'store']);
        Route::delete("{lesson}", [LessonController::class, 'destroy']);
    });

    Route::group(["prefix" => "role"], function () {
        Route::get("all", [PermissionController::class, 'getAllRoles']);
        // Route::get("employees", [PermissionController::class, 'getAllEmployeesWithRole']);
        Route::post("create", [PermissionController::class, 'createRole']);
        Route::put("{role}", [PermissionController::class, 'updateRole']);
        Route::delete("{role}", [PermissionController::class, 'deleteRole']);

        Route::post("{role}/assign-to-user/{user}", [PermissionController::class, 'assignRoleToUser']);
        Route::put("{role}/remove-from-user/{user}", [PermissionController::class, 'removeRoleFromUser']);
    });

    Route::group(["prefix" => "permission"], function () {
        Route::get("all", [PermissionController::class, 'getAllPermissions']);
        // Route::get("by-user/{user}", [PermissionController::class, 'getPermissionsByUser']);

        Route::post("{permission}/add-to-role/{role}", [PermissionController::class, 'addPermissionToRole']);
        Route::put("{permission}/remove-from-role/{role}", [PermissionController::class, 'removePermissionFromRole']);
    });
    Route::group(["prefix" => "feedback"], function () {
        Route::get("/", [FeedbackController::class, 'index']);
        Route::post("create", [FeedbackController::class, 'store']);
        Route::put("update/{feedback}", [FeedbackController::class, 'update']);
    });
});
