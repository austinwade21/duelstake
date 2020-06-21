<?php

namespace App\Http\Controllers;

use App\Bet;
use App\Events\BetCreated;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;

class BetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bet = Bet::create([
            'user_id' => auth()->id(),
            'bet_amount' => $request->bet_amount,
            'payout' => $request->payout,
            'chance' => $request->chance,
            'game_number' => $request->game_number,
            'game_type' => $request->game_type,
            'roll' => $request->roll,
            'profit' => $request->profit,
        ]);

        $betEvent = new BetCreated();
        $betEvent->data = $bet;
        $betEvent->data->username = auth()->user()->user_name;
        event($betEvent);

        return response()->json([
            'status' => (bool)$bet,
            'data' => $bet,
            'message' => $bet ? 'Bet Created!' : 'Error Creating Bet'
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bet  $bet
     * @return \Illuminate\Http\Response
     */
    public function show(Bet $bet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bet  $bet
     * @return \Illuminate\Http\Response
     */
    public function edit(Bet $bet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bet  $bet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bet $bet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bet  $bet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bet $bet)
    {
        //
    }
}
