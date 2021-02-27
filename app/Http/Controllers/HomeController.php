<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Track;
use App\Models\User;
use Illuminate\Http\Request;
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
    public function index(User $user, Track $track)
    {
        $name = auth()->user()->username;
        $list = $track->trackList();
        return view('home', [
            'title' => $name . "'s Dashboard",
            'user' => $user,
            'list' => $list
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
           'name' => ['string', 'required'],
            'size' => ['string', 'required'],
            'mode' => ["string", 'required'],
            'date' => ['string', 'required'],
            'location' => ['string', 'required']
        ]);

        $uuid = Str::uuid()->toString();

        Track::create([
            'name' => $request['name'],
            'size' => $request['size'],
            'mode' => $request['mode'],
            'date' => $request['date'],
            'location' => $request['location'],
            'description' => $request['description'],
            'track_id' => $uuid,
            'user_id' => auth()->user()->id
        ]);

        $id = Track::where('track_id', $uuid)->first();
        $track = $id->id;

        Detail::create([
            'shipping_info' => $request['location'],
            'tracks_id' => $track,
        ]);

        return back()->with('message', 'Successfully added a new logistics information');
    }
}
