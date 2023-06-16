<?php

namespace App\Http\Controllers;

use App\Models\Ordonnance;
use App\Http\Requests\StoreOrdonnanceRequest;
use App\Http\Requests\UpdateOrdonnanceRequest;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

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
        // return $request->safe();
        $sync_data = [];
        for($i = 0; $i < count($request->safe()->drug_ids); $i++){
            $sync_data[$request->safe()->drug_ids[$i]] = ['posology' => $request->safe()->posology[$i]];
        }
        $ordonnance = Ordonnance::create(['patient_id'=>$request->safe()->patient_id]);
        $ordonnance->drugs()->sync($sync_data);
        if ($request->safe()->date_perso) {
            $ordonnance->created_at = $request->safe()->date_perso;
            $ordonnance->save();
        }
        // return $this->downloadPdf($ordonnance->id);
        return redirect()->away(route("ordonnances.downloadPdf",$ordonnance->id));
    }

    public function downloadPdf( $ordonnanceId){
        $ordonnance = DB::select("SELECT ordonnances.*,patients.name,patients.fname,drug_ordonnance.*,drugs.name as drugName FROM `ordonnances`  LEFT join patients on ordonnances.patient_id = patients.id  LEFT join drug_ordonnance ON drug_ordonnance.ordonnance_id = ordonnances.id LEFT JOIN drugs on drugs.id = drug_ordonnance.drug_id WHERE ordonnances.id = ? ;",[$ordonnanceId]);
        // return $ordonnance;
        $created_at = date('d/m/Y',strtotime($ordonnance[0]->created_at));
        $pdf = PDF::loadView('pdf.ordonnance',
        compact('ordonnance','created_at'))->setPaper('A5', 'portrait');

         return  $pdf->stream();
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
