<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Document;
use App\Models\Reminder;
use App\Models\SiteSetting;
use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks=Task::all();
        $activities=Activity::all();
        $reminders=Reminder::all();
        $users=User::all();
        $userTasks=Task::find(Auth::user()->getTeams->pluck('task_id')) ;
        $userActivities=Activity::where('worker_id',Auth::id())->where('status','!=',2)->get();
        $userReminders=Reminder::where('user_id',Auth::id())->where('status',0)->get();

        return view('index',compact('tasks','activities','userActivities','reminders','users','userTasks','userReminders'));
    }


    public function adminReport()
    {
        if (Auth::user()->cannot('admin-role')) {
            Alert::toast('You Have No Access 403', 'error');
            return redirect()->back();
        }

        $tasks=Task::all();
        $activities=Activity::all();
        $reminders=Reminder::all();
        $users=User::all();
        $userTasks=Task::where('worker_id',Auth::id())->where('status','!=',2)->get();
        $userActivities=Activity::where('worker_id',Auth::id())->where('status','!=',2)->get();
        $userReminders=Reminder::all();

        return view('admin-report',compact('tasks','activities','userActivities','reminders','users','userTasks','userReminders'));
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
        //
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
    public function edit()
    {
        if (Auth::user()->cannot('owner-role')) {
            Alert::toast('You Have No Access 403', 'error');
            return redirect()->back();
        }
        $setting=SiteSetting::all()->last();
        return view('sitesetting.edit',compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        if (Auth::user()->cannot('owner-role')) {
            Alert::toast('You Have No Access 403', 'error');
            return redirect()->back();
        }
        $validated=$request->validate([
            'invitation_code' => 'required|min:3',
            ]);

        $setting=SiteSetting::all()->last();
        if(!is_null($setting)){
            $setting->invitation_code=$request->invitation_code;
            $setting->update();
        }
        else
            $setting=new SiteSetting();
            $setting->invitation_code=$request->invitation_code;
            $setting->save();


            Alert::toast('Settings: Updated Successfuly','success');

        return redirect()->route('setting.edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
