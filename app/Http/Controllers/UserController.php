<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;

// use Illuminate\Http\Requests\LoginRequest;


class UserController extends Controller
{
    public function showSignIn(){
        return view('auth.signin');
    }


    public function Signin(LoginRequest $request){
        return $request;
    }
}
