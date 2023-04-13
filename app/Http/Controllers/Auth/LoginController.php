<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function showSignIn(){
        return view('auth.signin');
    }


    public function Signin(LoginRequest $request){
        $credentials = $request->only('email', 'password');
        $credentials['isactive'] = 1;
    if(Auth::attempt($credentials,boolval($request->rememberme))){

        return redirect()->intended('dashboard');
    }

    return redirect()->back();
    }
}
