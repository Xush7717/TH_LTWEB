<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('pages.auth.login');
    }

    public function login(Request $request)
    {
        // TODO: Implement actual login logic
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // For now, just redirect back
        return redirect()->route('home')->with('success', 'Đăng nhập thành công!');
    }

    public function showRegister()
    {
        return view('pages.auth.register');
    }

    public function register(Request $request)
    {
        // TODO: Implement actual registration logic
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email',
            'username' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ]);

        // For now, just redirect to login
        return redirect()->route('login')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
    }
}
