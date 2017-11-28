<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function (){
    return view('welcome');
});

Route::get('/emploi', function () {
    return view('emploi');
});

Route::get("/etudiants", function() {
   return App\Personnes::all();
});

Route::get("/crypt" , function () {
    return bcrypt("salades") . "  ".str_random(10);
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
