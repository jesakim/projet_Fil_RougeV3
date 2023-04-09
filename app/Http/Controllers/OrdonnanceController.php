<?php

namespace App\Http\Controllers;

use App\Models\Ordonnance;
use App\Http\Requests\StoreOrdonnanceRequest;
use App\Http\Requests\UpdateOrdonnanceRequest;
use Barryvdh\DomPDF\Facade\PDF;

class OrdonnanceController extends Controller
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
    public function store(StoreOrdonnanceRequest $request)
    {
        $ordonnance = Ordonnance::create(['patient_id'=>$request->safe()->patient_id]);
        $ordonnance->drugs()->attach($request->safe()->drug_ids);
        return $this->downloadPdf($ordonnance);
    }

    public function downloadPdf(Ordonnance $ordonnance){
        // return view('pdf.ordonnance');
        $patientName = $ordonnance->patient->name;
        $drugs = $ordonnance->drugs()->pluck('name');
        $created_at = date('d/m/Y',strtotime($ordonnance->created_at));
        $pdf = PDF::loadView('pdf.ordonnance',
        compact('patientName','drugs','created_at'))->setPaper('a5', 'portrait');

         return $pdf->stream();
    }

    /**
     * Display the specified resource.
     */
    public function show(Ordonnance $ordonnance)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ordonnance $ordonnance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrdonnanceRequest $request, Ordonnance $ordonnance)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ordonnance $ordonnance)
    {
        //
    }
}
