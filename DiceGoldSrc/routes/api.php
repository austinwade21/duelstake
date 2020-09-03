<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*
|-------------------------------------------------------------------------------
| Updates a User's Profile
|-------------------------------------------------------------------------------
| URL:            /api/user/changePassword
| Controller:     UsersController@changePassword
| Method:         POST
| Description:    Updates the authenticated user's password
*/
Route::middleware('auth:sanctum')->post('/user/changePassword', 'UsersController@changePassword');

/*
|-------------------------------------------------------------------------------
| Updates a User's Profile
|-------------------------------------------------------------------------------
| URL:            /api/user/changePassword
| Controller:     UsersController@changeEmail
| Method:         POST
| Description:    Updates the authenticated user's email
*/
Route::middleware('auth:sanctum')->post('/user/changeEmail','UsersController@changeEmail');

/*
|-------------------------------------------------------------------------------
| Updates a User's Profile
|-------------------------------------------------------------------------------
| URL:            /api/user/setHideUserName
| Controller:     UsersController@setHideUserName
| Method:         POST
| Description:    Updates the authenticated user's Hide My User Name
*/
Route::middleware('auth:sanctum')->post('/user/setHideUserName','UsersController@setHideUserName');

/*
|-------------------------------------------------------------------------------
| Updates a User's Profile
|-------------------------------------------------------------------------------
| URL:            /api/user/social/unlink
| Controller:     UsersController@socialUnlink
| Method:         POST
| Description:    Unlink Social account
*/
Route::middleware('auth:sanctum')->post('/user/social/unlink', 'UsersController@socialUnlink');

/*
|-------------------------------------------------------------------------------
| Store a New Bet
|-------------------------------------------------------------------------------
| URL:            /api/bet/store
| Controller:     BetController@store
| Method:         POST
| Description:    Store Bet data
*/
Route::middleware('auth:sanctum')->post('/bet/store', 'BetController@store');

/*
|-------------------------------------------------------------------------------
| Get betting histories
|-------------------------------------------------------------------------------
| URL:            /api/bet/index
| Controller:     BetController@index
| Method:         GET
| Description:    List Bet History
*/
Route::middleware('auth:sanctum')->get('/bet/index', 'BetController@index');

/*
|-------------------------------------------------------------------------------
| Get Betting Statistics
|-------------------------------------------------------------------------------
| URL:            /api/bet/statistics
| Controller:     BetController@statistics
| Method:         GET
| Description:    Get Betting Statistics
*/
Route::middleware('auth:sanctum')->get('/bet/statistics', 'BetController@statistics');

/*
|-------------------------------------------------------------------------------
| Get Public Messages
|-------------------------------------------------------------------------------
| URL:            /api/messages
| Controller:     MessagesController@index
| Method:         GET
| Description:    Get Public Messages
*/
Route::get('/messages/{startId}', 'MessagesController@index');

/*
|-------------------------------------------------------------------------------
| Send a new message
|-------------------------------------------------------------------------------
| URL:            /api/messages/store
| Controller:     MessagesController@store
| Method:         POST
| Description:    Send a new message
*/
Route::middleware('auth:sanctum')->post('/messages/send', 'MessagesController@store');

/*
|-------------------------------------------------------------------------------
| Save profile image
|-------------------------------------------------------------------------------
| URL:            /api/user/avatar/save
| Controller:     MessagesController@store
| Method:         POST
| Description:    Save profile image
*/
Route::middleware('auth:sanctum')->post('/user/avatar/save', 'UsersController@saveAvatar');
