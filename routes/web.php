<?php

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
    return view('welcome');
});

Auth::routes();
Route::resource('todo', 'TodoController')->middleware('auth');
Route::post('/todo/change-status', 'TodoController@changeStatus')->name('todo.change-status')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home');
