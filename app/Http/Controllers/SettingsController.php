<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $name = auth()->user()->username;
        return view('settings', [
            'title' => $name
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'old_password' => ['string', 'required'],
            'password' => ['string', 'required', 'min:6', 'confirmed'],
        ]);
        $hashedPassword = User::find(auth()->user()->id)->password;
        if (Hash::check($request['old_password'], $hashedPassword)) {
            User::where('id', auth()->user()->id)->update(['password'=> Hash::make($request['password'])]);
            return back()->with('message', 'Successfully changed your password');
        }
        return back()->with('password','Incorrect password');
    }
}
