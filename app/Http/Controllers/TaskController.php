<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use App\Mail\NewActivity;
use App\Mail\NewTaskCreated;
use App\Models\Activity;
use App\Models\Task;
use App\Models\Log;
use App\Models\Notify;
use App\Models\TaskType;
use App\Models\Team;
use App\Models\User;
use App\Notifications\NewActivityNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use RealRashid\SweetAlert\Facades\Alert;
use Throwable;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('task.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // if (Auth::user()->cannot('create', Task::class)) {
        //     Alert::toast('You Have No Access 403', 'error');
        //     return redirect()->back();
        // }

        $users = User::where('id', '!=', Auth::id())->get();
        $types = TaskType::all();

        return view('task.create', compact('users', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // if (Auth::user()->cannot('create', Task::class)) {
        //     Alert::toast('You Have No Access 403', 'error');
        //     return redirect()->back();
        // }
        // $this->authorize('create', Task::class);

        // $request->teams=array($request->teams);
        $teams=$request->teams;


        $validated = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'type_id' => 'required',
            'teams' => 'required',
            'priority' => 'required',
        ]);




            array_unshift($teams,(string)Auth::id());
            // dd($teams);


        $task = Task::create([
            'creator_id' =>  Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'type_id' => $request->type_id,
            // 'teams' => json_encode($teams),
            'worker_id' => $teams[1],
            'priority' => $request->priority,
            'lock' => 0,
        ]);

        //create creator team user
        // $team=new Team();
        // $team->task_id=$task->id;
        // $team->user_id = Auth::id();
        // $team->status=0;
        // $team->save();

        //create others team user
        foreach($teams as $key=>$teamUser){
            $team=new Team();
            $team->task_id=$task->id;
            $team->user_id = $teamUser;
            if($key == 1){
                $team->status = 1;
            };
            $team->save();
        };


        // dd($task->getTeams);

        // dd($task->TeamsMember);

        $log = new Log();
        $log->type = "Task";
        $log->message =
            "Task Created" . " | " . "Task : #" . $task->id . "=>" . $task->title;
        $log->user_id = Auth::id();
        $log->save();



        $activity = Activity::create([

            'sender_id' => Auth::id(),
            'worker_id' => $task->worker_id,
            'task_id' => $task->id,
            'description' => $task->description,
            'status' => 0,

        ]);

        $log = new Log();
        $log->type = "Activity";
        $log->message =
            "Activity Created" . " | " . "Activity : #" . $activity->id . "=>" . $activity->description . " | " . "Assign To : " . User::Find($activity->worker_id)->name;
        $log->user_id = Auth::id();
        $log->save();



        try{
        Mail::to(User::find($task->getTeams->pluck('user_id')))->send(new NewTaskCreated);
        Mail::to(User::find($task->worker_id))
        ->send(new NewActivity($activity->id,$activity->sender_id,$activity->worker_id));
        }
        catch(Throwable $e){
            // dd($e);
        };




        Alert::toast('Task ID:' . $task->id . ' Added Successfuly', 'success');


        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {

        $users = User::all();

        $types = TaskType::all();

        return view('task.show', compact('task', 'users', 'types'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {

        if (Auth::user()->cannot('update', $task)) {
            Alert::toast('You Have No Access 403', 'error');
            return redirect()->back();
        }

        $users = User::where('id', '!=', $task->creator_id)->get();
        $types = TaskType::all();

        return view('task.edit', compact('task', 'users', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {

        if (Auth::user()->cannot('update', $task)) {
            Alert::toast('You Have No Access 403', 'error');
            return redirect()->back();
        }

        $teams=$request->teams;

        // dd(json_encode($teams));
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'type_id' => 'required',
            'teams' => 'required',
            'priority' => 'required',
            'lock' => 'required',
            'status' => 'required',
        ]);

        if(! in_array($task->creator_id,$teams)){
            array_unshift($teams,$task->creator_id);
        }


        // $task->update([
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'type_id' => $request->type_id,
        //     'lock' => $request->lock,
        //     'status' => $request->status,
        //     'priority' => $request->priority,

        // ]);

        $task->update([
            // 'creator_id' => $teams[0],
            'title' => $request->title,
            'description' => $request->description,
            'type_id' => $request->type_id,
            'teams' => json_encode($teams),
            // 'worker_id' => $teams[1],
            'status' => $request->status,
            'priority' => $request->priority,
            'lock' => $request->lock,
        ]);


        foreach($task->getTeams as $key=>$item){
                if(in_array($item->user_id,$teams)){
                    continue;
                }
                else{
                    $activities=Activity::where('task_id',$item->task_id)->where('worker_id',$item->user_id)->orWhere('sender_id',$item->user_id)->delete();
                    $item->delete();
                }
        }

        foreach($teams as $key=>$teamUser){
            if(count(Team::where('user_id',$teamUser)->where('task_id',$task->id)->get())){
                continue;
            }
            else{
                $team=new Team();
                $team->task_id=$task->id;
                $team->user_id = $teamUser;
                $team->save();
            }
        }

        // foreach($teams as $key=>$teamUser){
        //     foreach($task->getTeams as $key=>$item){
        //         if(in_array($item->user_id,$teams)){
        //             continue;
        //         }
        //         else{
        //             array_push($item->user_id,$teams);
        //         }
        //     }
        //     if(Team::find())
        //     $team=new Team();
        //     $team->task_id=$task->id;
        //     $team->user_id = $teamUser;
        //     if($key == 1){
        //         $team->status = 1;
        //     };
        //     $team->save();
        // };

        $log = new Log();
        $log->type = "Task";
        $log->message =
            "Task Updated" . " | " . "Task : #" . $task->id . "=>" . $task->title;
        $log->user_id = Auth::id();
        $log->save();

        Alert::toast('Task ID:' . $task->id . ' Updated Successfuly', 'success');


        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {

        if (Auth::user()->cannot('delete', $task)) {
            Alert::toast('You Have No Access 403', 'error');
            return redirect()->back();
        }


        $task->delete();


        $log = new Log();
        $log->type = "Task";
        $log->message =
            "Task Deleted" . " | " . "Task : #" . $task->id . "=>" . $task->title;
        $log->user_id = Auth::id();
        $log->save();

        Alert::toast('Task ID:' . $task->id . ' Deleted Successfuly', 'success');


        return redirect()->route('tasks.index');
    }
}
