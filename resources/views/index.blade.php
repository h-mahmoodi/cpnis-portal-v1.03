@extends('layouts.master')

@section('content')





  <div class="container mx-auto bg-slate-900/80 p-2 rounded-md">









  <div class="my-3">
    <div class="text-center text-white flex items-center gap-3 bg-slate-700 p-2 rounded-md">
        <div class="flex items-center justify-center">
          <img class="w-16" src="http://127.0.0.1:8000/images/cpnis-logo.png" alt="">
        </div>
        <h2 class="text-4xl font-semibold">User Dashboard</h2>
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



    <div class="flex flex-col gap-5 bg-slate-700 p-3 rounded-md">


        <div class="flex flex-col md:flex-row gap-3">
            <div class="w-full md:w-2/5">
                <div class="flex flex-col gap-1 text-slate-200 bg-slate-900 rounded-md p-3">
                    <div class="flex flex-col">
                        <div class="flex text-lg font-semibold uppercase">User Name : {{auth()->user()->name}}</div>
                        <div class="flex text-xs  text-slate-300  p-1 rounded-md">
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
                        <div class="flex text-xs text-slate-300 p-1">User Email : {{auth()->user()->email}}</div>
                    </div>
                    <div class="w-full h-1 bg-slate-600 rounded-md my-2"></div>
                    <div class="w-full grid grid-cols-2 md:grid-cols-2 gap-3">

                        <div class="flex items-center gap-3 text-xl  rounded-md p-2 bg-slate-200" >
                                <div class="text-lg bg-slate-900 p-1 rounded-md px-2 py-1">{{count(auth()->user()->getTeams)}} </div>
                                <div class="text-base text-slate-900 font-semibold">My Group Tasks</div>
                        </div>

                        <div class="flex items-center gap-3 text-xl  rounded-md p-2 bg-slate-200" >
                                <div class="text-lg bg-slate-900 rounded-md px-2 py-1">
                                    {{count(auth()->user()->getWorkingActivities->where('status' ,'!=',2))}} </div>
                                <div class="text-base text-slate-900 font-semibold">My Avtivities</div>
                        </div>

                        <div class="flex items-center gap-3 text-xl  rounded-md p-2 bg-slate-200" >
                            <div class="text-lg bg-slate-900 rounded-md px-2 py-1">
                                {{$userRemindersCount}} </div>
                            <div class="text-base text-slate-900 font-semibold">My Reminders</div>
                    </div>


                    </div>
                </div>
            </div>
            <div class="w-full md:w-3/5  bg-slate-900 rounded-md p-3  max-h-[300px] overflow-y-auto">
                <div class="flex gap-3 items-center text-slate-300 p-2 text-xl my-1 ">
                    {{-- <i class="fa-regular fa-bell text-5xl p-2 bg-violet-600 rounded-xl"></i> --}}
                    <div class="flex flex-col md:flex-row w-full gap-2 justify-between">
                        <div class="flex items-center gap-2 font-semibold">
                            <span class=" rounded-md bg-violet-900 text-slate-200 px-4 py-2">{{$userRemindersCount}} </span>
                            <span> My Reminders</span>
                        </div>
                        <div class="flex">
                            <a class="flex items-center text-sm bg-violet-900 text-slate-200 text-center rounded-md hover:scale-95 py-2 px-4 transition-all duration-200 hover:bg-violet-900"
                         href="">Show All Reminders</a>
                        </div>

                    </div>
                </div>
                <div class="h-1 my-2 bg-slate-600 rounded-xl"></div>
                <div class="owl-carousel owl-reminders owl-theme">
                    @foreach ($userReminders as $item)
                    <div class="item bg-violet-900 rounded-md">
                        <div class="px-2 py-1 text-slate-200">
                            Reminder #{{$item->id}}
                        </div>
                        <div class="flex flex-col gap-3 text-slate-400 py-2 px-2 bg-slate-100 rounded-md hover:scale-95 duration-200">
                            <div class=" flex gap-1">
                                <div class="flex gap-1 flex-wrap">
                                    <div  class="text-xs py-1 px-2 bg-slate-800 rounded-md text-center text-slate-100">Reminder Date : {{$item->reminder_date}}</div>
                                </div>
                                <div class="flex gap-1 flex-wrap">
                                    <div  class="text-xs py-1 px-2 bg-slate-800 rounded-md text-center text-slate-100">Status :
                                        @if ($item->status==0)
                                            Waiting
                                        @elseif($item->status==1)
                                            Send
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class=" flex items-center gap-3 px-1">
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
                        nav:true,
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





        <div class="w-full  bg-slate-900 rounded-md p-3 ">
            <div class=" flex gap-3 items-center text-slate-300 p-2 text-xl my-1 ">
                {{-- <i class="fas fa-code-fork text-5xl p-2 bg-blue-800 rounded-xl"></i> --}}
                <div class=" flex flex-col md:flex-row w-full gap-2 justify-between">
                    <div class="flex items-center gap-2 font-semibold">
                        <span class=" rounded-md bg-blue-800 text-slate-200 px-4 py-2">{{$userTasksCount}} </span>
                       <span class="text-xl">My Tasks</span>
                    </div>
                    <div class="flex gap-3">
                            <a class="flex items-center gap-2 text-sm  bg-blue-800 text-slate-200 text-center rounded-md  py-2 px-4 transition-all duration-200 hover:scale-95 hover:bg-blue-900"
                        href="{{route('tasks.create')}}">
                        {{-- <i class="fas fa-code-fork text-xl"></i> --}}
                        Add New Task
                        </a>
                        <a class="flex items-center gap-2 text-sm  bg-blue-800 text-slate-200 text-center rounded-md  py-2 px-4 transition-all duration-200 hover:scale-95 hover:bg-blue-900"
                        href="{{route('tasks.index')}}">
                        {{-- <i class="fas fa-code-fork text-xl"></i> --}}
                        Show All Tasks
                        </a>
                    </div>
                </div>

            </div>
            <div class="h-1 my-2 bg-slate-600 rounded-md"></div>


            <div >

                <div  class="owl-carousel owl-tasks owl-theme">
                    @foreach ($userTasks as $task)
                    <div class="item bg-blue-900 rounded-md">
                        <div class="px-2 py-1 text-slate-200">
                            Task #{{$task->id}}
                        </div>
                        <div href="{{route('tasks.show',$task->id)}}" class=" flex flex-col  gap-2 text-white p-2 bg-white rounded-md hover:scale-95 duration-200
                            ">

                            <div class=" flex flex-col">
                               <div class="w-full flex gap-1">
                                   <div  class="w-full text-base text-slate-800  rounded-md font-semibold px-2">
                                       {{$task->title}}
                                   </div>
                               </div>
                           </div>

                           <div class="h-0.5 bg-slate-300"></div>



                           <div class=" flex flex-col gap-1">
                               <div class="flex justify-between gap-1">
                                   {{-- <div  class="text-xs py-1 px-2 bg-slate-800 rounded-md text-center">Task ID : #{{$task->id}}</div> --}}
                                   <div class="flex items-center gap-1">
                                       <div>
                                           @if ($task->priority==0)
                                           <a class="flex items-center justify-between gap-1 text-xl text-slate-800 bg-slate-300 py-1 px-2 rounded-md " title="Low Priority">
                                               <i class=" text-base fa-regular fa-star"></i>
                                               <div class="text-xs ">Low Priority</div>
                                           </a>
                                       @elseif ($task->priority==1)
                                           <a class="flex items-center justify-between gap-1 text-xl text-slate-200 bg-orange-700 py-1 px-2 rounded-md" title="Normal Priority">
                                               <div class="flex">
                                                   <i class=" text-base fa-solid fa-star-half-stroke"></i>
                                               </div>
                                               <div class="text-xs ">Normal Priority</div>
                                           </a>
                                       @elseif ($task->priority==2)
                                           <a class="flex items-center justify-between gap-1 text-xl text-slate-200 bg-red-900 py-1 px-2 rounded-md" title="High Priority">
                                               <div class="flex items-center">
                                                   <i class=" text-base fa-solid fa-star"></i>
                                               </div>
                                               <div class="text-xs">High Priority</div>
                                           </a>
                                       @endif
                                       </div>
                                       <div>
                                           @if ($task->status==2)
                                       <a class="flex items-center justify-between gap-1 text-slate-200 bg-emerald-800 py-1 px-2 rounded-md " title="Complete Tsask">
                                           <i class=" text-base fa-solid fa-circle-check"></i>
                                           <div class="text-xs ">Complete</div>
                                       </a>
                                       @elseif ($task->status==1)
                                       <a class="flex items-center justify-between gap-1 text-xl text-slate-200 bg-orange-700 py-1 px-2 rounded-md" title="Working Task">
                                           <i class=" text-base fa-solid fa-person-digging"></i>
                                           <div class="text-xs">Working</div>
                                       </a>
                                       @elseif ($task->status==0)
                                       <a class="flex items-center justify-between gap-1 text-xl text-gray-800 bg-slate-300 py-1 px-2 rounded-md " title="Nothing">
                                           <i class=" text-base fa-solid fa-circle-minus"></i>
                                           <div class="text-xs">Nothing</div>
                                       </a>
                                       @endif
                                       </div>
                                       <div  class="flex text-xs  py-1 px-2 bg-slate-800 rounded-md text-center">{{$task->created_at->diffForHumans()}}</div>
                                   </div>
                               </div>
                           </div>

                           {{-- <div class="h-0.5 bg-slate-300"></div> --}}


                           <div class=" flex flex-col gap-1">
                               <div class="flex justify-between gap-1">
                                   <div  class="text-xs py-1 px-2 bg-blue-800 rounded-md text-center ">Create By : {{$task->getCreator->name}}</div>
                                   <div class="flex gap-1">
                                       <div  class="text-xs py-1 px-2 bg-slate-800 rounded-md text-center"> {{$task->getType->name}}</div>
                                   </div>
                               </div>
                           </div>


                           {{-- <div class="h-0.5 bg-slate-300"></div> --}}


                           <div class="flex flex-col gap-1">
                               <div class="text-slate-800 text-xs font-semibold">Task Teams : </div>

                               <div class="flex flex-wrap gap-1 items-center">
                                   @foreach ($task->getTeams->sortByDesc('status') as $team)

                                   <span class="max-w-max flex items-center gap-1  py-1 px-2 rounded-md text-xs
                                       @if ($team->status==1)
                                               bg-orange-700 text-slate-100
                                       @else
                                           bg-slate-300 text-slate-800
                                       @endif "
                                   >
                                           @if ($team->status==1)
                                               <i class="fa-solid fa-running text-sm"></i>
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
                               <a class="text-sm block text-center w-full bg-slate-800 py-2 px-4 rounded-md hover:bg-slate-900" href="{{route('tasks.show',$task->id)}}">Show Task Details</a>
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


        <div class="w-full  bg-slate-900 rounded-md p-3">
            <div class="flex gap-3 items-center text-slate-300 p-2 text-xl my-1 ">
                {{-- <i class="fa-solid fa-code-pull-request text-5xl p-2 bg-orange-600 rounded-xl"></i> --}}
                <div class="flex flex-col md:flex-row w-full gap-2 justify-between">
                    <div class="flex items-center gap-2 font-semibold">
                        <span class=" rounded-md bg-orange-800 text-slate-200 px-4 py-2">{{$userActivitiesCount}} </span>
                        <span> My Activities ToDo</span>
                    </div>
                    <div class="flex gap-3">
                        <a class="flex gap-2 items-center text-sm bg-orange-800 text-slate-200 text-center rounded-md hover:scale-95 py-2 px-4 transition-all duration-200 hover:bg-orange-900"
                        href="{{route('activities.create')}}">
                        {{-- <i class="fa-solid fa-code-pull-request text-xl"></i> --}}
                        Add New Activity
                    </a>
                    <a class="flex gap-2 items-center text-sm bg-orange-800 hover:bg-orange-900 text-slate-200 text-center rounded-md hover:scale-95 py-2 px-4 transition-all duration-200"
                    href="{{route('activities.index')}}">
                    {{-- <i class="fa-solid fa-code-pull-request text-xl"></i> --}}
                    Show All Activities
                    </a>
                    </div>
                </div>
            </div>
            <div class="h-1 my-2 bg-slate-600 rounded-md"></div>
            <div class="owl-carousel owl2 owl-theme">
                    @foreach ($userActivities as $item)
                    <div class="item bg-orange-800 rounded-md">
                        <div class="px-2 py-1 text-slate-200">
                            Activity #{{$item->id}}
                        </div>
                        <div  class=" flex flex-col gap-2 text-slate-100 p-2 bg-slate-100 rounded-md
                              hover:scale-95 transition-all duration-200">







                             <div class=" flex items-center gap-3 px-3">
                                 <div class="text-sm font-semibold text-slate-800">
                                    @if (!is_null($item->description))
                                        {{$item->description}}
                                    @else
                                        No Subject
                                    @endif

                                 </div>
                             </div>


                             <div class="h-0.5 bg-slate-300 rounded-md"></div>


                            <div class=" flex flex-col gap-1">
                                <div class="flex gap-1 justify-between">
                                    <div  class="text-xs py-1 px-2 bg-slate-800 rounded-md text-center">For Task ID : #{{$item->getTask->id}}</div>

                                    <div  class="text-xs  py-1 px-2 bg-slate-800 rounded-md text-center">{{$item->created_at->diffForHumans()}}</div>
                                </div>
                            </div>

                            <div class="w-full flex gap-1 justify-between">
                                <div  class="text-xs py-1 px-2 bg-blue-800 rounded-md text-center">Send By : {{$item->getSender->name}}</div>
                                <div class="flex items-center justify-center  gap-2">

                                    @if ($item->status==2)
                                        <a class="flex items-center gap-1 bg-emerald-800 text-slate-200 py-1 px-2 rounded-md">
                                            <i class="text-lg fa-solid fa-circle-check"></i>
                                            <div class="text-xs">Complete</div>
                                        </a>
                                    @elseif ($item->status==1)
                                        <a class="flex items-center gap-1 text-xl bg-orange-700 text-slate-200 py-1 px-2 rounded-md">
                                            <i class=" text-lg fa-solid fa-person-digging"></i>
                                            <div class="text-xs">Working</div>
                                        </a>
                                    @elseif ($item->status==0)
                                        <a class="flex items-center gap-1 text-xl bg-slate-300 text-slate-800 py-1 px-2 rounded-md">
                                            <i class=" text-base fa-solid fa-circle-minus"></i>
                                            <div class="text-xs ">Not Seen</div>
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <div class="h-0.5 bg-slate-300 rounded-md"></div>


                            <div class="w-full flex justify-between gap-3">
                                <a href="{{route('activities.show',$item->id)}}"
                                     class="w-2/3 text-center text-sm p-2 rounded-md bg-slate-800 text-slate-200  hover:bg-slate-900">Show Activity Details</a>
                                <a href="{{route('activities.reply',$item->id)}}"
                                     class="w-1/3 text-center text-sm p-2 rounded-md bg-blue-800 text-slate-200 hover:bg-blue-900">Reply</a>
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
