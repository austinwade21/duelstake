<?php


namespace App\Http\Controllers;


class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
    |-------------------------------------------------------------------------------
    | Updates a User's Profile
    |-------------------------------------------------------------------------------
    | Using API
    | URL:            /user/changePassword
    | Method:         post
    | Description:    Updates the authenticated user's password
    */
    public function changePassword(){

    }

    /*
    |-------------------------------------------------------------------------------
    | Updates a User's Profile
    |-------------------------------------------------------------------------------
    | Using API
    | URL:            /user/changePassword
    | Method:         post
    | Description:    Updates the authenticated user's password
    */
    public function getUserSettings(){

    }

}