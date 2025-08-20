<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
    // Validate input
    $credentials = $request->validate([
        'email'    => 'required|email|exists:users,email',
        'password' => 'required|min:4',
    ]);

    // Attempt login                   
    if (auth()->attempt($credentials, $request->filled('remember'))) {
        $request->session()->regenerate();
        $user = auth()->user();
        // Check role and redirect accordingly
        if ($user->role == 'admin') {
            return redirect()->route('dashboard')
                             ->with('success', 'Admin Login successful!');
        } else {
            return redirect()->route('dashboard2')
                             ->with('success', 'User Login successful!');
        }
    }

    return back()->withErrors([
        'email' => 'Invalid Email Address or Password.',
    ])->onlyInput('email');
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Logged Out Successfully!');
    }

    


}