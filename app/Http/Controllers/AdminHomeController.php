<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use App\Models\User;

class AdminHomeController extends Controller
{
    public function index(){
        $users = DB::table('users')->where(array('type'=>'1' ))->orderBy('vet_verify', 'ASC')->paginate(5);
        return view('adminHome')->with('users',$users);
    }
}
