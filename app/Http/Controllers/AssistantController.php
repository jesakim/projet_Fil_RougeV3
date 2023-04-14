<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class AssistantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('pages.assistants',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        User::create([
            'email'=>$request->email,
            'name'=>$request->name,
            'password'=>Str::random(64)
        ]);

        $resetpassword = new ResetPasswordController();
        $content = new ResetPasswordRequest();
        $content->email = $request->email;

        $resetpassword->resetPassword($content);

        return redirect()->back()->with('success','Assistant created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($userid)
    {
        $user = User::find($userid);
        return view('pages.showassistant',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request)
    {
        User::find($request->id)->update($request->validated());
        return redirect()->back()->with('success','Assistant info updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user)
    {
         User::destroy($user);
         return redirect()->route('assistant.index');
    }

    public function activate(User $user){
         $user->update([
            'isactive' => !$user->isactive,
        ]);
        return redirect()->back()->with('success','Assistant info updated successfully');

    }
}
