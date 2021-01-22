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

//Grupo home
Route::group(['prefix' => 'home',"middleware" => "auth"], function () {

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //Solo para cordinadores
    Route::middleware("role:coordinador")->group(function (){
        //Registro de trabajadores
        Route::get("/register","Auth\Trabajador\RegisterController@showRegisterForm")
        ->name("register.trabajadores");

        Route::post("/register","Auth\Trabajador\RegisterController@TrabajadorRegister")
        ->middleware("auth", "role:coordinador");

        //Tipos de edificios
        Route::group(['prefix' => 'tipos-edificios'], function () {
            Route::get("/", "TipoEdificioController@index");
            //Crear
            Route::get("/crear", "TipoEdificioController@create")->name("tipoEdificio.crear");
            Route::post("/crear", "TipoEdificioController@store")->name("tipoEdificio.store");
        });

        //Tipos de obras
        Route::group(['prefix' => 'tipos-obras'], function () {
            Route::get("/", "TipoObraController@index");
            //Crear
            Route::get("/crear", "TipoObraController@create")->name("tipoObra.crear");
            Route::post("/crear", "TipoObraController@store")->name("tipoObra.store");
        });
    });


});