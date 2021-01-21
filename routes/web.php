<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Route::get('/k', function () {
    return "hola";
})->middleware('auth:trabajador');

Route::get('/k', function () {
    return "hola";
})->middleware('auth:trabajador');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();
//Login Routes
// Route::get('/login','Auth\LoginController@showLoginForm')->name('login');
// Route::post('/login','Auth\LoginController@login');
// Route::post('/logout','Auth\LoginController@logout')->name('logout');

// //Forgot Password Routes
// Route::get('/password/reset','Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// Route::post('/password/email','Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

// //Reset Password Routes
// Route::get('/password/reset/{token}','Auth\ResetPasswordController@showResetForm')->name('password.reset');
// Route::post('/password/reset','Auth\ResetPasswordController@reset')->name('password.update');

//RUTAS TRABAJADORES
//Registro

Route::get("/register/trabajadores","Auth\Trabajador\RegisterController@showRegisterForm")
    ->name("register.trabajadores")->middleware("auth");
Route::post("/register/trabajadores","Auth\Trabajador\RegisterController@register");

Route::get('/login/trabajadores','Auth\Trabajador\LoginController@showLoginForm')->name('login.trabajadores');
Route::post('/login/trabajadores','Auth\Trabajador\LoginController@login');
