<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function authenticate(Request $request) {
        $credentials = $request->only('email', 'password');
    
        // Check if the email exists first
        if (!\App\Models\User::where('email', $request->email)->exists()) {
            return back()->withErrors([
                'email' => 'No account found for this email. Please register first.',
            ]);
        }
    
        // If email exists, try to log in
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/jobs');
        }
    
        // Email exists but password was wrong
        return back()->withErrors([
            'email' => 'Incorrect password. Please try again.',
        ]);
    }
    

    public function register() {
        return view('auth.register');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|confirmed',
        ]);
    
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    
        // Redirect to login page with success message
        return redirect()->route('login')->with('success', 'Account created! Please log in.');
    }
    
    
}