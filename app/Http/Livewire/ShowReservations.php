<?php

namespace App\Http\Livewire;

use App\Models\Reservation;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ShowReservations extends Component
{

    public $countonsearch = 12;
    public $all = 12;

    public $range= 'today';

    public $from;
    public $to;

    public function render()
    {
        if($this->range == 'today'){

            $this->from = date("Y-m-d", mktime(0, 0, 0,date("m")  , date("d"), date("Y")));
            $this->to = date("Y-m-d", mktime(0, 0, 0,date("m")  , date("d")+1, date("Y")));
        }elseif($this->range == 'week'){
            $this->from = date("Y-m-d", strtotime('this week'));
            $this->to = date("Y-m-d",strtotime('next week'));
        }else{
            $this->from = date("Y-m-01", strtotime('this month'));
            $this->to = date("Y-m-01",strtotime('next month'));
        }
        $reservations =  DB::table('reservations')
        ->join('patients', 'reservations.patient_id', '=', 'patients.id')
        ->select('reservations.*', 'patients.phone', 'patients.name')
        ->whereBetween('date',[$this->from,$this->to])
        ->get();
        // $reservations = json_decode(json_encode($reservations), true);
        // dd($reservations);
        return view('livewire.show-reservations',compact('reservations'));
    }
}
