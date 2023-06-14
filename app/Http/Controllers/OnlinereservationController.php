<?php

namespace App\Http\Controllers;

use App\Models\Onlinereservation;
use App\Http\Requests\StoreOnlinereservationRequest;
use App\Http\Requests\UpdateOnlinereservationRequest;

class OnlinereservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.Onlinereservations');
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
    public function store(StoreOnlinereservationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Onlinereservation $onlinereservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Onlinereservation $onlinereservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOnlinereservationRequest $request, Onlinereservation $onlinereservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Onlinereservation $onlinereservation)
    {
        //
    }
}
