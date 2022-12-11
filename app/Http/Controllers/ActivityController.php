<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Task;
use App\Models\User;
use App\Models\Notify;
use App\Models\Activity;
use App\Mail\NewActivity;
use App\Mail\NewActivityMarkdownMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Notifications\IeltsNotification;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewActivityNotification;
use Throwable;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $task_id=$request->task_id;
        $user_id=$request->user_id;


        return view('activity.index',compact('task_id','user_id'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // $request = $request->all();
        // $task=null;
        // if(!empty($request->task_id)){
        //     $task=Task::findOrFail($request->task_id);
        // }
        // $tasks=Task::where('lock',0)->get();
        // $userTasks=collect();
        // foreach($tasks as $taskItem){
        //     if(in_array(Auth::id(),json_decode($taskItem->teams))){
        //         $userTasks->push($taskItem);
        //     }
        // }
        // $users=User::all();
        // dd($request);



        return view('activity.create',compact('request'));

        // return view('activity.create',compact('userTasks','users','task'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'task_id' => 'required',
            'description' => 'required',
            'worker_id' => 'required'
        ]);

        $activity=Activity::create([
            'task_id' => $request->task_id,
            'description' => $request->description,
            'status' => 0,
            'sender_id' => Auth::id(),
            'worker_id' => $request->worker_id,

        ]);

        $task=Task::findOrFail($request->task_id);
        $task->worker_id=$request->worker_id;
        $task->update();


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



        Alert::toast('Activity ID:'.$activity->id.' Added Successfuly','success');

        return redirect()->route('activities.index')->with('success-add','Activity Added Successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        $task=Task::findOrFail($activity->task_id);

        if($activity->status==0){
            $log=new Log();
            $log->type="Activity";
            $log->message=
            "Activity is Working"." | "."Activity : #".$activity->id."=>".$activity->description;
            $log->user_id=Auth::id();
            $log->save();

            $activity->status=1;
            $activity->update();
            $task->status=1;
            $task->save();
        }

        $user=User::findOrFail($activity->worker_id);




        return view('activity.show',compact('activity','task','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        if (Auth::user()->cannot('update',$activity)) {
            Alert::toast('You Have No Access 403', 'error');
            return redirect()->back();
        }

        $tasks=Task::where('lock',0)->get();
        $users=User::all();
        $task=Task::find($activity->task_id);
        $user=User::find($activity->worker_id);
        return view('activity.edit',compact('activity','task','user','users','tasks'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {

        if (Auth::user()->cannot('update', $activity)) {
            Alert::toast('You Have No Access 403', 'error');
            return redirect()->back();
        }

        $validated=$request->validate([
            'worker_id' => 'required',
            'task_id' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);


        $activity->task_id=$request->task_id;
        $activity->worker_id=$request->worker_id;
        $activity->description=$request->description;
        $activity->status=$request->status;
        $activity->update();

        $log=new Log();
        $log->type="Activity";
        $log->message=
        "Activity Updated"." | "."Activity : #".$activity->id."=>".$activity->description;
        $log->user_id=Auth::id();
        $log->save();

        Alert::toast('Activity ID:' . $activity->id . ' Updated Successfuly', 'success');

        return redirect()->route('activities.index')->with('success-update','Activity Updated Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        if (Auth::user()->cannot('delete', $activity)) {
            Alert::toast('You Have No Access 403', 'error');
            return redirect()->back();
        }

        $log=new Log();
        $log->type="Activity";
        $log->message=
        "Activity Deleted"." | "."Activity : #".$activity->id."=>".$activity->description;
        $log->user_id=Auth::id();
        $log->save();

        $task=Task::find($activity->task_id);

        $teamItem=$task->getTeams->where('user_id',$activity->worker_id);
        // dd($teamItem->first());
        if(count($teamItem)==1){
            $teamItem->first()->status=0;
            $teamItem->first()->update();
        }



        $activity->delete();
        if($task->getActivities->where('status','!=','2')->count() >0){
            $task->worker_id=$task->getActivities->where('status','!=','2')->last()->worker_id;
        }
        else{
            $task->worker_id=null;
            $task->status=0;
        }
        $task->save();



        Alert::toast('Activity ID:'.$activity->id.' Deleted Successfuly','error');

        return redirect()->back();

    }



    public function reply(Activity $activity)
    {
        $task=Task::findOrFail($activity->task_id);

        $users=User::find($task->getTeams->pluck('user_id'));

        return view('activity.reply',compact('activity','users','task'));
    }


    public function replystore(Request $request)
    {
        $validated=$request->validate([
            'task_id' => 'required',
            'activity_id' => 'required',
            'description' => 'required',
            'worker_id' => 'required'
        ]);

        $activity=Activity::create([
            'task_id' => $request->task_id,
            'description' => $request->description,
            'status' => 0,
            'sender_id' => Auth::id(),
            'worker_id' => $request->worker_id,
            'reply_id' => $request->activity_id,

        ]);

        $lastActivity=Activity::find($request->activity_id);
        $lastActivity->status=2;
        $lastActivity->update();

        $task=Task::find($lastActivity->task_id);
        $task->worker_id=$request->worker_id;
        $task->status=1;
        $task->save();

        $teamItem=$task->getTeams->where('user_id',Auth::id())->first();
        $userActivities=Activity::where('task_id',$task->id)
        ->where('worker_id',$lastActivity->worker_id)
        ->where('status','!=',2)->get();
        // dd(count($userActivities));
        if(count($userActivities)==0){
            // dd('hi');
            $teamItem->status=0;
            $teamItem->update();
        }


        // $teamItem=$task->getTeams->where('user_id',Auth::id())->first();
        // $teamItem->status=0;
        // $teamItem->update();


        $teamItem=$task->getTeams->where('user_id',$request->worker_id)->first();
        $teamItem->status=1;
        $teamItem->update();


        $log=new Log();
        $log->type="Activity";
        $log->message=
        "Activity Replyed"." | "."Activity : #".$lastActivity->id."=>".$lastActivity->description;
        $log->user_id=Auth::id();
        $log->save();


        $log=new Log();
        $log->type="Activity";
        $log->message=
        "Activity Created"." | "."Activity : #".$activity->id."=>".$activity->description." | "."Assign To : ".User::Find($activity->worker_id)->name;
        $log->user_id=Auth::id();
        $log->save();


        try{
            // Mail::to(User::find($task->worker_id))
            // ->send(new NewActivity($activity->id,$activity->sender_id,$activity->worker_id));
            Mail::to(User::find($task->worker_id))
            ->queue(new NewActivityMarkdownMail($task,$activity));
            }
            catch(Throwable $e){
                // dd($e);
            };

        // try {
        //     $user=User::findOrFail($activity->worker_id);
        //     Notification::sendNow($user,new NewActivityNotification($activity->id,$activity->sender_id,$activity->worker_id,'Reply Activity #'.$lastActivity->id. ' | You have Activity To Do'));

        //     $log->status=
        //     "Email Sent "."to : ".$user->name;
        //     $log->update();

        // } catch (\Throwable $th) {
        //     //throw $th;
        // }

        Alert::toast('Activity Replyed Successfuly','success');


        return redirect()->route('activities.index',['task_id'=>$request->task_id])->with('success-add','Activity Replyed Successfuly');;
    }
}
