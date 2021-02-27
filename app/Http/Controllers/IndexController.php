<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class IndexController extends Controller
{
    public function index(){
        //$uuid = Str::uuid(3)->toString();
        //dd($uuid);
        return view('index');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'username' => ['required', 'string'],
            'password' => ['required', 'string', 'min:6']
        ]);
        if($user = User::where('username', $request['username'])->first()){
            $hashedPassword = $user->password;
            if (Hash::check($request['password'], $hashedPassword)) {
                auth()->login($user, $request['remember']);
                return redirect()->route('home');
            }
            return back()->with('password', 'Incorrect Password');
        }
        return back()->with('username', 'Username does not exist');
    }

    public function create(Request $request) {
        $this->validate($request, [
            'code' => ['required', 'string'],
            'username' => ['required', 'string', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed']
        ]);
        $code = 74512;
        if($code != $request['code']){
            return back()->with('code', 'Admin code does not exist');
        }
        $uuid = Str::uuid()->toString();
        $user = User::create([
            'username' => $request['username'],
            'admin' => $uuid,
            'password' => Hash::make($request['password']),

        ]);
        auth()->login($user, true);
        return redirect()->route('home');
    }
}
