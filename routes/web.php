<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManageController;
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

Route::get('/', function () {
    return view('main');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/courses', 'index');
    Route::get('/courses/{id}', 'index');
    
    Route::get('/cart', 'index');
    Route::get('/my-learning', 'index');
    Route::get('/learn/{courseId}/{lessonId}', 'index');
});

Route::controller(ManageController::class)->group(function () {
    Route::group(['prefix' => 'manage'], function () {
        Route::get('/', 'index');
    });
});

Route::get('/welcome', function () {
    return view('welcome');
});
