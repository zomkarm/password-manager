<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request){
        $formFields = $request->validate([
                'name'=>'required|min:5',
                'email'=>'required|email|unique:users,email',
                'password'=>'required|confirmed|min:6|max:32',
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        auth()->login($user);

        return redirect('/')->with('message','Congratulations , your account has been created');
    }
}
