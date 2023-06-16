<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoteRequest;
use App\Models\Payment;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\Note;

class PaymentController extends Controller
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
    public function store(StorePaymentRequest $request)
    {
         $payment = Payment::create($request->validated());
         return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        // $note = Note::create([
        //     'montant'=>$payment->montant,
        //     'patient_id'=>$payment->patient_id,
        //     'iswithICE'=>$payment->iswithICE ?? 0,
        // ]);
        // // return $note;

        // return (new NoteController())->show($note);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
         $payment->delete();
         return redirect()->back();
    }
}
