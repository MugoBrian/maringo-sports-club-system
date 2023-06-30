<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    public function login()
    {
        return view('users.login');
    }

    public function authenticate(Request $request)
    {
        $data = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (auth()->attempt($data)) {
            $request->session()->regenerate();

            return redirect('/dashboard')->with('success', 'You are successfully Logged In!');
        };
        return back()->withErrors(['email' => 'Invalid credentials!'])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        // dd(auth()->logout());
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'You are logged out successfully!');

    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
