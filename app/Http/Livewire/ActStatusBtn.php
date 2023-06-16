<?php

namespace App\Http\Livewire;

use App\Models\Act;
use Livewire\Component;

class ActStatusBtn extends Component
{
    public $act_id;

    public function render()
    {
        $status = Act::find($this->act_id)->status;
        return view('livewire.act-status-btn',compact('status'));
    }


    public function toggleActStatus($act_id){
      $act = Act::find($act_id);
      $act->status = !$act->status;
      $act->save();
    }
}
