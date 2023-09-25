<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('welcome');
        }

        return redirect()->route('login')->with('error', 'Incorrect credentials');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}
