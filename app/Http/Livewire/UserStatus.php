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
        $this->users=User::all();
    }
    public function render()
    {
        $this->nowTime = Carbon::now();
        if (Auth::check()) {
            $expireTime = Carbon::now()->addMinute(1); // keep online for 1 min
            // Cache::put('is_online'.Auth::user()->id, true, $expireTime);

            $user1=User::find(Auth::user()->id);
            // dd($user1);
            $user1->updated_at = Carbon::now();
            $user1->update();

        }
            // dd(Carbon::now()->diffInSeconds($user1->updated_at));
            // if(Carbon::now()->diffInSeconds($user1->updated_at)<30){
            //     $this->userStatus =1;
            // }
            // else{
            //     $this->userStatus =0;
            // }
            //Last Seen
            // User::where('id', Auth::user()->id)->update(['last_seen' => Carbon::now()]);

        return view('livewire.user-status');
    }
}
