<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class VetHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
        // $this->middleware('auth:vet');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $vet = auth()->user();
        $users = User::where('type', 0)->get();
        return view('vetHome')->with(compact('vet', 'users'));
    }
}
