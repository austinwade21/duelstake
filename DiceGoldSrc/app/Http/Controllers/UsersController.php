<?php


namespace App\Http\Controllers;


use App\Rules\MatchOldPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
    | URL:            /api/user/changePassword
    | Method:         post
    | Description:    Updates the authenticated user's password
    */
    public function changePassword(Request $request){
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
//            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        return response()->json([
            'name' => 'Password change successfully.',
            'state' => 'success'
        ]);
    }

    /*
    |-------------------------------------------------------------------------------
    | Updates a User's Profile
    |-------------------------------------------------------------------------------
    | Using API
    | URL:            /api/user/changePassword
    | Method:         post
    | Description:    Updates the authenticated user's password
    */
    public function changeEmail(Request $request){
        $request->validate([
            'new_email' => ['required', new MatchOldPassword],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        return response()->json([
            'name' => 'Password change successfully.',
            'state' => 'success'
        ]);
    }

}