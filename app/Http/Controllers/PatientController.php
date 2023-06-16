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
        $patientActs = DB::select("select acts.* ,ifnull(sum(payments.montant),0) as totalActReceived,services.name from acts LEFT join payments on payments.act_id  = acts.id left JOIN services on acts.service_id = services.id  where acts.patient_id = ? GROUP by acts.id  order by acts.id DESC;",[$patient->id]);
        $patientActsDents = DB::select("select acts.id ,GROUP_CONCAT(act_dent.dent) as dents from acts left join act_dent on act_dent.act_id = acts.id where acts.patient_id = ? GROUP by acts.id order by acts.id DESC;",[$patient->id]);
        foreach ($patientActs as $key => $value) {
            $value->dents = $patientActsDents[$key]->dents;
        };
        $patientPayments = DB::select("SELECT payments.*,acts.service_id,acts.service_name,services.name FROM `payments` join acts on payments.act_id = acts.id LEFT JOIN services on services.id = acts.service_id where payments.patient_id = ? order by payments.id DESC;",[$patient->id]);
        // return $patientPayments;

        $drugs = Drug::all()->groupBy('category');
        // return $drugs;
       $services = Service::all();
       \Carbon\Carbon::setLocale('fr');
        // return Array_sum ( array_column($patient->actes[0]->payments->toArray(),'montant')) ;
    //   return Implode ('-',array_column($patient->actes[16]->dents->toArray(),'id'));

        return view('pages.showpatient',compact('patient','patientinfo','drugs','services','patientActs','patientPayments'));
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
