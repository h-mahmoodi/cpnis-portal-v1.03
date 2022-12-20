@extends('layouts.master')

@section('content')





  <div class="container p-2 mx-auto bg-slate-900/80 rounded-xl">








  <div class="my-3">
    <div class="flex items-center gap-3 p-2 text-center text-white bg-slate-800 rounded-xl">
        <div class="flex items-center justify-center">
          <img class="w-16" src="http://127.0.0.1:8000/images/cpnis-logo.png" alt="">
        </div>
        <i class="text-4xl fa-solid fa-user-tie "></i>
        <h2 class="text-3xl font-semibold">Admin Reports</h2>
    </div>
</div>




    {{-- <div class="p-3">
        <div class="flex flex-col items-center justify-between md:flex-row">
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

    <div class="flex flex-col gap-5 p-3 my-5 rounded-md bg-slate-600">
        <div class="w-full p-3 rounded-md bg-slate-900">

            <div class="">


                {{-- <div class="h-2 my-2 bg-orange-600 rounded-xl"></div> --}}


                <div  class="grid w-full grid-cols-1 gap-3 my-3 md:grid-cols-4 ">



                    <div class="flex items-center justify-between gap-1 px-4 py-1 rounded-md text-slate-300 bg-slate-700">
                        <div class="flex items-center gap-3">
                            <i class="w-12 p-2 text-2xl text-center rounded-md fas fa-users bg-slate-800 text-slate-400"></i>
                            <div class="text-xl font-semibold ">Total Users</div>
                        </div>
                        <div  class="text-3xl font-semibold ">{{count($users)}}</div>
                    </div>

                        <div class="flex items-center justify-between gap-1 px-4 py-1 bg-blue-800 rounded-md text-slate-300">
                            <div class="flex items-center gap-3">
                                <i class="w-12 p-2 text-2xl text-center rounded-md fas fa-code-fork bg-slate-800 text-slate-400"></i>
                                <div class="text-xl font-semibold ">Total Tasks</div>
                            </div>
                            <div  class="text-3xl font-semibold ">{{count($tasks)}}</div>
                        </div>

                        <div class="flex items-center justify-between gap-1 px-4 py-1 bg-orange-800 rounded-md text-slate-300">
                            <div class="flex items-center gap-3">
                                <i class="w-12 p-2 text-2xl text-center rounded-md fas fa-code-pull-request bg-slate-800 text-slate-400"></i>
                                <div class="text-xl font-semibold ">Total Activities</div>
                            </div>
                            <div  class="text-3xl font-semibold ">{{count($activities)}}</div>
                        </div>

                        <div class="flex items-center justify-between gap-1 px-4 py-1 rounded-md bg-violet-900 text-slate-300">
                            <div class="flex items-center gap-3">
                                <i class="w-12 p-2 text-2xl text-center rounded-md fas fa-bell bg-slate-800 text-slate-400"></i>
                                <div class="text-xl font-semibold ">Total Reminders</div>
                            </div>
                            <div  class="text-3xl font-semibold ">{{count($reminders)}}</div>
                        </div>
                </div>
            </div>
        </div>
        <div class="w-full p-3 rounded-md bg-slate-900">

            {{-- <div class="h-2 my-2 bg-orange-600 rounded-xl"></div> --}}
            <div class="my-3">
                <div  class="grid w-full grid-cols-1 gap-3 md:grid-cols-3 ">
                    @foreach ($users as $user)
                        <div class="flex flex-col justify-between gap-1 p-2 rounded-md text-slate-200 bg-slate-700">
                            <div class="flex flex-col items-start w-full p-2 md:w-auto ">
                                <div class="my-2 text-2xl font-semibold uppercase ">{{$user->name}}</div>
                                <div class="flex gap-2">
                                    <div class="p-1 text-xs font-semibold break-words rounded-md text-slate-300 bg-slate-800">{{$user->email}}</div>
                                    <div class="p-1 text-xs font-semibold break-words rounded-md text-slate-300 bg-slate-800">
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


                            <div class="flex flex-col w-full gap-2 ">
                                <div class="flex items-center w-full gap-2 px-1 py-1 text-xl font-semibold rounded-md text-slate-300 bg-slate-800 ">
                                    <div class="flex items-center gap-2 p-2 bg-blue-900 rounded-lg w-28">
                                        <i class="text-xl fas fa-code-fork "></i>
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
                                <div class="flex items-center gap-2 px-1 py-1 text-xl font-semibold rounded-md text-slate-300 bg-slate-800 ">
                                    <div class="flex items-center gap-2 p-2 bg-orange-800 rounded-lg w-28">
                                        <i class="text-xl fas fa-code-fork "></i>
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
                                <div class="flex items-center gap-3 px-1 py-1 text-sm font-semibold rounded-md text-slate-300 bg-slate-800 ">
                                    <div class="flex items-center gap-2 p-2 rounded-lg w-28 bg-slate-900">
                                        <i class="text-xl fa-solid fa-clock"></i>
                                        <div class="text-xs">Last Activity</div>
                                    </div>
                                    @if ($user->getWorkingActivities->where('status','!=',0)->last())
                                    <div class="px-2">{{$user->getWorkingActivities->where('status','!=',0)->last()->updated_at}} </div>
                                    @else
                                    <div class="px-2"> --- </div>
                                    @endif
                                </div>

                                <div class="flex items-center w-full gap-2 px-1 py-1 text-xl font-semibold rounded-md text-slate-300 bg-slate-800 ">
                                    <div class="flex items-center gap-2 p-2 rounded-lg w-28 bg-violet-900">
                                        <i class="text-xl fas fa-code-fork "></i>
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
