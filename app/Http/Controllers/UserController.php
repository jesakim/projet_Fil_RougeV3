<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function showSignIn(){
        return view('auth.signin');
    }


    public function Signin(LoginRequest $request){
        $credentials = $request->only('email', 'password');
        $credentials['isactive'] = 1;
    //    return Auth::logout();
    if(Auth::attempt($credentials)){

        return redirect()->intended('dashboard');
    }

    return redirect()->back();
    }


    public function logout(){
        Auth::logout();
        return redirect('signin');
    }
}
