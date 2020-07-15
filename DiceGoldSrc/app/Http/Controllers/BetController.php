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
        $allBets = Bet::orderBy('created_at', 'desc')
            ->take(10)
            ->get();
        foreach ($allBets as &$bet) {
            $bet->username = $bet->user->user_name;
            $bet->bet_amount = sprintf("%.8f", $bet->bet_amount);
            $bet->profit = sprintf("%.8f", $bet->profit);
            $bet->created_at_str = date("H:i:s", strtotime($bet->created_at));
        }
        $myBets = Bet::where('user_id', auth()->id())->orderBy('created_at', 'desc')
            ->take(10)
            ->get();;
        foreach ($myBets as &$bet) {
            $bet->username = $bet->user->user_name;
            $bet->bet_amount = sprintf("%.8f", $bet->bet_amount);
            $bet->created_at = date("H:i:s", strtotime($bet->created_at));
            $bet->created_at_str = date("H:i:s", strtotime($bet->created_at));
        }
        return response()->json([
            'status' => true,
            'data' => ['allBets' => $allBets, 'myBets' => $myBets, 'userid' => auth()->id()],
            'message' => 'Successful query'
        ]);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bet = new Bet([
            'user_id' => auth()->id(),
            'bet_amount' => $request->bet_amount,
            'payout' => $request->payout,
            'chance' => $request->chance,
            'game_number' => $request->game_number,
            'game_type' => $request->game_type,
        ]);
        $bet->roll = rand(0, 10000);
        if($bet->game_type == 'low'){
            if($bet->roll < $bet->game_number){
                $bet->profit = $bet->bet_amount * $bet->payout;
                $bet->won = true;
            }
            else{
                $bet->profit = - $bet->bet_amount;
                $bet->won = false;
            }
        }
        else{
            if($bet->roll >= $bet->game_number){
                $bet->profit = $bet->bet_amount * $bet->payout;
                $bet->won = true;
            }
            else{
                $bet->profit = - $bet->bet_amount;
                $bet->won = false;
            }
        }

        $bet->save();

        $bet->bet_amount = sprintf("%.8f", $bet->bet_amount);
        $bet->profit = sprintf("%.8f", $bet->profit);
        $bet->created_at_str = date("H:i:s", strtotime($bet->created_at));
        $bet->username = auth()->user()->user_name;

        $betEvent = new BetCreated();
        $betEvent->data = $bet;
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
     * @param \App\Bet $bet
     * @return \Illuminate\Http\Response
     */
    public function show(Bet $bet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Bet $bet
     * @return \Illuminate\Http\Response
     */
    public function edit(Bet $bet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Bet $bet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bet $bet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Bet $bet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bet $bet)
    {
        //
    }
    
    public function statistics(Request $request){
        $statistics = [
            'luck' => 'N/A',
            'bets' => Bet::where('user_id', auth()->id())->count(),
            'wins' => Bet::where('user_id', auth()->id())->where('profit', '>', 0)->count(),
            'wagered' => Bet::where('user_id', auth()->id())->where('profit', '<', 0)->sum('profit'),
            'profit' => Bet::where('user_id', auth()->id())->sum('profit'),
        ];

        $statistics['losses'] = $statistics['bets'] - $statistics['wins'];

        return response()->json([
            'status' => true,
            'data' => $statistics,
            'message' => 'Successful query'
        ]);
    }
}
