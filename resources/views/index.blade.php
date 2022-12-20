@extends('layouts.master')

@section('content')





  <div class="container p-2 mx-auto rounded-md bg-slate-900/80">









  <div class="my-3">
    <div class="flex items-center gap-3 p-2 text-center text-white rounded-md bg-slate-700">
        <div class="flex items-center justify-center">
          <img class="w-16" src="http://127.0.0.1:8000/images/cpnis-logo.png" alt="">
        </div>
        <h2 class="text-4xl font-semibold">User Dashboard</h2>
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



    <div class="flex flex-col gap-5 p-3 rounded-md bg-slate-700">


        <div class="flex flex-col gap-3 md:flex-row">
            <div class="w-full md:w-2/5">
                <div class="flex flex-col gap-1 p-3 rounded-md text-slate-200 bg-slate-900">
                    <div class="flex flex-col">
                        <div class="flex text-lg font-semibold uppercase">User Name : {{auth()->user()->name}}</div>
                        <div class="flex p-1 text-xs rounded-md text-slate-300">
                            <span class="">
                                User Role :
                                @if (auth()->user()->role==2)
                                    Super Admin
                                @elseif (auth()->user()->role==1)
                                    Admin
                                @elseif (auth()->user()->role==0)
                                    Normal User
                                @endif
                            </span>
                        </div>
                        <div class="flex p-1 text-xs text-slate-300">User Email : {{auth()->user()->email}}</div>
                    </div>
                    <div class="w-full h-1 my-2 rounded-md bg-slate-600"></div>
                    <div class="grid w-full grid-cols-2 gap-3 py-1 md:grid-cols-2">

                        <div class="flex items-center gap-3 p-2 text-xl rounded-md bg-slate-200" >
                                <div class="p-1 px-2 py-1 text-lg rounded-md bg-slate-900">{{count(auth()->user()->getTeams)}} </div>
                                <div class="text-base font-semibold text-slate-900">My Group Tasks</div>
                        </div>

                        <div class="flex items-center gap-3 p-2 text-xl rounded-md bg-slate-200" >
                                <div class="px-2 py-1 text-lg rounded-md bg-slate-900">
                                    {{count(auth()->user()->getWorkingActivities->where('status' ,'!=',2))}} </div>
                                <div class="text-base font-semibold text-slate-900">My Avtivities</div>
                        </div>

                        <div class="flex items-center gap-3 p-2 text-xl rounded-md bg-slate-200" >
                            <div class="px-2 py-1 text-lg rounded-md bg-slate-900">
                                {{$userRemindersCount}} </div>
                            <div class="text-base font-semibold text-slate-900">My Reminders</div>
                    </div>


                    </div>
                </div>
            </div>
            <div class="w-full md:w-3/5  bg-slate-900 rounded-md p-3  max-h-[300px] overflow-y-auto">
                <div class="flex items-center gap-3 p-2 my-1 text-xl text-slate-300 ">
                    {{-- <i class="p-2 text-5xl fa-regular fa-bell bg-violet-600 rounded-xl"></i> --}}
                    <div class="flex flex-col justify-between w-full gap-2 md:flex-row">
                        <div class="flex items-center gap-2 font-semibold">
                            <span class="px-4 py-2 rounded-md bg-violet-900 text-slate-200">{{$userRemindersCount}} </span>
                            <span> My Reminders</span>
                        </div>
                        <div class="flex">
                            <a class="flex items-center px-4 py-2 text-sm text-center transition-all duration-200 rounded-md bg-violet-900 text-slate-200 hover:scale-95 hover:bg-violet-900"
                         href="{{route('reminder.index')}}">Show All Reminders</a>
                        </div>

                    </div>
                </div>
                <div class="h-1 my-2 bg-slate-600 rounded-xl"></div>
                <div class="owl-carousel owl-reminders owl-theme">
                    @foreach ($userReminders as $item)
                    <div class="rounded-md item bg-violet-900">
                        <div class="px-2 py-1 text-slate-200">
                            Reminder #{{$item->id}}
                        </div>
                        <div class="flex flex-col gap-3 px-2 py-2 duration-200 rounded-md text-slate-400 bg-slate-100 hover:scale-95">
                            <div class="flex gap-1 ">
                                <div class="flex flex-wrap gap-1">
                                    <div  class="px-2 py-1 text-xs text-center rounded-md bg-slate-800 text-slate-100">Reminder Date : {{$item->reminder_date}}</div>
                                </div>
                                <div class="flex flex-wrap gap-1">
                                    <div  class="px-2 py-1 text-xs text-center rounded-md bg-slate-800 text-slate-100">Status :
                                        @if ($item->status==0)
                                            Waiting
                                        @elseif($item->status==1)
                                            Send
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center gap-3 px-1 ">
                                <div class="text-sm font-semibold text-slate-800">
                                    {{$item->body}}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <script>
                    $('.owl-carousel.owl-reminders').owlCarousel({
                        loop:true,
                        margin:10,
                        nav:false,
                        responsive:{
                            0:{
                                items:1
                            },
                            600:{
                                items:3
                            },
                            1000:{
                                items:2
                            }
                        }
                    })
                </script>
            </div>
        </div>





        <div class="w-full p-3 rounded-md bg-slate-900 ">
            <div class="flex items-center gap-3 p-2 my-1 text-xl text-slate-300">
                {{-- <i class="p-2 text-5xl bg-blue-800 fas fa-code-fork rounded-xl"></i> --}}
                <div class="flex flex-col justify-between w-full gap-2 md:flex-row">
                    <div class="flex items-center gap-2 font-semibold">
                        <span class="px-4 py-2 bg-blue-800 rounded-md text-slate-200">{{$userTasksCount}} </span>
                       <span class="text-xl">My Tasks</span>
                    </div>
                    <div class="flex gap-3">
                            <a class="flex items-center gap-2 px-4 py-2 text-sm text-center transition-all duration-200 bg-blue-800 rounded-md text-slate-200 hover:scale-95 hover:bg-blue-900"
                        href="{{route('tasks.create')}}">
                        {{-- <i class="text-xl fas fa-code-fork"></i> --}}
                        Add New Task
                        </a>
                        <a class="flex items-center gap-2 px-4 py-2 text-sm text-center transition-all duration-200 bg-blue-800 rounded-md text-slate-200 hover:scale-95 hover:bg-blue-900"
                        href="{{route('tasks.index')}}">
                        {{-- <i class="text-xl fas fa-code-fork"></i> --}}
                        Show All Tasks
                        </a>
                    </div>
                </div>

            </div>
            <div class="h-1 my-2 rounded-md bg-slate-600"></div>


            <div >

                <div  class="owl-carousel owl-tasks owl-theme">
                    @foreach ($userTasks as $task)
                    <div class="bg-blue-900 rounded-md item">
                        <div class="px-2 py-1 text-slate-200">
                            Task #{{$task->id}}
                        </div>
                        <div href="{{route('tasks.show',$task->id)}}" class="flex flex-col gap-2 p-2 text-white duration-200 bg-white rounded-md hover:scale-95">

                            <div class="flex flex-col ">
                               <div class="flex w-full gap-1">
                                   <div  class="w-full px-2 text-base font-semibold rounded-md text-slate-800">
                                       {{$task->title}}
                                   </div>
                               </div>
                           </div>

                           <div class="h-0.5 bg-slate-300"></div>



                           <div class="flex flex-col gap-1 ">
                               <div class="flex justify-between gap-1">
                                   {{-- <div  class="px-2 py-1 text-xs text-center rounded-md bg-slate-800">Task ID : #{{$task->id}}</div> --}}
                                   <div class="flex items-center gap-1">
                                       <div>
                                           @if ($task->priority==0)
                                           <a class="flex items-center justify-between gap-1 px-2 py-1 text-xl rounded-md text-slate-800 bg-slate-300 " title="Low Priority">
                                               <i class="text-base fa-regular fa-star"></i>
                                               <div class="text-xs ">Low Priority</div>
                                           </a>
                                       @elseif ($task->priority==1)
                                           <a class="flex items-center justify-between gap-1 px-2 py-1 text-xl bg-orange-700 rounded-md text-slate-200" title="Normal Priority">
                                               <div class="flex">
                                                   <i class="text-base fa-solid fa-star-half-stroke"></i>
                                               </div>
                                               <div class="text-xs ">Normal Priority</div>
                                           </a>
                                       @elseif ($task->priority==2)
                                           <a class="flex items-center justify-between gap-1 px-2 py-1 text-xl bg-red-900 rounded-md text-slate-200" title="High Priority">
                                               <div class="flex items-center">
                                                   <i class="text-base fa-solid fa-star"></i>
                                               </div>
                                               <div class="text-xs">High Priority</div>
                                           </a>
                                       @endif
                                       </div>
                                       <div>
                                           @if ($task->status==2)
                                       <a class="flex items-center justify-between gap-1 px-2 py-1 rounded-md text-slate-200 bg-emerald-800 " title="Complete Tsask">
                                           <i class="text-base fa-solid fa-circle-check"></i>
                                           <div class="text-xs ">Complete</div>
                                       </a>
                                       @elseif ($task->status==1)
                                       <a class="flex items-center justify-between gap-1 px-2 py-1 text-xl bg-orange-700 rounded-md text-slate-200" title="Working Task">
                                           <i class="text-base fa-solid fa-person-digging"></i>
                                           <div class="text-xs">Working</div>
                                       </a>
                                       @elseif ($task->status==0)
                                       <a class="flex items-center justify-between gap-1 px-2 py-1 text-xl text-gray-800 rounded-md bg-slate-300 " title="Nothing">
                                           <i class="text-base fa-solid fa-circle-minus"></i>
                                           <div class="text-xs">Nothing</div>
                                       </a>
                                       @endif
                                       </div>
                                       <div  class="flex px-2 py-1 text-xs text-center rounded-md bg-slate-800">{{$task->created_at->diffForHumans()}}</div>
                                   </div>
                               </div>
                           </div>

                           {{-- <div class="h-0.5 bg-slate-300"></div> --}}


                           <div class="flex flex-col gap-1 ">
                               <div class="flex justify-between gap-1">
                                   <div  class="px-2 py-1 text-xs text-center bg-blue-800 rounded-md ">Create By : {{$task->getCreator->name}}</div>
                                   <div class="flex gap-1">
                                       <div  class="px-2 py-1 text-xs text-center rounded-md bg-slate-800"> {{$task->getType->name}}</div>
                                   </div>
                               </div>
                           </div>


                           {{-- <div class="h-0.5 bg-slate-300"></div> --}}


                           <div class="flex flex-col gap-1">
                               <div class="text-xs font-semibold text-slate-800">Task Teams : </div>

                               <div class="flex flex-wrap items-center gap-1">
                                   @foreach ($task->getTeams->sortByDesc('status') as $team)

                                   <span class="max-w-max flex items-center gap-1  py-1 px-2 rounded-md text-xs
                                       @if ($team->status==1)
                                               bg-orange-700 text-slate-100
                                       @else
                                           bg-slate-300 text-slate-800
                                       @endif "
                                   >
                                           @if ($team->status==1)
                                               <i class="text-sm fa-solid fa-running"></i>
                                               {{-- <span>Worker : </span> --}}
                                           @endif
                                           <span class="">
                                               {{$team->getUser->name}} :
                                               {{count($team->getUser->getWorkingActivities->where('task_id',$team->task_id)->where('status' ,'!=',2))}}</span>
                                   </span>
                               @endforeach
                               </div>
                           </div>

                           <div class="h-0.5 bg-slate-300 rounded-md"></div>


                           <div>
                               <a class="block w-full px-4 py-2 text-sm text-center rounded-md bg-slate-800 hover:bg-slate-900" href="{{route('tasks.show',$task->id)}}">Show Task Details</a>
                           </div>


                       </div>
                    </div>

                    @endforeach
                </div>


            </div>

            <script>
                $('.owl-carousel.owl-tasks').owlCarousel({
                    loop:false,
                    margin:10,
                    nav:false,
                    responsive:{
                        0:{
                            items:1
                        },
                        600:{
                            items:2
                        },
                        1000:{
                            items:3
                        }
                    }
                })
            </script>

        </div>


        <div class="w-full p-3 rounded-md bg-slate-900">
            <div class="flex items-center gap-3 p-2 my-1 text-xl text-slate-300 ">
                {{-- <i class="p-2 text-5xl bg-orange-600 fa-solid fa-code-pull-request rounded-xl"></i> --}}
                <div class="flex flex-col justify-between w-full gap-2 md:flex-row">
                    <div class="flex items-center gap-2 font-semibold">
                        <span class="px-4 py-2 bg-orange-800 rounded-md text-slate-200">{{$userActivitiesCount}} </span>
                        <span> My Activities ToDo</span>
                    </div>
                    <div class="flex gap-3">
                        <a class="flex items-center gap-2 px-4 py-2 text-sm text-center transition-all duration-200 bg-orange-800 rounded-md text-slate-200 hover:scale-95 hover:bg-orange-900"
                        href="{{route('activities.create')}}">
                        {{-- <i class="text-xl fa-solid fa-code-pull-request"></i> --}}
                        Add New Activity
                    </a>
                    <a class="flex items-center gap-2 px-4 py-2 text-sm text-center transition-all duration-200 bg-orange-800 rounded-md hover:bg-orange-900 text-slate-200 hover:scale-95"
                    href="{{route('activities.index')}}">
                    {{-- <i class="text-xl fa-solid fa-code-pull-request"></i> --}}
                    Show All Activities
                    </a>
                    </div>
                </div>
            </div>
            <div class="h-1 my-2 rounded-md bg-slate-600"></div>
            <div class="owl-carousel owl2 owl-theme">
                    @foreach ($userActivities as $item)
                    <div class="bg-orange-800 rounded-md item">
                        <div class="px-2 py-1 text-slate-200">
                            Activity #{{$item->id}}
                        </div>
                        <div  class="flex flex-col gap-2 p-2 transition-all duration-200 rounded-md text-slate-100 bg-slate-100 hover:scale-95">







                             <div class="flex items-center gap-3 px-3 ">
                                 <div class="text-sm font-semibold text-slate-800">
                                    @if (!is_null($item->description))
                                        {{$item->description}}
                                    @else
                                        No Subject
                                    @endif

                                 </div>
                             </div>


                             <div class="h-0.5 bg-slate-300 rounded-md"></div>


                            <div class="flex flex-col gap-1 ">
                                <div class="flex justify-between gap-1">
                                    <div  class="px-2 py-1 text-xs text-center rounded-md bg-slate-800">For Task ID : #{{$item->getTask->id}}</div>

                                    <div  class="px-2 py-1 text-xs text-center rounded-md bg-slate-800">{{$item->created_at->diffForHumans()}}</div>
                                </div>
                            </div>

                            <div class="flex justify-between w-full gap-1">
                                <div  class="px-2 py-1 text-xs text-center bg-blue-800 rounded-md">Send By : {{$item->getSender->name}}</div>
                                <div class="flex items-center justify-center gap-2">

                                    @if ($item->status==2)
                                        <a class="flex items-center gap-1 px-2 py-1 rounded-md bg-emerald-800 text-slate-200">
                                            <i class="text-lg fa-solid fa-circle-check"></i>
                                            <div class="text-xs">Complete</div>
                                        </a>
                                    @elseif ($item->status==1)
                                        <a class="flex items-center gap-1 px-2 py-1 text-xl bg-orange-700 rounded-md text-slate-200">
                                            <i class="text-lg fa-solid fa-person-digging"></i>
                                            <div class="text-xs">Working</div>
                                        </a>
                                    @elseif ($item->status==0)
                                        <a class="flex items-center gap-1 px-2 py-1 text-xl rounded-md bg-slate-300 text-slate-800">
                                            <i class="text-base fa-solid fa-circle-minus"></i>
                                            <div class="text-xs ">Not Seen</div>
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <div class="h-0.5 bg-slate-300 rounded-md"></div>


                            <div class="flex justify-between w-full gap-3">
                                <a href="{{route('activities.show',$item->id)}}"
                                     class="w-2/3 p-2 text-sm text-center rounded-md bg-slate-800 text-slate-200 hover:bg-slate-900">Show Activity Details</a>
                                <a href="{{route('activities.reply',$item->id)}}"
                                     class="w-1/3 p-2 text-sm text-center bg-blue-800 rounded-md text-slate-200 hover:bg-blue-900">Reply</a>
                            </div>


                        </div>


                    </div>
                @endforeach

            </div>
            <script>
                $('.owl-carousel.owl2').owlCarousel({
                    loop:false,
                    margin:10,
                    nav:false,
                    responsive:{
                        0:{
                            items:1
                        },
                        600:{
                            items:3
                        },
                        1000:{
                            items:4
                        }
                    }
                })
            </script>
        </div>




    </div>





    <div class="h-2 my-5 bg-orange-600 rounded-xl"></div>





  </div>






@endsection
