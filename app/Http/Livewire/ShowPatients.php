<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Patient;

class ShowPatients extends Component
{

    public $count=25;
    public $search='';

    public function render()
    {
        $patients = Patient::where('name', 'LIKE', "%{$this->search}%")
        ->limit($this->count)
        ->get();
        $all=Patient::count();
        $countonsearch=$patients->count();
        return view('livewire.show-patients',compact('patients','all','countonsearch'));
    }

    public function addToWaitingList($id,$iswaiting){
        $patient = Patient::find($id);
        $patient->iswaiting = $iswaiting ;
        $patient->save();
    }
}
