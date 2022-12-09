<?php

namespace App\Http\Controllers;

use App\Jobs\SendReminder;
use App\Mail\NewActivity;
use App\Models\Reminder;
use App\Models\Task;
use App\Models\User;
use App\Notifications\RemindmeNotification;
use Illuminate\Http\Request;
use Illuminate\Queue\Jobs\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use RealRashid\SweetAlert\Facades\Alert;


class ReminderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();

        if(Auth::user()->role==2){
            $reminders=Reminder::all();
        }
        else{
            $reminders=Reminder::where('user_id',Auth::id())->get();
        }



        return view('reminder.index',compact('reminders','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if (Auth::user()->cannot('admin-role')) {
        //     Alert::toast('You Have No Access 403', 'error');
        //     return redirect()->back();
        // }


        $validated=$request->validate([
            'user_id'  => 'required',
            'reminder_date' => 'required',
            'body' => 'nullable',
        ]);
        $reminder=new Reminder();
        $reminder->user_id=$request->user_id;
        $reminder->reminder_date=$request->reminder_date;
        $reminder->body=$request->body;
        $reminder->status = 0 ;
        $reminder->save();

        Alert::toast('Reminder Added Successfuly','success');

        return redirect()->route('reminder.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reminder $reminder)
    {
        $reminder->delete();
        Alert::toast('Reminder Deleted Successfuly','error');
        return redirect()->route('reminder.index');
    }
}
