<div>
    <div class="container p-2 mx-auto rounded-md bg-slate-900/80">







        <div class="flex items-center justify-between p-2 my-3 rounded-md bg-slate-800">
            <div class="flex items-center gap-3 text-center text-white ">
                <div class="flex items-center justify-center">
                  <img class="w-16" src="http://127.0.0.1:8000/images/cpnis-logo.png" alt="">
                </div>
                <i class="text-4xl fa-solid fa-code-fork "></i>
                <h2 class="text-3xl font-semibold">Tasks Managment</h2>
            </div>
            <div>
                @if (Auth::user()->role!=0)
                    <a href="{{route('tasks.types.index')}}"
                        class="flex items-center gap-2 px-4 py-2 text-lg font-semibold transition-all duration-200 rounded-md bg-slate-300 text-slate-900 hover:scale-95 "
                        >
                        <i class="text-2xl fas fa-plus"></i>
                        <span>Task Types</span>
                    </a>
                @endif
            </div>
        </div>


        @if (auth()->user()->role != 0)
            <div  class="grid w-full grid-cols-1 gap-3 p-3 my-5 rounded-md md:grid-cols-5 bg-slate-600">
                @foreach ($users as $user)
                    <div class="flex flex-col items-center justify-between gap-1 text-slate-200 bg-slate-900 rounded-md py-1.5 px-2 cursor-pointer"
                     wire:click="filterByUser({{$user->id}})">
                        <div class="flex flex-col items-center ">
                            <div class="text-lg font-semibold uppercase">{{$user->name}}</div>
                            <div class="text-xs text-slate-500">
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
                            <div class="text-xs text-slate-500">{{$user->email}}</div>
                        </div>
                        <div class="w-full h-0.5 bg-slate-600"></div>
                        <div class="flex justify-between w-full">

                            <div class="flex items-center gap-3 font-semibold text-xl bg-slate-800 rounded-md px-2
                                @if (count($user->getTeams))
                                bg-orange-800
                                @else
                                bg-blue-800
                                @endif " >
                                    <div class="text-base">{{count($user->getTeams)}} </div>
                                    <div class="text-xs text-slate-300">Tasks</div>
                            </div>

                            <div class="flex items-center gap-3 font-semibold text-xl  rounded-md px-2
                                @if (count($user->getWorkingActivities->where('status' ,'!=',2)))
                                bg-orange-800
                                @else
                                bg-blue-800
                                @endif " >
                                    <div class="text-base">{{count($user->getWorkingActivities->where('status' ,'!=',2))}} </div>
                                    <div class="text-xs text-slate-300">Avtivity</div>
                            </div>


                        </div>
                    </div>
                @endforeach
            </div>
        @endif




        <div class="p-3 rounded-md shadow bg-slate-600">

            <div class="" x-data="{'open':false}">


                <div class="my-5 ">

                    <div class="flex flex-col justify-between gap-4 md:flex-row">



                        <div class="flex items-center gap-3">
                            <div  class="flex flex-wrap items-center gap-3">
                                <div class="flex flex-col items-center px-4 py-2 font-bold text-orange-600 transition-all duration-200 rounded-md cursor-pointer bg-slate-900 ">
                                    <div class="text-sm font-normal">
                                        Total Tasks
                                    </div>
                                    <div class="text-3xl text-slate-300">
                                        <span>{{count($tasks)}}</span>
                                        <span class="text-xl">/</span>
                                        <span>{{$tasksCount}}</span>
                                    </div>
                                </div>
                                <a wire:click="filter()" class="px-4 py-2 text-lg font-semibold transition-all duration-200 rounded-md cursor-pointer bg-slate-300 text-slate-800 hover:scale-95">
                                    <i class="text-2xl fas fa-code-fork"></i>
                                    <span>All</span>
                                </a>
                                <a @click="open=!open" class="px-4 py-2 text-lg font-semibold transition-all duration-200 rounded-md cursor-pointer bg-slate-300 text-slate-800 hover:scale-95">
                                    <i class="text-2xl fas fa-filter rounded-xl"></i>
                                    <span> Filters</span>
                                </a>
                                <a class="px-4 py-2 text-lg font-semibold transition-all duration-200 rounded-md bg-slate-900 text-slate-300 hover:scale-95"
                                href="{{route('tasks.index')}}">
                                <i class="text-2xl fas fa-refresh"></i>
                                <span> Refresh</span>
                               </a>
                               <div class="relative">
                                    <input type="text" name="search_text" wire:model="search_text"
                                    class="block w-48 px-4 py-2 pl-12 m-0 text-base font-normal transition ease-in-out border-2 border-gray-800 border-solid rounded-md md:w-80 form-control text-slate-300 bg-slate-900 bg-clip-padding" placeholder=" ID , Title">
                                    <i class="absolute px-2 text-2xl fas fa-search top-3 left-2 text-slate-400"></i>
                                </div>
                            </div>

                        </div>

                        <div class="flex items-center gap-3">


                            <a href="{{route('tasks.create')}}"
                                class="flex items-center gap-2 px-4 py-2 text-lg font-semibold transition-all duration-200 rounded-md bg-slate-300 text-slate-900 hover:scale-95 "
                                >
                                <i class="text-2xl fas fa-plus"></i>
                                <span>Create New Task</span>
                            </a>
                        </div>


                    </div>

                    <div x-show="open" class="flex flex-wrap gap-3 my-3" x-transition>

                        <div class="flex flex-col gap-3 p-2 bg-slate-700 rounded-xl ">
                            <a class="flex items-center justify-between gap-3 p-2 text-base font-semibold leading-tight transition-all duration-200 cursor-pointer bg-slate-900 text-slate-300 rounded-xl hover:scale-95"
                             wire:click="filter('lock',0)">
                                <i class="p-2 text-2xl fa-solid fa-lock-open rounded-xl bg-slate-800 "></i>
                                <span class="">  Open </span>
                                <span class="text-2xl">  {{count($totalTasks->where('lock',0))}}</span>
                           </a>
                           <a class="flex items-center justify-between gap-3 p-2 text-base font-semibold leading-tight transition-all duration-200 cursor-pointer bg-slate-900 text-slate-300 rounded-xl hover:scale-95"
                             wire:click="filter('lock',1)">
                                <i class="p-3 text-2xl fa-solid fa-lock rounded-xl bg-slate-800 "></i>
                                <span>  Lock </span>
                                <span class="text-2xl">  {{count($totalTasks->where('lock',1))}}</span>
                           </a>
                        </div>

                        <div class="flex flex-col gap-3 p-2 bg-slate-700 rounded-xl ">
                            <a class="flex items-center justify-between gap-3 p-2 text-base font-semibold leading-tight transition-all duration-200 cursor-pointer bg-slate-900 text-slate-300 rounded-xl hover:scale-95"
                            wire:click="filter('status',0)">
                               <i class="p-2 text-2xl fa-solid fa-circle-minus rounded-xl bg-slate-800 "></i>
                               <span>  Nothing </span>
                               <span class="text-2xl">  {{count($totalTasks->where('status',0))}}</span>
                          </a>
                           <a class="flex items-center justify-between gap-3 p-2 text-base font-semibold leading-tight transition-all duration-200 cursor-pointer bg-slate-900 text-slate-300 rounded-xl hover:scale-95"
                             wire:click="filter('status',1)">
                                <i class="p-2 text-2xl fa-solid fa-circle-half-stroke rounded-xl bg-slate-800 "></i>
                                <span>  Working </span>
                                <span class="text-2xl">  {{count($totalTasks->where('status',1))}}</span>
                           </a>
                           <a class="flex items-center justify-between gap-3 p-2 text-base font-semibold leading-tight transition-all duration-200 cursor-pointer bg-slate-900 text-slate-300 rounded-xl hover:scale-95"
                           wire:click="filter('status',2)">
                              <i class="p-2 text-2xl fa-solid fa-circle-check rounded-xl bg-slate-800 "></i>
                              <span>  Complete </span>
                              <span class="text-2xl">  {{count($totalTasks->where('status',2))}}</span>
                         </a>
                        </div>


                        <div class="flex flex-col gap-3 p-2 bg-slate-700 rounded-xl ">
                            <a class="flex items-center justify-between gap-3 p-2 text-base font-semibold leading-tight transition-all duration-200 cursor-pointer bg-slate-900 text-slate-300 rounded-xl hover:scale-95"
                             wire:click="filter('priority',0)">
                                <i class="p-2 text-2xl fa-regular fa-star rounded-xl bg-slate-800 "></i>
                                <span class="">  Low</span>
                                <span class="text-2xl">  {{count($totalTasks->where('priority',0))}}</span>
                           </a>
                           <a class="flex items-center justify-between gap-3 p-2 text-base font-semibold leading-tight transition-all duration-200 cursor-pointer bg-slate-900 text-slate-300 rounded-xl hover:scale-95"
                             wire:click="filter('priority',1)">
                                <div class="p-2 text-2xl rounded-xl bg-slate-800">
                                    <i class="fa-solid fa-star-half-stroke"></i>
                                </div>
                                <span>  Normal </span>
                                <span class="text-2xl">  {{count($totalTasks->where('priority',1))}}</span>
                           </a>
                           <a class="flex items-center justify-between gap-3 p-2 text-base font-semibold leading-tight transition-all duration-200 cursor-pointer bg-slate-900 text-slate-300 rounded-xl hover:scale-95"
                           wire:click="filter('priority',2)">
                           <div class="p-2 text-2xl rounded-xl bg-slate-800">
                                <i class="fa-solid fa-star "></i>
                            </div>
                              <span>  High </span>
                              <span class="text-2xl">  {{count($totalTasks->where('priority',2))}}</span>
                         </a>
                        </div>


                    </div>


                </div>
            </div>








            <div class="relative">
                <div class="absolute bg-gray-800 rounded-full top-10 left-1/2" wire:loading>
                    <div class="flex items-center justify-end p-2">
                        <div class="w-12 h-12 text-gray-100 border-8 rounded-full spinner-border animate-spin" role="status">
                        </div>
                    </div>
                </div>
                <div class="flex flex-col overflow-auto" wire:loading.class="opacity-30">
                    <div class="">
                      <div class="w-full py-2">
                        <div class="">
                          <table class="w-full overflow-hidden rounded-md ">
                            <thead class="p-2 border-b bg-slate-900 ">
                              <tr class="">
                                <th scope="col" class="px-6 py-6 text-base font-medium text-left text-gray-100 cursor-pointer hover:text-gray-400" wire:click="sortByFeields('id')">
                                    {{-- <i class="fa-solid fa-sort"></i> --}}
                                     ID
                                </th>
                                <th scope="col" class="px-6 py-6 text-base font-medium text-left text-gray-100 cursor-pointer hover:text-gray-400" wire:click="sortByFeields('type_id')">
                                    {{-- <i class="fa-solid fa-sort"></i> --}}
                                      Type
                                </th>
                                <th scope="col" class="px-6 py-6 text-base font-medium text-left text-gray-100 cursor-pointer hover:text-gray-400" wire:click="sortByFeields('title')">
                                    {{-- <i class="fa-solid fa-sort"></i> --}}
                                     Title
                                </th>

                                <th scope="col" class="px-6 py-6 text-base font-medium text-left text-gray-100 cursor-pointer hover:text-gray-400" wire:click="sortByFeields('creator_id')">
                                    {{-- <i class="fa-solid fa-sort"></i> --}}
                                     Task Status
                                </th>



                                  <th scope="col" class="px-6 py-6 text-base font-medium text-left text-gray-100 cursor-pointer hover:text-gray-400" wire:click="sortByFeields('updated_at')">
                                    <i class="fa-solid fa-sort"></i>
                                    Date
                                  </th>




                                <th scope="col" class="px-6 py-4 text-base font-medium text-left text-gray-100">

                                </th>
                              </tr>
                            </thead>
                            <tbody class="">
                                @foreach ($tasklist as $item)
                                <tr class="bg-slate-200 border-b-[8px] border-t-[8px] border-slate-300 transition duration-300 hover:bg-slate-800">

                                    <td class="px-2 py-6 text-sm text-gray-900 whitespace-nowrap">
                                        <span class="block w-12 px-3 py-2 text-sm font-semibold text-center rounded-md text-slate-200 bg-slate-900">
                                        {{$item->id}}
                                        </span>
                                    </td>


                                    <td class="px-2 py-4 text-sm ">
                                        <span  class="block w-24 px-2 py-1 text-xs font-semibold text-center rounded-md bg-slate-300">
                                            {{$item->getType->name}}
                                        </span>
                                    </td>

                                    <td class="px-2 py-4 text-sm ">
                                        <span  class="block w-40 px-2 py-1 text-xs font-semibold text-center rounded-md bg-slate-300">
                                            {{$item->title}}
                                        </span>
                                    </td>




                                    <td class="px-2 py-4 text-sm text-gray-900 ">
                                        {{-- <div class="flex flex-col gap-2 ">
                                            <span  class="flex items-center justify-center w-full gap-2 px-3 py-2 text-center rounded-md text-slate-900 bg-slate-300">
                                                <i class="text-xl fa-solid fa-user-tie"></i>
                                                <span>{{$item->getCreator->name}}</span>
                                            </span>
                                            <span  class="flex items-center justify-center w-full gap-2 px-3 py-2 text-center bg-blue-300 rounded-md text-slate-900">
                                                <i class="text-xl fas fa-running"></i>
                                                {{$item->getWorker->name}}
                                            </span>
                                        </div> --}}
                                        <div class="flex flex-col w-64 gap-1">

                                            <div class="flex gap-1">

                                                <a href="{{route('activities.index',['task_id' =>$item->id])}}"
                                                    class="flex items-center justify-center gap-2 px-2 py-1 text-xs font-semibold rounded-md max-w-max bg-emerald-800 text-slate-200">
                                                   <span>
                                                   {{$item->getActivities()->where('status',2)->count()}}
                                                   </span>
                                                   <span>Complete</span>
                                               </a>

                                               <a href="{{route('activities.index',['task_id' =>$item->id])}}"
                                                    class="flex items-center justify-center gap-2 px-2 py-1 text-xs font-semibold bg-orange-700 rounded-md max-w-max text-slate-200">
                                                    <span>
                                                    {{$item->getActivities()->where('status',1)->count()}}
                                                    </span>
                                                    <span>Working</span>
                                                </a>

                                                <a href="{{route('activities.index',['task_id' =>$item->id])}}"
                                                    class="flex items-center justify-center gap-2 px-2 py-1 text-xs font-semibold rounded-md max-w-max bg-slate-900 text-slate-200">
                                                    <span>
                                                    {{$item->getActivities()->where('status',0)->count()}}
                                                    </span>
                                                    <span>NotSeen</span>
                                                </a>

                                            </div>


                                            <div class="h-1 bg-slate-300"></div>



                                            <div class="flex flex-wrap items-center gap-1">

                                                <div>
                                                    <span class="flex items-center gap-1 px-2 py-1 text-xs bg-blue-900 rounded-md max-w-max text-slate-200">
                                                        <i class="text-sm fa-solid fa-user-tie"></i>
                                                        <span class="font-semibold">{{$item->getCreator->name}}</span>
                                                    </span>
                                                </div>
                                                <span> | </span>

                                                @foreach ($item->getTeams->sortByDesc('status') as $team)

                                                    <span class="max-w-max flex items-center gap-1  py-1 px-2 rounded-md text-xs
                                                        @if ($team->status==1)
                                                                bg-orange-700 text-slate-200
                                                        @else
                                                            bg-slate-300
                                                        @endif "
                                                    >
                                                            @if ($team->status==1)
                                                                <i class="text-sm fa-solid fa-running"></i>
                                                                {{-- <span>Worker : </span> --}}
                                                            @endif
                                                            <span class="font-semibold">
                                                                {{$team->getUser->name}} :
                                                                {{count($team->getUser->getWorkingActivities->where('task_id',$team->task_id)->where('status' ,'!=',2))}}</span>
                                                    </span>
                                                @endforeach

                                            </div>
                                        </div>
                                    </td>




                                    <td class="px-2 py-4 text-sm text-gray-900">
                                        <div class="flex flex-col w-32 gap-2">
                                            <span  class="flex items-center justify-center gap-2 px-2 py-1 text-xs font-semibold text-center rounded-md bg-slate-900 text-slate-200">
                                                {{-- <i class="text-base fas fa-plus-circle"></i> --}}
                                                 {{$item->created_at}}
                                            </span>
                                            <span  class="flex items-center justify-center gap-2 px-2 py-1 text-xs font-semibold text-center bg-orange-700 rounded-md text-slate-200">
                                                {{-- <i class="text-base fa-solid fa-arrows-rotate"></i> --}}
                                                {{$item->updated_at}}
                                            </span>
                                        </div>



                                    </td>








                                    <td class="px-2 py-2 text-xs text-gray-200">
                                        <div class="flex justify-end w-full gap-2 items-centert">


                                            <div class="w-1 rounded bg-slate-300"></div>



                                            <div class="flex flex-col items-center w-32 gap-1">


                                                @if ($item->lock==0)
                                                <a class="flex items-center justify-between w-full gap-1 px-2 py-1 rounded-md text-slate-200 bg-emerald-800" title="Task is Open">
                                                    <i class="text-base fa-solid fa-lock-open"></i>
                                                    <div class="text-xs font-semibold">Open Task</div>
                                                </a>
                                                @elseif ($item->lock==1)
                                                    <a class="flex items-center justify-between w-full gap-1 px-2 py-1 text-xl bg-red-800 rounded-md text-slate-200" title="Task is Locked">
                                                        <i class="text-base fa-solid fa-lock"></i>
                                                        <div class="text-xs font-semibold">Lock Task</div>
                                                    </a>
                                                @endif



                                                @if ($item->priority==0)
                                                    <a class="flex items-center justify-between w-full gap-1 px-2 py-1 text-xl rounded-md text-slate-800 bg-slate-300 " title="Low Priority">
                                                        <i class="text-base fa-regular fa-star"></i>
                                                        <div class="text-xs font-semibold">Low Priority</div>
                                                    </a>
                                                @elseif ($item->priority==1)
                                                    <a class="flex items-center justify-between w-full gap-1 px-2 py-1 text-xl bg-orange-700 rounded-md text-slate-200" title="Normal Priority">
                                                        <div class="flex">
                                                            <i class="text-base fa-solid fa-star-half-stroke"></i>
                                                        </div>
                                                        <div class="text-xs font-semibold">Normal Priority</div>
                                                    </a>
                                                @elseif ($item->priority==2)
                                                    <a class="flex items-center justify-between w-full gap-1 px-2 py-1 text-xl bg-red-900 rounded-md text-slate-200" title="High Priority">
                                                        <div class="flex items-center">
                                                            <i class="text-base fa-solid fa-star"></i>
                                                        </div>
                                                        <div class="text-xs font-semibold">High Priority</div>
                                                    </a>
                                                @endif






                                                @if ($item->status==2)
                                                    <a class="flex items-center justify-between w-full gap-1 px-2 py-1 rounded-md text-slate-200 bg-emerald-800 " title="Complete Tsask">
                                                        <i class="text-base fa-solid fa-circle-check"></i>
                                                        <div class="text-xs font-semibold">Complete</div>
                                                    </a>
                                                @elseif ($item->status==1)
                                                    <a class="flex items-center justify-between w-full gap-1 px-2 py-1 text-xl bg-orange-700 rounded-md text-slate-200" title="Working Task">
                                                        <i class="text-base fa-solid fa-person-digging"></i>
                                                        <div class="text-xs font-semibold">Working</div>
                                                    </a>
                                                @elseif ($item->status==0)
                                                    <a class="flex items-center justify-between w-full gap-1 px-2 py-1 text-xl text-gray-800 rounded-md bg-slate-300 " title="Nothing">
                                                        <i class="text-base fa-solid fa-circle-minus"></i>
                                                        <div class="text-xs font-semibold">Nothing</div>
                                                    </a>
                                                @endif



                                            </div>



                                            <div class="w-1 rounded bg-slate-300"></div>

                                            <div class="flex flex-col w-64 gap-1">

                                                <div class="grid  gap-2
                                                @if (Auth::user()->role!=0)
                                                grid-cols-3
                                                @else
                                                grid-cols-1
                                                @endif
                                                 ">
                                                    <a class="flex items-center justify-center gap-1 p-2 text-xl transition rounded-md bg-slate-900 text-slate-100 hover:scale-95"
                                                    href="{{route('tasks.show',$item->id)}}">
                                                        <i class="text-base fa-solid fa-eye"></i>
                                                        <div class="text-sm">Show</div>
                                                    </a>
                                                    @if (Auth::user()->role!=0)
                                                        <a class="flex items-center gap-1 p-2 text-xl transition bg-orange-700 rounded-md cursor-pointer text-slate-100 hover:scale-95"
                                                        href="{{route('tasks.edit',$item->id)}}">
                                                            <i class="text-base fa-solid fa-pen-to-square"></i>
                                                            <div class="text-sm">Update</div>
                                                        </a>
                                                        <div x-data="{modal:false}">
                                                            <a @click="modal=true"
                                                              class="flex items-center w-full gap-1 p-2 text-xl transition bg-red-900 rounded-md cursor-pointer text-slate-100 hover:scale-95">
                                                                <i class="text-base fa-solid fa-trash-can"></i>
                                                                <div class="text-sm">Delete</div>
                                                            </a>
                                                            <div x-show="modal"  class="absolute top-0 left-0 flex items-center justify-center w-full h-full bg-gray-900/80">
                                                                <div class="p-2 bg-white rounded-md" @click.away="modal = false">
                                                                    <div class="p-2 text-lg font-bold text-slate-900">Are You Sure To Delete ?</div>
                                                                    <div class="flex justify-center gap-8">
                                                                        <form action="{{route('tasks.delete',$item->id)}}" method="post">
                                                                            @csrf
                                                                            @method('delete')
                                                                            <button type="submit"
                                                                            class="flex items-center w-full gap-1 px-4 py-2 text-xl transition bg-red-900 rounded-md text-slate-100 hover:scale-95">
                                                                                {{-- <i class="text-base fa-solid fa-trash-can"></i> --}}
                                                                                <div class="text-sm">yes</div>
                                                                            </button>
                                                                        </form>
                                                                        <a @click="modal=false"
                                                                            class="flex items-center gap-1 px-4 py-2 text-xl transition bg-red-900 rounded-md cursor-pointer text-slate-100 hover:scale-95">
                                                                                {{-- <i class="text-base fa-solid fa-trash-can"></i> --}}
                                                                                <div class="text-sm">No</div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    @endif


                                                </div>


                                                <div class="w-full h-1 rounded bg-slate-300"></div>

                                                <div class="grid grid-cols-1 gap-2">

{{--
                                                    <a href="{{route('activities.index',['task_id' =>$item->id])}}"
                                                        class="flex items-center justify-center w-full gap-1 p-2 transition bg-blue-800 rounded-md text-slate-100 hover:scale-95">
                                                        <div class="text-sm"> Activities  : {{$item->getActivities()->count()}}</div>
                                                    </a> --}}

                                                    @if ($item->lock == 0)
                                                    <a href="{{route('activities.create',['task_id' =>$item->id])}}"
                                                        class="flex items-center justify-center w-full gap-1 p-2 transition bg-blue-800 rounded-md text-slate-100 hover:scale-95">
                                                        <div class="text-sm"> Create New Activity</div>
                                                    </a>
                                                    @endif

                                                    {{-- <div class="flex items-center justify-center w-full gap-1 p-2 bg-blue-900 text-slate-100 rounded-xl">
                                                        <span class="text-sm ">Count : {{$item->getActivities()->count()}}</span>
                                                    </div> --}}
                                                </div>



                                            </div>






                                        </div>
                                    </td>

                                  </tr>
                                @endforeach

                            </tbody>
                          </table>

                          @if ($tasklist->total()>$perPage)
                            <div class="flex items-center justify-center w-full gap-3 p-3 my-3">
                                <div wire:click="showMore()" class="flex items-center justify-center gap-1 px-6 py-2 text-xl font-medium text-white bg-orange-600 shadow-md cursor-pointer rounded-xl hover:bg-orange-700 hover:shadow-lg">
                                    <div>
                                        Show More
                                    </div>
                                    <div class="text-base text-gray-300">
                                        ( {{$tasklist->lastItem()}} of {{$tasklist->total()}} )
                                    </div>

                                </div>

                            </div>
                          @endif


                          {{-- {{ $tasklist->links() }} --}}


                        </div>
                      </div>
                    </div>
                  </div>
            </div>











        </div>
    </div>
</div>
