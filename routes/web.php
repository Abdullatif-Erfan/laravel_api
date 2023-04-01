<?php
use App\Http\Controllers\StudentController;
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

Route::get('/student_list', [StudentController::class, "student_list"]);
Route::post('/student_add',[StudentController::class,"student_add"]);
Route::get('/student_delete/{id}', [StudentController::class, "student_delete"]);
Route::get('/student_by_id/{id}', [StudentController::class,"student_by_id"]);
Route::post('/student_update/{id}', [StudentController::class,"student_update"]);


