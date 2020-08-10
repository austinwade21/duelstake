<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Message;
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
