<?php


namespace App\Http\Controllers;


use App\Rules\MatchOldPassword;
use App\User;
use Illuminate\Http\JsonResponse;
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

    /**
     * URL:            /api/user/changePassword
     * Method:         post
     * Description:    Updates the authenticated user's password
     * @param Request $request
     * @return JsonResponse
     */
    public function changePassword(Request $request){
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
//            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        return response()->json([
            'message' => 'Password changed successfully.',
            'state' => 'success',
            'data' => ['user' => auth()->user(), 'request' => $request->all()],
        ]);
    }

    /**
     * URL:            /api/user/changeEmail
     * Method:         post
     * Description:    Updates the authenticated user's email
     * @param Request $request
     * @return JsonResponse
     */
    public function changeEmail(Request $request){
        User::find(auth()->user()->id)->update(['email'=> $request->email]);
        return response()->json([
            'message' => 'Email changed successfully.',
            'state' => 'success',
            'data' => ['user' => auth()->user(), 'request' => $request->all()],
        ]);
    }

    /**
     * URL:            /api/user/setHideUserName
     * Method:         post
     * Description:    Updates the authenticated user's Hide My User Name field
     * @param Request $request
     * @return JsonResponse
     */
    public function setHideUserName(Request $request){
        $hide = false;
        if($request->hide_user_name == "on"){
            $hide = true;
        }
        User::find(auth()->user()->id)->update(['hide_user_name'=> $hide]);
        return response()->json([
            'message' => 'Hide Username changed successfully.',
            'state' => 'success',
            'data' => ['user' => auth()->user(), 'request' => $request->all(), 'value'=>$hide],
        ]);
    }
}