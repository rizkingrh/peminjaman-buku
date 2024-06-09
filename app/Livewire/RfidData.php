<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Rfid;

class RfidData extends Component
{
    public $data;
    
    public function mount(){
        $this->data = Rfid::latest()->first();
    }

    public function refreshData()
    {
        $this->data = Rfid::latest()->first();
    }

    public function render()
    {
        return view('livewire.rfid-data');
    }
}
