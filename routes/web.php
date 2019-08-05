<?php
// use Illuminate\Routing\Route;

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
    return view('welcome');
});
Route::middleware(['auth'])->group(function () {
    Route::resources([
        'users' => 'UserController',
        'exams' => 'ExamController',
        'questions' => 'QuestionController',
    ]);
});

Auth::routes(['register' => false, 'password.request' => false]);

Route::get('/home', 'HomeController@index')->name('home');
