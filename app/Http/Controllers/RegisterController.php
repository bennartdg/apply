<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules\Unique;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_first_name' => 'required|max:255',
            'user_last_name' => 'required|max:255',
            'user_email' => 'required|email:dns|unique:users',
            'user_username' => 'required|min:3|max:15|unique:users',
            'user_status' => 'required',
            'user_password' => 'required|min:5|max:255|same:user_password_confirm',
            'user_password_confirm' => 'required|same:user_password'
        ]);


        $validatedData['user_password'] = bcrypt($validatedData['user_password']);

        User::create($validatedData);

        return redirect('/login')->with('success', 'Registration successfull, Please login!');
    }
}
