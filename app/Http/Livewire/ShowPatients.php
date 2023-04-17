<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Patient;

class ShowPatients extends Component
{

    public $count=25;
    public $search='';

    public function render()
    {
        $patients = DB::select("SELECT patients.*,iFNULL(SUM(rest),0) as rest FROM `patients` LEFT JOIN invoices on patients.id = invoices.patient_id where `name` LIKE '%".$this->search."%' GROUP BY patients.id LIMIT ?;",[$this->count]);
        $all=Patient::count();
        $countonsearch = count($patients);
        return view('livewire.show-patients',compact('patients','all','countonsearch'));
    }

    public function addToWaitingList($id,$iswaiting){
        $patient = Patient::find($id);
        $patient->iswaiting = $iswaiting ;
        $patient->save();
    }
}
