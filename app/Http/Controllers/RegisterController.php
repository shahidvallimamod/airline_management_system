<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{

    public function registrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'mobile'    => 'required|unique:users,mobile',
            'password'  => 'required|confirmed|min:6',
            // TODO model cast
            'gender'    => 'required|integer|boolean',
        ]);

        $x = User::create([
            'mobile'    => $request->input('mobile'),
            'password'  => bcrypt($request->input('password')),
            'gender'    => $request->input('gender'),
            'email'     => $request->input('email'),
        ]);
        Auth::login($x);

        if (Auth::check()) {
            return redirect()->route('home');
        }
        return redirect()->route('login')->withErrors(['لطفا وارد شوید']);
    }

}
