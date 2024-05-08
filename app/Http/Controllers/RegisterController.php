<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules\Unique;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'user_first_name' => 'required|max:255',
        //     'user_last_name' => 'required|max:255',
        //     'user_email' => 'required|email:dns|unique:users',
        //     'user_username' => 'required|min:3|max:10|unique:users',
        //     'user_status' => 'required',
        //     'user_password' => 'required|min:5|max:255',
        //     'user_confirm_password' => 'required|same:password'
        // ]);

         $validatedData = $request->validate([
            'user_first_name' => ['required','max:255'],
            'user_last_name' => ['required', 'max:255'],
            'user_email' => ['required', 'email:dns', 'unique:users'],
            'user_name' => ['required', 'min:3', 'max:10', 'unique:users'],
            'user_status' => 'required',
            'user_city' => 'required',
            'user_country' => 'required',
            'user_password' => ['required', 'min:5', 'max:255'],
            'user_password_confirm' => ['required', 'same:user_password']
        ]);

        // dd($validatedData);

        $validatedData['user_password'] = bcrypt($validatedData['user_password']);
        $validatedData['user_city'] = 'Bandung';
        $validatedData['user_country'] = 'Indonesia';

        User::create($validatedData);

        // $request->session()->flash('success', 'Registration successfull! Please login');

        return redirect('/login')->with('success', 'Registration successfull! Please login');    
    }
}
