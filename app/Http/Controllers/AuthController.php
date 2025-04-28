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

    public function store(Request $request)
    {
    // Validate the incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

    // Create a new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

    // Debugging line: Check if this code is being hit
        ('Redirecting to login page');
    
    // Redirect to the login page after successful registration
        return redirect()->to('/login')->with('success', 'Registration successful! Please log in.');
    }




    
    
}