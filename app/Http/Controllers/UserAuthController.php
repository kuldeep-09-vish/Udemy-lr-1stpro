<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserAuthController extends Controller
{
    public function UserLogin(Request $request){

        $credantional = $request->validate([
            'email'    => 'required|email|exists:users,email',
            'password' => 'required|min:6',
        ]);

        // Attempt login
        if (Auth()->attempt($credantional)){
            session('email', $credantional['email']);
            session('password', $credantional['password']);
            return redirect()->route('home')->with('success', 'register user login successfully');
        }
        else{
             return redirect()->back()
            ->withInput() // input values wapas dikhane ke liye
            ->with('error', 'Invalid login credentials');
        }
    }

    public function UserRegister(Request $request){

        $credantional = $request->validate([
            'name' =>'required',
            'email' =>'required|email|unique:users',
            'password' => 'required|min:6',
            'confirmPassword' => 'required|same:password',
        ]);

        // dd($credantional);
        // create new user here
        $usersave = User::create([  
            'name' => $credantional['name'],
            'email' => $credantional['email'],
            'password' => Hash::make($credantional['password'])
        ]);

        if($usersave){
            return redirect()->route('home')->with('success', 'User registered successfully');
        }
        else{
            return redirect()->route('home')->with('error', 'Failed to register user');
        }
        
    }
}
