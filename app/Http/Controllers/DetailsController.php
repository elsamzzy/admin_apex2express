<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Track;
use App\Models\User;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request, Detail $details, Track $track) {
        $name = auth()->user()->username;
        return view('details', [
            'details' => $details->details($request['track']),
            'title' => $name . "'s Dashboard",
            'track' => $track,
            'updated' => $details->lastUpdated($track)->created_at

        ]);
    }

    public function store(Request $request, Track $track) {
        $this->validate($request, [
            'information' => ['required', 'string'],
        ]);

        Detail::create([
            'user_id' => auth()->user()->id,
            'tracks_id' => $track->id,
            'shipping_info' => $request['information'],
            'description' => $request['description']
        ]);

        return back()->with('message', 'Successfully added new information');
    }
}
