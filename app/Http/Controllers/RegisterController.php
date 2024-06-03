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
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'username' => 'required|min:3|max:15|unique:users',
            'status' => 'required',
            'password' => 'required|min:5|max:255|same:password_confirm',
            'password_confirm' => 'required|same:password'
        ]);

        $validatedData['level'] = 1;
        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect('/login')->with('success', 'Registration successfull, Please login!');
    }
}
