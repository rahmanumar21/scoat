<?php

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

Route::post('login','StudentController@login');
Route::post('register','StudentController@register');

Route::middleware(['auth:api'])->group(function () {
    Route::get('user','StudentController@index');
    Route::get('get_student_locations','StudentLocationController@show');
    Route::post('student_locations','StudentLocationController@index');
    Route::post('attendance','AttendanceController@attendances_api');
    Route::get('course','CoursesController@courses_api');
    // Route::resource('course', CoursesController::class);
    Route::post('logout','StudentController@logout');
});
