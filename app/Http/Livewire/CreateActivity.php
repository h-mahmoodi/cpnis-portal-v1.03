<?php

namespace App\Http\Livewire;

use App\Mail\NewActivity;
use App\Mail\NewActivityMarkdownMail;
use App\Models\Activity;
use App\Models\Log;
use App\Models\Task;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;
use Throwable;

class CreateActivity extends Component
{

    public $task_id,$worker_id,$tasks,$userTasks,$users,$description;


    protected $rules = [
        'task_id' => 'required',
        'worker_id' => 'required',
        'description' => 'required'
    ];

    public function mount($request){
        // $this->task_id=null;
        // $this->users=collect();
        // $this->user=null;
        $this->users=[];


        if(!empty($request->task_id)){
            $this->task_id=$request->task_id;
            $task=Task::find($this->task_id);
            $this->users=User::find($task->getTeams->pluck('user_id'));
        }
        $this->tasks=Task::where('lock',0)->get();
        $this->userTasks=collect();
        // foreach($this->tasks as $taskItem){
        //     if(in_array(Auth::id(),json_decode($taskItem->teams))){
        //         $this->userTasks->push($taskItem);
        //     }
        // }

        if(Auth::user()->role!=0){
            $this->userTasks=Task::all();
        }
        else{
            $this->userTasks=Task::find(Team::where('user_id',Auth::id())->pluck('task_id'));
        }
        // dd($this->userTasks);


        // $this->userTasks = $this->userTasks->all();


                // dd($this->userTasks);

    }


    public function submit()
    {
        $this->validate();


        $activity=Activity::create([
            'task_id' => $this->task_id,
            'description' => $this->description,
            'status' => 0,
            'sender_id' => Auth::id(),
            'worker_id' => $this->worker_id,

        ]);

        $task=Task::find($this->task_id);
        $task->worker_id=$this->worker_id;
        $task->update();


        $teamItem=$task->getTeams->where('user_id',$this->worker_id)->first();
        $teamItem->status=1;
        $teamItem->update();

        $log=new Log();
        $log->type="Activity";
        $log->message=
        "Activity Created"." | "."Activity : #".$activity->id."=>".$activity->description." | "."Assign To : ".User::Find($activity->worker_id)->name;
        $log->user_id=Auth::id();
        $log->save();

        // try {
        //     $user=User::findOrFail($activity->worker_id);
        //     Notification::sendNow($user,new NewActivityNotification($activity->id,$activity->sender_id,$activity->worker_id,'New Activity | You have Activity To Do'));
        //     $log->status=
        //     "Email Sent "."to : ".$user->name;
        //     $log->update();


        // } catch (\Throwable $th) {
        //     throw $th;
        // }

        // $user->notify(new NewActivityNotification());
        // Mail::to('hesamahmoodi@gmail.com')->send(new NewActivity($activity->id,$activity->sender_id,$activity->worker_id));

        try{
            Mail::to(User::find($task->worker_id))
            ->queue(new NewActivityMarkdownMail($task,$activity));
            }
            catch(Throwable $e){
                // dd($e);
            };


        Alert::toast('Activity ID:'.$activity->id.' Added Successfuly','success');

        return redirect()->route('activities.index')->with('success-add','Activity Added Successfuly');


    }


    public function updatedTaskId(){
        $this->worker_id=null;
        if($this->task_id !=null){
            $task=Task::find($this->task_id);
            // $this->users=User::find(json_decode($task->teams));
            $this->users=User::find($task->getTeams->pluck('user_id'));
        }

        else{
            $this->users=[];
        }


    }


    public function render()
    {




        // dd($this->users);


        return view('livewire.create-activity');
    }
}
