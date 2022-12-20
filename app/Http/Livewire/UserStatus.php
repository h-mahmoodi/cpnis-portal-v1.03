<?php

namespace App\Http\Livewire;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserStatus extends Component
{
    public $users;
    public $nowTime;
    public $userStatus;

    public function mount(){
      $this->users=User::orderBy('is_online','desc')->get();
    }


    public function render()
    {

      return view('livewire.user-status');
    }
}
