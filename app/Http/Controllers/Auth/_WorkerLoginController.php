<?php

// namespace App\Http\Controllers\Auth;

// use App\Http\Controllers\Controller;
// use App\Providers\RouteServiceProvider;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;

// class _WorkerLoginController extends Controller
// {
//     /*
//     |--------------------------------------------------------------------------
//     | Login Controller
//     |--------------------------------------------------------------------------
//     |
//     | This controller handles authenticating users for the application and
//     | redirecting them to your home screen. The controller uses a trait
//     | to conveniently provide its functionality to your applications.
//     |
//     */

//     use AuthenticatesUsers;

//     /**
//      * Where to redirect users after login.
//      *
//      * @var string
//      */
//     protected $redirectTo = '/';


//     /**
//      * Create a new controller instance.
//      *
//      * @return void
//      */
//     public function __construct()
//     {
//         $this->middleware('guest')->except('logout');
//     }

// }


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class _WorkerLoginController extends Controller
{
    //TODO     use AuthenticatesUsers;
    public function login()
    {

      return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('id', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('home');
        }
        //TODO
        //$attempt=Auth::guard('investor')->attempt($request->only('username','password'), $request->remember);

        return redirect('workerlogin')->with('error', 'Oppes! You have entered invalid credentials');
    }

    public function logout() {
      Auth::logout();

      return redirect('login');
    }

    public function home()
    {

      return view('home');
    }
    public function username()
    {
        return 'id';
    }
}