<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    public function UserLogin(Request $request){
        dd($request->all());

        return ('login user successfully');

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
