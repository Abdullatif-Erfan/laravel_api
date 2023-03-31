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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[StudentController::class, "welcome"]);
Route::get('/student_add_form', [StudentController::class, "student_add_form"]);
Route::get('/student_list', [StudentController::class, "student_list"]);
Route::post('/student_add',[StudentController::class,"student_add"]);
Route::get('/student_delete/{id}', [StudentController::class, "student_delete"]);
Route::get('/student_search',[StudentController::class,"student_search"]);
Route::get('/student_update_form/{id}', [StudentController::class,"student_update_form"]);
Route::post('/student_update/{id}', [StudentController::class,"student_update"]);

