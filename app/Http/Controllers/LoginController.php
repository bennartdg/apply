<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('content.login');
    }

    public function authenticate(Request $request)
    {
        $request ['email'] = $request['user_email'];
        $request ['password'] = $request['user_password'];
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);
        // dd($credentials);

        // $credentials ['email'] = $credentials ['user_email'];
        // $credentials ['password'] = $credentials ['user_password'];

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }
        
        return back()->with('loginError', 'login failed!');
    }

 
}
