<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Http\Requests\Auth\SaveNewPasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
Use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function showResetPassword(){
        return view('auth.resetpassword');
    }

    public function resetPassword(ResetPasswordRequest $request){
        if(DB::table('password_reset_tokens')->where('email',$request->email)->doesntExist() || 1){
            $token = Str::random(64);
            Db::table('password_reset_tokens')->insert([
                'email'=>$request->email,
                'token'=>$token,
                'created_at'=>Carbon::now(),
            ]);
            $action_link = route('showsavenewpassword',['token'=>$token,'email'=>$request->email]);
            // dd($action_link);

            $body = 'test';
            Mail::send('mails.resetpassword',['action_link'=>$action_link,'body'=>$body],function($message) use ($request){
                $message->from('noreply@sakim.me','laravel');
                $message->to($request->email,'laravel')
                ->subject('reset password');
            });

            return back()->withErrors([''=>'email sent']);
        }
        return back()->withErrors([''=>'email already sent']);

    }

    public function showSaveNewPassword(Request $request){
        $email = $request->email;
        $token = $request->token;
        return view('auth.enternewpassword',compact('email','token'));
    }

    public function saveNewPassword (SaveNewPasswordRequest $request){
        // return $request;
        $check_token = DB::table('password_reset_tokens')->where([
            'email'=>$request->email,
            'token'=>$request->token,
        ]);

        if(!$check_token){
           return back()->withErrors('','password aleady changed');
        }else{
            User::where('email',$request->email)->update([
                'password'=>Hash::make($request->password)
            ]);

            $check_token->delete();

            return redirect()->route('Signin')->withErrors('','saved');
        }
    }
}
