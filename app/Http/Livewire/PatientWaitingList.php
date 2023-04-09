<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Patient;

class PatientWaitingList extends Component
{
    public function render()
    {
        $waitingPatients = Patient::where('iswaiting',1)->get();

        return view('livewire.patient-waiting-list',compact('waitingPatients'));
    }

    public function removeFromWaitingList($id){
        $patient = Patient::find($id);
        $patient->iswaiting = 0 ;
        $patient->save();
    }
}
