@extends('layouts.master')

@section('content')





  <div class="container mx-auto bg-slate-900/80 p-2 rounded-xl">








  <div class="my-3">
    <div class="text-center text-white flex items-center gap-3 bg-slate-800 p-2 rounded-xl">
        <div class="flex items-center justify-center">
          <img class="w-16" src="http://127.0.0.1:8000/images/cpnis-logo.png" alt="">
        </div>
        <i class="fa-solid fa-user-tie text-4xl "></i>
        <h2 class="text-3xl font-semibold">Admin Reports</h2>
    </div>
</div>




    {{-- <div class="p-3">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="flex flex-col gap-2 text-slate-200">
              <h1 class="text-5xl font-bold">Dashboard</h1>
              <h3 class="text-xl">CPNIS ToDoSystem (Version 1.0)</h3>
            </div>
            <div class="flex flex-col items-end gap-2 text-slate-200">
                <h1 class="text-3xl">Welcome {{auth()->user()->name}}</h1>
            </div>
        </div>
    </div> --}}

    {{-- <div class="h-2 my-5 bg-blue-600 rounded-xl"></div> --}}

    <div class="flex flex-col gap-5 bg-slate-600 p-3 rounded-md my-5">
        <div class="w-full   bg-slate-900 rounded-md p-3">

            <div class="">


                {{-- <div class="h-2 my-2 bg-orange-600 rounded-xl"></div> --}}


                <div  class="w-full grid grid-cols-1 md:grid-cols-4 gap-3 my-3 ">



                    <div class="flex items-center justify-between gap-1 text-slate-300 py-1 px-4  rounded-md bg-slate-700">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-users text-2xl bg-slate-800 text-slate-400 p-2 rounded-md  w-12 text-center"></i>
                            <div class="text-xl font-semibold ">Total Users</div>
                        </div>
                        <div  class="text-3xl font-semibold  ">{{count($users)}}</div>
                    </div>

                        <div class="flex items-center justify-between gap-1 text-slate-300 py-1 px-4 bg-slate-700 rounded-md">
                            <div class="flex items-center gap-3">
                                <i class="fas fa-code-fork text-2xl bg-slate-800 text-slate-400 p-2 rounded-md  w-12 text-center"></i>
                                <div class="text-xl font-semibold ">Total Tasks</div>
                            </div>
                            <div  class="text-3xl font-semibold ">{{count($tasks)}}</div>
                        </div>

                        <div class="flex items-center justify-between gap-1 text-slate-300 py-1 px-4 bg-slate-700 rounded-md">
                            <div class="flex items-center gap-3">
                                <i class="fas fa-code-pull-request text-2xl bg-slate-800 text-slate-400 p-2 rounded-md  w-12 text-center"></i>
                                <div class="text-xl font-semibold ">Total Activities</div>
                            </div>
                            <div  class="text-3xl font-semibold ">{{count($activities)}}</div>
                        </div>

                        <div class="flex items-center justify-between gap-1 text-slate-300 py-1 px-4 bg-slate-700 rounded-md">
                            <div class="flex items-center gap-3">
                                <i class="fas fa-bell text-2xl bg-slate-800 text-slate-400 p-2 rounded-md w-12 text-center"></i>
                                <div class="text-xl font-semibold ">Total Reminders</div>
                            </div>
                            <div  class="text-3xl font-semibold ">{{count($reminders)}}</div>
                        </div>
                </div>
            </div>
        </div>
        <div class="w-full   bg-slate-900 rounded-md p-3">

            {{-- <div class="h-2 my-2 bg-orange-600 rounded-xl"></div> --}}
            <div class="my-3">
                <div  class="w-full grid grid-cols-1 md:grid-cols-3 gap-3 ">
                    @foreach ($users as $user)
                        <div class="flex flex-col  justify-between gap-1 text-slate-200 bg-slate-700 rounded-md p-2">
                            <div class="w-full md:w-auto flex flex-col items-start p-2 ">
                                <div class="text-2xl font-semibold my-2 uppercase ">{{$user->name}}</div>
                                <div class="flex gap-2">
                                    <div class=" text-xs font-semibold text-slate-300 break-words bg-slate-800 p-1 rounded-md">{{$user->email}}</div>
                                    <div class=" text-xs font-semibold text-slate-300 break-words bg-slate-800 p-1 rounded-md">
                                        <span class="">
                                            @if ($user->role==2)
                                                Super Admin
                                            @elseif ($user->role==1)
                                                Admin
                                            @elseif ($user->role==0)
                                                Normal User
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <hr>


                            <div class="w-full  flex flex-col  gap-2 ">
                                <div class="w-full flex gap-2 items-center font-semibold text-xl text-slate-300 bg-slate-800 py-1 px-1 rounded-md ">
                                    <div class="w-28 flex items-center gap-2 bg-slate-900 rounded-lg p-2">
                                        <i class="fas fa-code-fork text-xl "></i>
                                        <div class="text-xs">Task</div>
                                    </div>
                                    <div class="px-2">
                                        {{count($user->getCreatedTasks)}}
                                        <span class="text-xs">Created</span>
                                    </div>
                                    <div class="px-2">
                                        {{count($user->getTeams)}}
                                        <span class="text-xs">Teams</span>
                                    </div>
                                </div>
                                <div class="flex  gap-2 items-center font-semibold text-xl text-slate-300 bg-slate-800 py-1 px-1 rounded-md ">
                                    <div class="w-28 flex items-center gap-2 bg-slate-900 rounded-lg p-2">
                                        <i class="fas fa-code-fork text-xl "></i>
                                        <div class="text-xs">Activities</div>
                                    </div>
                                    <div class="px-2">
                                        {{count($user->getWorkingActivities->where('status',2))}}
                                        <span class="text-xs">complete</span>
                                    </div>
                                    <div class="px-2">
                                        {{count($user->getWorkingActivities->where('status',1))}}
                                        <span class="text-xs">Working</span>
                                    </div>
                                    <div class="px-2">
                                        {{count($user->getWorkingActivities->where('status',0))}}
                                        <span class="text-xs">Not Seen</span>
                                    </div>
                                </div>
                                <div class="flex gap-3 items-center font-semibold text-sm text-slate-300 bg-slate-800 py-1 px-1 rounded-md ">
                                    <div class="w-28 flex items-center gap-2 bg-slate-900 rounded-lg p-2">
                                        <i class="fa-solid fa-clock text-xl"></i>
                                        <div class="text-xs">Last Activity</div>
                                    </div>
                                    @if ($user->getWorkingActivities->where('status','!=',0)->last())
                                    <div class="px-2">{{$user->getWorkingActivities->where('status','!=',0)->last()->updated_at}} </div>
                                    @else
                                    <div class="px-2"> --- </div>
                                    @endif
                                </div>

                                <div class="w-full flex gap-2 items-center font-semibold text-xl text-slate-300 bg-slate-800 py-1 px-1 rounded-md ">
                                    <div class="w-28 flex items-center gap-2 bg-slate-900 rounded-lg p-2">
                                        <i class="fas fa-code-fork text-xl "></i>
                                        <div class="text-xs">Reminders</div>
                                    </div>
                                    <div class="px-2">
                                        {{count([$user->WorkingTasks])}}
                                        <span class="text-xs">Total</span>
                                    </div>
                                    <div class="px-2">
                                        {{count($user->WorkingTasks)}}
                                        <span class="text-xs">Pool</span>
                                    </div>

                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>












  </div>






@endsection
