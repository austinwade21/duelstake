<?php

use Illuminate\Support\Facades\Auth;
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

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/{any}', function () {
    return view('home');
})->where('any', '^((?!admin|api|storage).)*');

Auth::routes(['verify' => true]);

//Route::get('/', 'HomeController@index');
//

//
//Route::get('/home', 'HomeController@index')->name('home');
//
//
//Route::middleware('auth')->get('/user/social', 'UsersController@social');
//
//Route::middleware('auth')->get('/user/discord/callback', 'UsersController@discordCallback');
//
//Route::middleware('auth')->get('/user/timeout/{username}/{seconds}', 'UsersController@timeout');
//
//Route::middleware('auth')->get('/user/untimeout/{username}', 'UsersController@unban');
//
//Route::middleware('auth')->get('/user/ban/{username}', 'UsersController@ban');
//
//Route::middleware('auth')->get('/user/unban/{username}', 'UsersController@unban');


