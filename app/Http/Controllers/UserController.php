<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show_dashboard(){
        return view('dashboard');
    }


    public function show_register(){
        return view('register');
    }

    public function store_register(){
        $registerDetails = request()->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5|confirmed'
        ]);

        $registerDetails['password'] = bcrypt($registerDetails['password']);

        $user = User::create($registerDetails);

        auth()->login($user);

        return redirect('/dashboard');
    }




    public function show_login(){
        return view('login');
    }



    public function store_login(){
        $loginDetails = request()->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(auth()->attempt($loginDetails)){
            session()->regenerate();
            return redirect('/dashboard');
        }
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }
}
