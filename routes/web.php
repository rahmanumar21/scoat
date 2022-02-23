<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
    return view('auth/login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('redirects', [HomeController::class, 'index']);
Route::resource('courses/list', CoursesController::class);
Route::resource('attendances/att_list', AttendanceController::class);
Route::get('attendances/att_spec_list/{id}', "CoursesController@show");
Route::get('/export', [App\http\Controllers\AttendanceController::class, 'export']);



//Route::post('courses', [App\Http\Controllers\CoursesController::class, 'store'])->name('store');

//Views
Route::get('lecturer/dashboard', 'HomeController@index')->name('lecturer.dashboard');



