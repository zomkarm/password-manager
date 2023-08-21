<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $data = $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);
        
        //$data['password'] = bcrypt($data['password']);
        // dd($data);
        if(Auth::attempt($data)){
            return redirect('/')->with('message','Login Successful !!');
        }else{
            return redirect('/login')->with('message','Authentication Failed, Invalid Email or Password');
        }

    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/')->with('message','Your have been Logged out!');
    }

}
