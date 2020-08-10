<?php


namespace App\Http\Controllers;


use App\Rules\MatchOldPassword;
use App\SocialData;
use App\SocialProvider;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;
use TCG\Voyager\Http\Controllers\VoyagerUserController;

class UsersController extends VoyagerUserController
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
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
//            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
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
    public function changeEmail(Request $request)
    {
        User::find(auth()->user()->id)->update(['email' => $request->email]);
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
    public function setHideUserName(Request $request)
    {
        $hide = false;
        if ($request->hide_user_name == "on") {
            $hide = true;
        }
        User::find(auth()->user()->id)->update(['hide_user_name' => $hide]);
        return response()->json([
            'message' => 'Hide Username changed successfully.',
            'state' => 'success',
            'data' => ['user' => auth()->user(), 'request' => $request->all(), 'value' => $hide],
        ]);
    }

    /**
     * URL:            /user/discord
     * Method:         get
     * Description:    redirect to discord provider service
     * @param Request $request
     * @return RedirectResponse
     */
    public function discord(Request $request)
    {
        return Socialite::driver('Discord')->stateless()->redirect();
    }

    /**
     * URL:            /user/social
     * Method:         get
     * Description:    redirect to discord provider service
     * @param Request $request
     * @return RedirectResponse
     */
    public function social(Request $request)
    {
        $socialId = $request->input('social_id');
        $social = SocialProvider::find($socialId);
        return Socialite::driver($social->driver)->stateless()->redirect();
    }

    /**
     * URL:            /api/user/social/unlink
     * Method:         get
     * Description:    redirect to discord provider service
     * @param Request $request
     * @return RedirectResponse
     */
    public function socialUnlink(Request $request){
        $socialId = $request->input('social_id');
        $affectedRows = SocialData::where('user_id', Auth::id())->where('social_id', $socialId)->delete();
        return response()->json([
            'message' => "$affectedRows records removed successfully.",
            'state' => 'success',
            'data' => ['request' => $request->all(), 'social_id' => $socialId],
        ]);

    }

    /**
     * URL:            /user/discord/callback
     * Method:         post
     * Description:    receive discord user information
     * @param Request $request
     * @return RedirectResponse
     */
    public function discordCallback(Request $request)
    {
        $discord = Socialite::driver('discord')->stateless()->user();
        if (empty($discord)) {
            $request->session()->flash('message.level', 'danger');
            $request->session()->flash('message.content', 'Discord provider is not registered! Please contact to support.');
        }
        $socialDiscord = SocialProvider::where('name', '=', 'Discord')->firstOrFail();
        $user = auth()->user();
        try {
            $exists = SocialData::where('user_id', '=', $user->id)->where('social_id', '=', $socialDiscord)->get();
            if (!$exists->isEmpty()) {
                $request->session()->flash('message.level', 'danger');
                $request->session()->flash('message.content', 'You have already linked Discord!');
                return redirect(route('home'));
            }
            $property = new SocialData([
                'property_name' => 'id',
                'property_value' => $discord->getId(),
                'social_id' => $socialDiscord->id,
                'user_id' => $user->id,
            ]);
            $property->save();
            $property = new SocialData([
                'property_name' => 'name',
                'property_value' => $discord->getName(),
                'social_id' => $socialDiscord->id,
                'user_id' => $user->id,
            ]);
            $property->save();

            if (!empty($discord->getNickname())) {
                $property = new SocialData([
                    'property_name' => 'nickname',
                    'property_value' => $discord->getNickname(),
                    'social_id' => $socialDiscord->id,
                    'user_id' => $user->id,
                ]);
                $property->save();
            }

            if (!empty($discord->getEmail())) {
                $property = new SocialData([
                    'property_name' => 'email',
                    'property_value' => $discord->getEmail(),
                    'social_id' => $socialDiscord->id,
                    'user_id' => $user->id,
                ]);
                $property->save();
            }
            if (!empty($discord->getAvatar())) {
                $property = new SocialData([
                    'property_name' => 'avatar',
                    'property_value' => $discord->getAvatar(),
                    'social_id' => $socialDiscord->id,
                    'user_id' => $user->id,
                ]);
                $property->save();
            }
        } catch (QueryException $ex) {
            $request->session()->flash('message.level', 'danger');
            $request->session()->flash('message.content', $ex->getMessage());
        }

        return redirect(route('home'));
    }

    /**
     * URL:            /api/user/avatar/save
     * Method:         post
     * Description:    redirect to discord provider service
     * @param Request $request
     * @return JsonResponse
     */
    public function saveAvatar(Request $request){
        $user = Auth::user();
        $data = $request->input('avatar');
        $result = [
            'message' => "Avatar saved successfully.",
            'state' => 'success',
            'data' => ['request' => $request->all()],
        ];
        if (preg_match('/data:image\/(gif|jpeg|png);base64,(.*)/i', $data, $matches)) {
            $imageType = $matches[1];
            $imageData = base64_decode($matches[2]);
            $image = imagecreatefromstring($imageData);
            $filename = 'users/' . \auth()->id() . '_' . md5($imageData) . '.png';

            if (imagepng($image, storage_path('app/public/'.$filename))) {
                $oldAvatar = storage_path('app/public/'.$user->avatar);
                if($oldAvatar == $filename){
                    $result['message'] = 'Same image uploaded.';
                    $result['data'] = ['avatar_url'=>$filename, 'old_avatar'=>$oldAvatar, 'delete_result' => false];
                    return response()->json($result);
                }
                    // delete old avatar.
                if(file_exists($oldAvatar))
                {
                    $deleteResult = unlink($oldAvatar);
                }
                else{
                    $deleteResult = true;
                }
                $user->avatar = $filename;
                $user->save();
                $result['data'] = ['avatar_url'=>$filename, 'old_avatar'=>$oldAvatar, 'delete_result' => $deleteResult];
                return response()->json($result);
            } else {
                $result['message'] = 'Could not save the file.';
                $result['state'] = 'failed';
                return response()->json($result);
            }
        } else {
            $result['message'] = 'Invalid data URL.';
            $result['state'] = 'failed';
            return response()->json($result);
        }
    }

    public function timeout(Request $request, string $username, int $seconds){
        if(Auth::user()->hasPermission('timeout_user')){
            $user = User::where('user_name',$username) -> first();
            if(empty($user)){
                $request->session()->flash('message.level', 'danger');
                $request->session()->flash('message.content', "Cannot find user with {$username}!\n");
                return redirect(route('home'));
            }
            $user->banned_until = now()->addSeconds($seconds);
            $user->save();
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', "User {$username} has been timeout for {$seconds} seconds!");
        }
        else{
            $request->session()->flash('message.level', 'danger');
            $request->session()->flash('message.content', 'Permission denied!\n');
        }
        return redirect(route('home'));
    }

    public function ban(Request $request, string $username){
        if(Auth::user()->hasPermission('ban_user')){
            $user = User::where('user_name',$username) -> first();
            if(empty($user)){
                $request->session()->flash('message.level', 'danger');
                $request->session()->flash('message.content', "Cannot find user with {$username}!\n");
                return redirect(route('home'));
            }
            $user->banned_until = '2038-01-01 00:00:00';
            $user->save();
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', "User {$username} has been banned successfully!");
        }
        else{
            $request->session()->flash('message.level', 'danger');
            $request->session()->flash('message.content', 'Permission denied!\n');
        }
        return redirect(route('home'));
    }

    public function unban(Request $request, string $username){
        if(Auth::user()->hasPermission('ban_user')){
            $user = User::where('user_name',$username) -> first();
            if(empty($user)){
                $request->session()->flash('message.level', 'danger');
                $request->session()->flash('message.content', "Cannot find user with {$username}!\n");
                return redirect(route('home'));
            }
            $user->banned_until = null;
            $user->save();
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', "User {$username} has been unbanned successfully!");
        }
        else{
            $request->session()->flash('message.level', 'danger');
            $request->session()->flash('message.content', 'Permission denied!\n');
        }
        return redirect(route('home'));
    }

}