<?php

namespace App\Http\Livewire;

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MessageSystem extends Component
{
    public $users;
    public $selectedUser;
    public $messageBox;
    public $userMessages;

    public function setSelectedUser(User $user){
        $this->selectedUser=$user;
        $this->setMessages();
        $messages=Auth::user()->getReciveMessages->where('from',$user->id)->where('status',0);
        foreach($messages as $message){
            $message->status=1;
            $message->update();
        }
    }

    public function setMessages(){
        $this->userMessages=Message::where('from',Auth::id())
        ->where('to',$this->selectedUser->id)
        ->orWhere('from',$this->selectedUser->id)
        ->where('to',Auth::id())
        ->get();
    }

    public function sendMessage(){

        if($this->messageBox != null){
            try {
                $message=New Message();
                $message->to=$this->selectedUser->id;
                $message->from=Auth::id();
                $message->body=$this->messageBox;
                $message->save();

                $this->setMessages();

                $messages=Auth::user()->getReciveMessages->where('from',$this->selectedUser->id)->where('status',0);
                foreach($messages as $message){
                    $message->status=1;
                    $message->update();
                }


                $this->messageBox='';
            } catch (\Throwable $th) {
                throw $th;
            }}

    }

    public function render()
    {
        $this->users=User::all();
        return view('livewire.message-system');
    }
}
