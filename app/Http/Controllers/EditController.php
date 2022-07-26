<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class EditController extends Controller
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
    public function index()
    {
        $user = auth()->user();
        return view('edit')->with('user',$user);
    }
    public function updateProfile(Request $request)
    {
        $user_id = auth()->user()->user_id;
        $user = User::where('user_id', $user_id)->firstOrFail();
        // Handle File Upload
        $fileNameToStore = imageUpload('cover_image','cover_images',$user_id);
        // Update Post
        $user->about_me = $request->input('about_me');
        if($request->hasFile('cover_image')){
            $user->cover_image = $fileNameToStore;
        }
        else{
            $user->cover_image = null;
        }
        $user->save();
        return view('home')->with('user',$user);
    }
}
