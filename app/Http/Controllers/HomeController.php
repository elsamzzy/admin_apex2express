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
        //dd($list);
        return view('home', [
            'title' => $name . "'s Dashboard",
            'user' => $user,
            'list' => $list
        ]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request) {
        // dd($request);
        $this->validate($request, [
           'status' => ['string', 'required'],
            'date' => ['string', 'required'],
            'origin' => ['string', 'required'],
            'destination' => ['string', 'required'],
            'mode' => ['string', 'required'],
            'weight' => ['string', 'required'],
            'shipper_name' => ['string', 'required'],
            'shipper_phone' => ['string', 'required'],
            'shipper_address' => ['string', 'required'],
            'consignee_name' => ['string', 'required'],
            'consignee_address' => ['string', 'required'],
            'consignee_phone' => ['string', 'required'],
            'booking_mode' => ['string', 'required'],
            'description' => ['string', 'required'],
        ]);

        $uuid = Str::uuid()->toString();

        $radnum = rand(1000000000,9999999999);

        $tracking_number = $this->generateRandomString(3) . $radnum;

        // dd($tracking_number);

        Track::create([
            'status' => $request['status'],
            'date' => $request['date'],
            'origin' => $request['origin'],
            'destination' => $request['destination'],
            'mode' => $request['mode'],
            'weight' => $request['weight'],
            'shipper_name' => $request['shipper_name'],
            'shipper_phone' => $request['shipper_phone'],
            'shipper_address' => $request['shipper_address'],
            'consignee_name' => $request['consignee_name'],
            'consignee_address' => $request['consignee_address'],
            'consignee_phone' => $request['consignee_phone'],
            'booking_mode' => $request['booking_mode'],
            'description' => $request['description'],
            'track_id' => $uuid,
            'user_id' => auth()->user()->id,
            'tracking_number' => $tracking_number
        ]);

        $id = Track::where('track_id', $uuid)->first();
        $track = $id->id;

        Detail::create([
            'shipping_info' => $request['status'],
            'description' => $request['description'],
            'tracks_id' => $track,
            'user_id' => auth()->user()->id,
        ]);

        return back()->with('message', 'Successfully added a new logistics information');
    }

    /**
     * @param int $length
     * @return string
     */
    function generateRandomString($length = 3) {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
}
