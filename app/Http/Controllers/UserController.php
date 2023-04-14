<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index (){
        $user = Auth::user();
        return view('pages.profile',compact('user'));
    }

    public function changeInfo(UpdateUserRequest $request,User $user){
         $user->update($request->validated());

         return redirect()->back()->withErrors('Profile updated successfully');

    }


    public function changePassword(ChangePasswordRequest $request, User $user){
            if(!Hash::check($request->currentpass,$user->password)){
                return redirect()->back()->withErrors('The Provided password don\'t match with our records');
            }else{
                $user->update([
                    'password'=>$request->newpass,
                ]);
                return redirect()->back()->withErrors('Password changed successfully');
            }
    }
}
