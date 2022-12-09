<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    // public $users;

    // public function mount(){
    //     $this->users=User::all();
    // }


    public function changeStatus(User $user){
        if($user->status==0){
            $user->status=1;
        }
        else{
            $user->status=0;
        }
        $user->update();
    }

    public function changeRole(User $user){
        if($user->role==0){
            $user->role=1;
        }
        elseif($user->role==1){
            $user->role=2;
        }
        elseif($user->role==2){
            $user->role=0;
        }
        $user->update();
    }

    public function delete(User $user){
        $user->delete();
    }


    public function render()
    {
        return view('livewire.users',['users'=>User::all()]);
    }



}
