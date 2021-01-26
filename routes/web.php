<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Obra;

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
    // User::factory()
    // ->count(40)
    // ->has(
    //     Obra::factory()
    //     ->count(100)
    //     ->state([
    //         "building_type" => "1",
    //         "construction_type" => "1"
    //     ])
    //     )
    // ->create();

    return view('welcome');
});

Auth::routes();

//Grupo home
Route::group(['prefix' => 'home',"middleware" => "auth"], function () {

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::group(['prefix' => 'obras'], function () {
        Route::get("/crear","ObraController@create")->name("obra.crear");
        Route::post("/crear","ObraController@store")->name("obra.store");
    });

    //Solo para cordinadores
    Route::middleware("role:coordinador")->group(function (){
        //Registro de trabajadores
        Route::get("/register","Auth\Trabajador\RegisterController@showRegisterForm")
        ->name("register.trabajadores");

        Route::post("/register","Auth\Trabajador\RegisterController@TrabajadorRegister");

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

        //Obras
        Route::group(['prefix' => 'obras'], function () {
            Route::get("/", "ObraController@index")->name("obra.index");
            Route::get("/ver/{id}", "ObraController@show")->name("obra.show");
            //Asignar tecnicos
            Route::post("/ver/{id}", "ObraController@trabajador")->name("obra.trabajador");
        });
    });


});