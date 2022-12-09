<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class ShowTime extends Component
{

    public $time;
    public $timezone;

    public function mount($timezone){
        $this->timezone=$timezone;
    }
    public function render()
    {
        $this->time=Carbon::now()->tz($this->timezone);
        return view('livewire.show-time');
    }
}
