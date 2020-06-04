<?php

namespace App\Http\Controllers;

use App\SocialData;
use App\SocialProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        Auth::user()->forceFill([
            'api_token' => Str::random(80),
        ])->save();

        $socials = SocialProvider::all();
        $socialData = [];
        foreach ($socials as $social) {
            $socialProperties = SocialData::where('user_id', '=', Auth::id())->where('social_id', '=', $social->id)->get();
            $properties = SocialData::convertProperties($socialProperties);
            $socialData[$social->id] = [
                'id' => $social->id,
                'name' => $social->name,
                'properties' => $properties,
            ];
        }

        return view('home', ['socialData' => $socialData]);
    }
}
