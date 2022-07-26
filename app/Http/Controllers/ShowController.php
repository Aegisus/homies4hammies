<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ShowController extends Controller
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

    public function userProfile($user_id){
        $user = User::where('user_id', $user_id)->firstOrFail();
        return view('show')->with('user',$user);
    }
}
