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

Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('/home', 'App\Http\Controllers\HomeController@index')->middleware(["LoggedIn"]);
Route::get('/admin', 'App\Http\Controllers\AdminController@index')->middleware(["LoggedIn", "IsAdmin"]);

Route::get('/login', 'App\Http\Controllers\LoginController@index');
Route::get("/logout", "App\Http\Controllers\LoginController@logout")->middleware(["LoggedIn"]);

Route::post('/login', 'App\Http\Controllers\LoginController@login');
Route::post("/insertContact", 'App\Http\Controllers\ContactController@insertContact')->name("insertContact");

