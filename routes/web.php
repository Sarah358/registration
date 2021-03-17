<?php

use App\Http\Controllers\UserController;
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
// route to show login form
Route::get('/login',[UserController::class, 'login']);

// route to process login form
Route::post('login',[UserController::class, 'dologin']);

// route for success login
Route::get('/success',[UserController::class, 'success']);

// logout route
Route::get('/logout','UserController@logout');
