<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\Assurance;
use App\Models\Drug;
use App\Models\Reservation;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $now = Carbon::now();
        $today = Carbon::today();
        $tomorrow = Carbon::tomorrow();
        $weekStartDate = $now->startOfWeek()->format('Y-m-d H:i:s');
        $weekEndDate = $now->endOfWeek()->format('Y-m-d H:i:s');
        $thisweekrevenue = DB::select('SELECT IFNULL(sum(price-rest),0) as thisweekrevenue FROM `invoices` join services ON services.id = invoices.service_id WHERE invoices.created_at BETWEEN ? and ?;',[$weekStartDate,$weekEndDate])[0]->thisweekrevenue;
        $todaysreservation = Reservation::whereBetween('date', [$today,$tomorrow])->count();
        $patients = Patient::all();
        $assurances = Assurance::all();
        $drugs = Drug::all();
        $services = Service::all();
        $assistantsnumber = User::where('isactive','=',1)->count() -1;

        return view('pages.dashboard',compact('patients','assurances','drugs','services','thisweekrevenue','todaysreservation','assistantsnumber'));
    }
}
