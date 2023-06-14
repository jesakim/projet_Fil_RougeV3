<?php

namespace App\Http\Controllers;

use App\Models\act;
use App\Http\Requests\StoreactRequest;
use App\Http\Requests\UpdateactRequest;

class ActController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreactRequest $request)
    {
       $act = act::create($request->validated());
       $act->dents()->attach($request->safe()->dents);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(act $act)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(act $act)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateactRequest $request, act $act)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(act $act)
    {
        //
    }
}
