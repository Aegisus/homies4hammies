<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class VerifyVetController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        return view('auth.verifyVet');
    }
    public function verifyVet(Request $request){
        if (auth()->user()->vet_cert == null && auth()->user()->vet_verify == 0){
            $vet_id = auth()->user()->user_id;
            $vet = User::where('user_id', $vet_id)->firstOrFail();
            // Handle File Upload
            $fileNameToStore = imageUpload('vet_cert','vet_certs',$vet_id);
            // Update Post
            if($request->hasFile('vet_cert')){
                $vet->vet_cert = $fileNameToStore;
            }
            else{
                $vet->vet_cert = null;
            }
            $vet->save();
            return back();
        }
        else if (auth()->user()->vet_cert != null && auth()->user()->vet_verify == 0){
            $vet_id = auth()->user()->user_id;
            $vet = User::where('user_id', $vet_id)->firstOrFail();
            Storage::delete('public/vet_certs/'. auth()->user()->vet_cert);
            $vet->vet_cert = null;
            $vet->save();
            return back();
        }
    }
    public function invokeVerify(Request $request){
        if($request->input('invoke_verify')){
            $vet = User::where('user_id', $request->input('invoke_verify'))->firstOrFail();
            $vet->vet_verify = 1;
            $vet->save();
            return back();
        }
        if($request->input('invoke_revert')){
            $vet = User::where('user_id', $request->input('invoke_revert'))->firstOrFail();
            $vet->vet_verify = 0;
            $vet->save();
            return back();
        }
        // if($request->input('verify_action') == 1){
        //     $vet->vet_verify = 1;
        //     $vet->save();
        //     return back();
        // }else{
        //     $vet->vet_verify = 0;
        //     $vet->save();
        //     return back();
        // }
    }
}
