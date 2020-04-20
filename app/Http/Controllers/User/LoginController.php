<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:user')->except('logout');
    }

    public function showLoginForm(){
        return view('user.index');
    }

    public function Login(Request $request){
        
        $this->validate($request, [
            'email'   => 'required',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('user')->attempt(['username' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('/user/dashboard');
        }
        return back()->withInput($request->only('email', 'remember'))->with('login_error','Username or password incorrect');
    }

    public function logout()
    {
        Auth::guard('user')->logout();
        return redirect()->route('user.login_form');
    }

}
