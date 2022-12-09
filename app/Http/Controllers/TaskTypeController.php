<?php

namespace App\Http\Controllers;

use App\Models\TaskType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class TaskTypeController extends Controller
{
    public function index()
    {
        if (Auth::user()->cannot('create', TaskType::class)) {
            Alert::toast('You Have No Access 403', 'error');
            return redirect()->back();
        }
        $taskTypes=TaskType::all();
        return view('task.type.index',compact('taskTypes'));
    }

    public function create()
    {

        if (Auth::user()->cannot('create', TaskType::class)) {
            Alert::toast('You Have No Access 403', 'error');
            return redirect()->back();
        }
        return view('task.type.create');
    }

    public function store(Request $request)
    {
        if (Auth::user()->cannot('create', TaskType::class)) {
            Alert::toast('You Have No Access 403', 'error');
            return redirect()->back();
        }
        $validated=$request->validate([
            'name' => 'required',
        ]);

        $taskType=TaskType::create([
            'name' => $request->name,
        ]);
        Alert::toast('TaskType : '.$taskType->name.' Added Successfuly','success');

        return redirect()->route('tasks.types.index');
    }




    public function edit(TaskType $taskType)
    {
        return view('task.type.edit',compact('taskType'));
    }


    public function update(Request $request,TaskType $taskType)
    {
        $validated=$request->validate([
            'name' => 'required',
        ]);

        $taskType->name=$request->name;
        $taskType->update();

        Alert::toast('TaskType : '.$taskType->name.' Updated Successfuly','warning');

        return redirect()->route('tasks.types.index');
    }

    public function destroy(TaskType $taskType)
    {
        $taskType->delete();

        Alert::toast('TaskType : '.$taskType->name.' Deleted Successfuly','error');

        return redirect()->route('tasks.types.index');
    }
}
