<?php

namespace App\Http\Livewire;

use App\Models\Patient;
use Livewire\Component;

class PatientWaitingBtn extends Component
{
    public $patient_id;

    public function render()
    {
        $patient = Patient::find($this->patient_id);
        $iswaiting = $patient->iswaiting;
        return view('livewire.patient-waiting-btn',compact('iswaiting'));
    }

    public function toggleWaitingList($patient_id){
      $patient = Patient::find($patient_id);
      $patient->iswaiting = !$patient->iswaiting;
      $patient->save();
    }
}
