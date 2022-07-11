<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view('login.index');
    }

    public function postLogin(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/dashboard');
        }
        session()->flash('error', 'Invalid Email or Password');
        return redirect('/login');
    }

    public function registrationIndex()
    {
        return view('login.regist');
    }

    public function registration(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:6', 'confirmed'],
            'password_confirmation' => ['required', 'same:password']
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role'=> 'pemilik',
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60)
        ]);
        // dd($user);

        return redirect('/login')->with('status', 'Account succesfully created');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
