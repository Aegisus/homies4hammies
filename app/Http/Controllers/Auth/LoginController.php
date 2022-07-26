<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {   
        $input = $request->only('email','password');
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->type == 'vet') {
                return redirect()->route('vet.home');
            }else{
                return redirect()->route('home');
            }
        }else{
            return redirect()->route('login')
                ->with('error','Email-Address or Password are Wrong.');
        }
    }
    public function adminLoginView(){
        return view('auth.adminLogin');
    }
    public function adminLogin(Request $request){
        $input = $request->only('username','password');
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
        if(auth()->attempt(array('username' => $input['username'], 'password' => $input['password'])))
        {
            return redirect()->route('admin.home');
        }
        else{
            return redirect()->route('admin.login')->with('error','Username or Password are Wrong.');
        }
    }
}
