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

Route::middleware('auth:api')->get('/user', function (Request $request) {
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
Route::middleware('auth:api')->post('/user/changePassword', 'UsersController@changePassword');

/*
|-------------------------------------------------------------------------------
| Updates a User's Profile
|-------------------------------------------------------------------------------
| URL:            /api/user/changePassword
| Controller:     UsersController@changeEmail
| Method:         POST
| Description:    Updates the authenticated user's email
*/
Route::middleware('auth:api')->post('/user/changeEmail','UsersController@changeEmail');

/*
|-------------------------------------------------------------------------------
| Updates a User's Profile
|-------------------------------------------------------------------------------
| URL:            /api/user/setHideUserName
| Controller:     UsersController@setHideUserName
| Method:         POST
| Description:    Updates the authenticated user's Hide My User Name
*/
Route::middleware('auth:api')->post('/user/setHideUserName','UsersController@setHideUserName');
