<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Message;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Mockery\Exception;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param int $startId
     * @return \Illuminate\Http\Response
     */
    public function index($startId = -1)
    {
        if($startId > -1){
            $publicMessages = Message::where('is_public', true)->where('id', '<', $startId)->orderBy('created_at', 'desc')->take(20)->get();
        }
        else{
            $publicMessages = Message::where('is_public', true)->orderBy('created_at', 'desc')->take(20)->get();
        }

        foreach ($publicMessages as $message){
            $message->status = Cache::has('user-is-online-' . $message->user_id);
            if($message->sender->hide_user_name){
                $message->status = false;
            }
            $message->sender->avatar = Storage::url($message->sender->avatar);
        }
        return response()->json([
            'status' => true,
            'data' => $publicMessages,
            'message' => 'Successful query'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId = $request->input('sender_id');
        $message = $request->input('message');
        $words = explode(" ", $message);
        if(!empty($words)){
            $commands = ['/ban', '/unban', '/timeout', '/untimeout'];
            if(in_array($words[0], $commands)){
                $result = [
                    'status' => false,
                    'data' => $message,
                    'message' => 'Successful query',
                ];
                switch($words[0]){
                    case '/ban':
                        if(Auth::user()->hasPermission('ban_user')){
                            if(count($words) < 3){
                                $result['status'] = false;
                                $result['message'] = "Missing parameters!\n";
                                break;
                            }
                            $user = User::where('user_name',$words[1]) -> first();
                            if(empty($user)){
                                $result['status'] = false;
                                $result['message'] = "Cannot find user with {$words[1]}!\n";
                                break;
                            }
                            $user->banned_until = '2038-01-01 00:00:00';
                            $user->save();
                            $result['status'] = true;
                            $result['message'] = "User {$words[1]} has been banned successfully!";
                        }
                        else{
                            $result['status'] = false;
                            $result['message'] = "Permission denied!";
                        }
                        break;
                    case '/timeout':
                        if(Auth::user()->hasPermission('timeout_user')){
                            if(count($words) < 3){
                                $result['status'] = false;
                                $result['message'] = "Missing parameters!\n";
                                break;
                            }
                            $user = User::where('user_name',$words[1]) -> first();
                            if(empty($user)){
                                $result['status'] = false;
                                $result['message'] = "Cannot find user with {$words[1]}!\n";
                                break;
                            }
                            if(is_numeric($words[2])){
                                $result['status'] = false;
                                $result['message'] = "Parameter should be numeric for seconds!\n";
                                break;
                            }
                            $user->banned_until = now()->addSeconds($words[2]);
                            $user->save();
                            $result['status'] = true;
                            $result['message'] = "User {$words[1]} has been timeout for {$words[2]} seconds!";
                        }
                        else{
                            $result['status'] = false;
                            $result['message'] = "Permission denied!";
                        }
                        break;
                    case '/unban':
                    case '/untimeout':
                        if(Auth::user()->hasPermission('ban_user')){
                            if(count($words) < 2){
                                $result['status'] = false;
                                $result['message'] = "Missing parameters!\n";
                                break;
                            }
                            $user = User::where('user_name',$words[1]) -> first();
                            if(empty($user)){
                                $result['status'] = false;
                                $result['message'] = "Cannot find user with {$words[1]}!\n";
                                break;
                            }
                            $user->banned_until = null;
                            $user->save();
                            $result['status'] = true;
                            $result['message'] = "User {$words[1]} has been unbanned successfully!";
                        }
                        else{
                            $result['status'] = false;
                            $result['message'] = "Permission denied!";
                        }
                        break;
                }
                return response()->json($result);
            }
        }

        $message = new Message([
            'user_id'   => $request->input('sender_id'),
            'receiver_id' => $request->input('receiver_id'),
            'message'     => $request->input('message'),
            'is_public' => $request->input('is_public'),
        ]);

        try{
            $saved = $message->save();
            $message->load(['sender', 'receiver']);


            $expiresAt = Carbon::now()->addMinutes(5);
            Cache::put('user-is-online-' . Auth::user()->id, true, $expiresAt);
            $message->status = true;
            if($message->sender->hide_user_name){
                $message->status = false;
            }

            broadcast(new MessageSent($message));

            return response()->json([
                'status' => $saved,
                'data' => $message,
                'message' => 'Successful query'
            ]);
        }
        catch (Exception $e){
            return response()->json([
                'status' => 'error',
                'data' => $message,
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
