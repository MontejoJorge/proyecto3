<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers;

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

Route::view('/','welcome');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view("k","k")->middleware("auth")->name("k");



Auth::routes();

//Rutas trabajadores
Route::get('register/admin', 'Auth\_WorkerRegisterController@register');
Route::post('register/admin', 'Auth\_WorkerRegisterController@store')->name("post.worker.register");

Route::get('login/admin', 'Auth\_WorkerLoginController@login')->name('Workerlogin');
Route::post('login/admin', 'Auth\_WorkerLoginController@authenticate');
Route::get('logout/admin', 'Auth\_WorkerLoginController@logout')->name('Workerlogout');

