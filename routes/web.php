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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get("/home/register","Auth\Trabajador\RegisterController@showRegisterForm")
    ->middleware("auth", "role:coordinador")
    ->name("register.trabajadores");

Route::post("/home/register","Auth\Trabajador\RegisterController@TrabajadorRegister");

Route::get("/home/tipoEdificios", "TipoEdificioController@index");

Route::get("/home/tipoEdificios/crear", "TipoEdificioController@create");
Route::post("/home/tipoEdificios/crear", "TipoEdificioController@store")->name("tipoEdificio.store");


// Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
//     Route::get("/register","Auth\Trabajador\RegisterController@showRegisterForm")
//     ->middleware("auth", "role:coordinador")
//     ->name("register.trabajadores");
//     Route::post("/home/register","Auth\Trabajador\RegisterController@TrabajadorRegister");
// });