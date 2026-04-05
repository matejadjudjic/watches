<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\ActivityLog;

class AuthController extends Controller
{

    public function showRegister()
    {
        return view('auth.register');
    }


    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'phone'    => 'nullable|string',
            'address'  => 'nullable|string',
            'city'     => 'nullable|string',
            'country'  => 'nullable|string',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'phone'    => $request->phone,
            'address'  => $request->address,
            'city'     => $request->city,
            'country'  => $request->country,
            'role_id'  => 2,
        ]);
        ActivityLog::log('register', 'New user registered: ' . $request->email);
        return redirect('/login')->with('success', 'Registration successful! Log in.');
    }


    public function showLogin()
    {
        return view('auth.login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            $user = Auth::user();
            ActivityLog::log('login', 'User logged in: ' . $user->email);
            if ($user->role_id == 1) {
                return redirect('/admin/dashboard');
            } else {
                return redirect('/');
            }
        }

        return back()->withErrors([
            'email' => 'The email or password is incorrect.',
        ]);
    }


    public function logout(Request $request)
    {
        ActivityLog::log('logout', 'User logged out: ' . Auth::user()->email);

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }




}
