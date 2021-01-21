<?php

namespace App\Http\Controllers\Auth\Trabajador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Show the login form.
     * 
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view("trabajadores.login");
    }

    /**
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $this->validator($request);

        if ($this->guard('trabajador')->attempt($request->only('email','password'),$request->filled('remember'))) {
            $this->guard('trabajador')->login(Auth::user(), true);
            return redirect('/home');
        }
    
        //Authentication failed...
        return $this->loginFailed();
    }
    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        $this->guard('trabajador')->logout();
        //Auth::guard('trabajador')->logout();
        return redirect()
            ->route('trabajadores.login')
            ->with('status','Admin has been logged out!');
    }

        /**
     * Validate the form data.
     * 
     * @param \Illuminate\Http\Request $request
     * @return 
     */
    private function validator(Request $request)
    {
        //validation rules.
        $rules = [
            'email'    => 'required|email|exists:trabajadores|min:5|max:191',
            'password' => 'required|string|min:4|max:255',
        ];

        //custom validation error messages.
        $messages = [
            'email.exists' => 'Trabajador no encontrado',
        ];

        //validate the request.
        $request->validate($rules, $messages);
    }

    private function loginFailed()
    {
        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Login failed, please try again!');
    }
}
