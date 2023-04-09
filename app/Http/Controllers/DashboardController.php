<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\Assurance;
use App\Models\Drug;
use App\Models\Service;

class DashboardController extends Controller
{
    public function index(){
        $patients = Patient::all();
        $assurances = Assurance::all();
        $drugs = Drug::all();
        $services = Service::all();
        return view('pages.dashboard',compact('patients','assurances','drugs','services'));
    }
}
