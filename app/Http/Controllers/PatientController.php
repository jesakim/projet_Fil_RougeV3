<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResFromLandingRequest;
use App\Models\Patient;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Models\Drug;
use App\Models\Reservation;
use App\Models\Service;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $assurances = DB::table('assurances')->get();
        return view('pages.patients',compact('assurances'));
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
    public function store(StorePatientRequest $request)
    {
        // return $request;
       $patient = Patient::create($request->validated());

        return back()->with('success','Patient created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        // return $patient;
        $patientinfo = DB::select("select patients.*,assurances.name as assurance_name,reservations.date as lastreservation from patients INNER join assurances on patients.assurance_id = assurances.id left join reservations on reservations.patient_id = patients.id where patients.id = ? ORDER by lastreservation DESC LIMIT 1;",[$patient->id])[0];
        // return $patientinfo;
        $drugs = Drug::all();
       $services = Service::all();
       \Carbon\Carbon::setLocale('fr');

        return view('pages.showpatient',compact('patient','patientinfo','drugs','services'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        $patient->update($request->validated());
        return back()->with('success','Patient updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index');

    }

    public function resFromLanding(ResFromLandingRequest $request){
        // return $request;
       $patient = Patient::create([
            'name'=>trim($request->fname .' '.$request->lname),
            'phone'=>$request->phone,
            'assurance_id'=>0,
            'isconfirmed'=>0,
            'assurances_id'=>1
        ]);
        if($request->res_date){
           Reservation::create([
                'patient_id'=>$patient->id,
                'date'=>$request->res_date,
            ]);
        }

        return redirect()->back();


    }

    public function comfirmPatient(Patient $patient){
        $patient->update([
            'isconfirmed'=>1
        ]);
        return back()->with('success','Patient confirmed successfully');
    }
}
