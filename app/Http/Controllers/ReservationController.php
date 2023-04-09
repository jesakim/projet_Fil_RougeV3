<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\Patient;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::join('patients','reservations.patient_id','patients.id')->get();
        $patients = Patient::all();
        return view('pages.reservations',compact('reservations' , 'patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //php
    }

    public function didcome(Reservation $reservation)
    {
         $reservation->didcome = 1;

          $reservation->save();
        return redirect()->back()->with('success','reservation updated successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservationRequest $request)
    {
        Reservation::create($request->validated());
        return redirect()->back()->with('success','reservation created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
