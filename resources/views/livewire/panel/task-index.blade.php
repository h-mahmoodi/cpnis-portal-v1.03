<div>
    <div class="container mx-auto bg-slate-900/80 p-2 rounded-md">





        <div class="my-3 flex justify-between items-center bg-slate-800 p-2 rounded-md">
            <div class="text-center text-white flex items-center gap-3 ">
                <div class="flex items-center justify-center">
                  <img class="w-16" src="http://127.0.0.1:8000/images/cpnis-logo.png" alt="">
                </div>
                <i class="fa-solid fa-code-fork text-4xl "></i>
                <h2 class="text-3xl font-semibold">Tasks Managment</h2>
            </div>
            <div>
                @if (Auth::user()->role!=0)
                    <a href="{{route('tasks.types.index')}}"
                        class="flex items-center gap-2 px-4 py-2 text-lg font-semibold transition-all duration-200 bg-slate-300 text-slate-900 rounded-md hover:scale-95 "
                        >
                        <i class="fas fa-plus text-2xl"></i>
                        <span>Task Types</span>
                    </a>
                @endif
            </div>
        </div>


        @if (auth()->user()->role != 0)
            <div  class="w-full grid grid-cols-1 md:grid-cols-5 gap-3 bg-slate-600 p-3 rounded-md my-5">
                @foreach ($users as $user)
                    <div class="flex flex-col items-center justify-between gap-1 text-slate-200 bg-slate-900 rounded-md py-1.5 px-2 cursor-pointer"
                     wire:click="filterByUser({{$user->id}})">
                        <div class="flex flex-col items-center ">
                            <div class="text-lg font-semibold uppercase">{{$user->name}}</div>
                            <div class="text-xs text-slate-500">{{$user->role}}</div>
                            <div class="text-xs text-slate-500">{{$user->email}}</div>
                        </div>
                        <div class="w-full h-0.5 bg-slate-600"></div>
                        <div class="w-full flex justify-between">

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




        <div class="p-3 shadow bg-slate-600 rounded-md">

            <div class="" x-data="{'open':false}">


                <div class="my-5 ">

                    <div class="flex flex-col md:flex-row justify-between gap-4">



                        <div class="flex items-center gap-3">
                            <div  class="flex flex-wrap items-center gap-3">
                                <div class="flex flex-col items-center px-4 py-2 font-bold transition-all duration-200 cursor-pointer bg-slate-900 text-orange-600 rounded-md ">
                                    <div class="text-sm font-normal">
                                        Total Tasks
                                    </div>
                                    <div class="text-3xl text-slate-300">
                                        <span>{{count($tasks)}}</span>
                                        <span class="text-xl">/</span>
                                        <span>{{$tasksCount}}</span>
                                    </div>
                                </div>
                                <a wire:click="filter()" class="px-4 py-2 text-lg font-semibold transition-all duration-200 cursor-pointer bg-slate-300 text-slate-800 rounded-md hover:scale-95">
                                    <i class="fas fa-code-fork text-2xl"></i>
                                    <span>All</span>
                                </a>
                                <a @click="open=!open" class="px-4 py-2 text-lg font-semibold  transition-all duration-200 cursor-pointer bg-slate-300 text-slate-800 rounded-md hover:scale-95">
                                    <i class=" text-2xl fas fa-filter rounded-xl "></i>
                                    <span> Filters</span>
                                </a>
                                <a class=" px-4 py-2 text-lg font-semibold transition-all duration-200 bg-slate-900 text-slate-300 rounded-md hover:scale-95 "
                                href="{{route('tasks.index')}}">
                                <i class="text-2xl fas fa-refresh"></i>
                                <span> Refresh</span>
                               </a>
                               <div class="relative">
                                    <input type="text" name="search_text" wire:model="search_text"
                                    class="block pl-12 w-48 md:w-80 px-4 py-2  m-0 text-base font-normal transition ease-in-out border-2 border-gray-800
                                     border-solid form-control text-slate-300 bg-slate-900 bg-clip-padding rounded-md" placeholder=" ID , Title">
                                    <i class="absolute px-2 text-2xl fas fa-search top-3 left-2 text-slate-400"></i>
                                </div>
                            </div>

                        </div>

                        <div class="flex items-center gap-3">


                            <a href="{{route('tasks.create')}}"
                                class="flex items-center gap-2 px-4 py-2 text-lg font-semibold transition-all duration-200 bg-slate-300 text-slate-900 rounded-md hover:scale-95 "
                                >
                                <i class="fas fa-plus text-2xl"></i>
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
                           <a class="flex items-center justify-between gap-3 p-2  text-base font-semibold leading-tight transition-all duration-200 cursor-pointer bg-slate-900 text-slate-300 rounded-xl hover:scale-95"
                             wire:click="filter('lock',1)">
                                <i class="p-3 text-2xl fa-solid fa-lock rounded-xl bg-slate-800 "></i>
                                <span>  Lock </span>
                                <span class="text-2xl">  {{count($totalTasks->where('lock',1))}}</span>
                           </a>
                        </div>

                        <div class="flex flex-col gap-3 p-2 bg-slate-700 rounded-xl ">
                            <a class="flex items-center justify-between gap-3 p-2  text-base font-semibold leading-tight transition-all duration-200 cursor-pointer bg-slate-900 text-slate-300 rounded-xl hover:scale-95"
                            wire:click="filter('status',0)">
                               <i class="p-2 text-2xl fa-solid fa-circle-minus rounded-xl bg-slate-800 "></i>
                               <span>  Nothing </span>
                               <span class="text-2xl">  {{count($totalTasks->where('status',0))}}</span>
                          </a>
                           <a class="flex items-center justify-between gap-3 p-2  text-base font-semibold leading-tight transition-all duration-200 cursor-pointer bg-slate-900 text-slate-300 rounded-xl hover:scale-95"
                             wire:click="filter('status',1)">
                                <i class="p-2 text-2xl fa-solid fa-circle-half-stroke rounded-xl bg-slate-800 "></i>
                                <span>  Working </span>
                                <span class="text-2xl">  {{count($totalTasks->where('status',1))}}</span>
                           </a>
                           <a class="flex items-center justify-between gap-3 p-2  text-base font-semibold leading-tight transition-all duration-200 cursor-pointer bg-slate-900 text-slate-300 rounded-xl hover:scale-95"
                           wire:click="filter('status',2)">
                              <i class="p-2 text-2xl fa-solid fa-circle-check rounded-xl bg-slate-800 "></i>
                              <span>  Complete </span>
                              <span class="text-2xl">  {{count($totalTasks->where('status',2))}}</span>
                         </a>
                        </div>


                        <div class="flex flex-col gap-3 p-2 bg-slate-700 rounded-xl ">
                            <a class="flex items-center justify-between gap-3 p-2  text-base font-semibold leading-tight transition-all duration-200 cursor-pointer bg-slate-900 text-slate-300 rounded-xl hover:scale-95"
                             wire:click="filter('priority',0)">
                                <i class="p-2 text-2xl fa-regular fa-star rounded-xl bg-slate-800 "></i>
                                <span class="">  Low</span>
                                <span class="text-2xl">  {{count($totalTasks->where('priority',0))}}</span>
                           </a>
                           <a class="flex items-center justify-between gap-3 p-2  text-base font-semibold leading-tight transition-all duration-200 cursor-pointer bg-slate-900 text-slate-300 rounded-xl hover:scale-95"
                             wire:click="filter('priority',1)">
                                <div class="p-2 text-2xl rounded-xl bg-slate-800">
                                    <i class="fa-solid fa-star-half-stroke"></i>
                                </div>
                                <span>  Normal </span>
                                <span class="text-2xl">  {{count($totalTasks->where('priority',1))}}</span>
                           </a>
                           <a class="flex items-center justify-between gap-3 p-2  text-base font-semibold leading-tight transition-all duration-200 cursor-pointer bg-slate-900 text-slate-300 rounded-xl hover:scale-95"
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
                    <div class=" ">
                      <div class="w-full py-2">
                        <div class="">
                          <table class=" w-full rounded-md overflow-hidden">
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

                                    <td class=" px-2 py-6 text-sm text-gray-900 whitespace-nowrap">
                                        <span class="w-12 px-3 py-2 text-slate-200 bg-slate-900 rounded-md text-center text-sm font-semibold block">
                                        {{$item->id}}
                                        </span>
                                    </td>


                                    <td class="px-2 py-4 text-sm ">
                                        <span  class="w-24 px-2 py-1  bg-slate-300 rounded-md block text-center font-semibold text-xs">
                                            {{$item->getType->name}}
                                        </span>
                                    </td>

                                    <td class="px-2 py-4 text-sm ">
                                        <span  class="w-40 px-2 py-1 bg-slate-300 rounded-md block text-center font-semibold text-xs">
                                            {{$item->title}}
                                        </span>
                                    </td>




                                    <td class=" px-2 py-4 text-sm text-gray-900 ">
                                        {{-- <div class=" flex flex-col gap-2">
                                            <span  class="w-full flex justify-center items-center gap-2 px-3 py-2 text-slate-900 bg-slate-300 rounded-md text-center">
                                                <i class="fa-solid fa-user-tie text-xl"></i>
                                                <span>{{$item->getCreator->name}}</span>
                                            </span>
                                            <span  class="w-full flex justify-center items-center gap-2 px-3 py-2 text-slate-900 bg-blue-300 rounded-md text-center">
                                                <i class="fas fa-running  text-xl"></i>
                                                {{$item->getWorker->name}}
                                            </span>
                                        </div> --}}
                                        <div class="w-64 flex flex-col gap-1">

                                            <div class="flex gap-1">

                                                <a href="{{route('activities.index',['task_id' =>$item->id])}}"
                                                    class="flex gap-2 justify-center items-center max-w-max py-1 px-2 rounded-md text-xs bg-emerald-800 text-slate-200 font-semibold">
                                                   <span>
                                                   {{$item->getActivities()->where('status',2)->count()}}
                                                   </span>
                                                   <span>Complete</span>
                                               </a>

                                               <a href="{{route('activities.index',['task_id' =>$item->id])}}"
                                                    class="flex gap-2 justify-center items-center max-w-max py-1 px-2 rounded-md text-xs bg-orange-700 text-slate-200 font-semibold">
                                                    <span>
                                                    {{$item->getActivities()->where('status',1)->count()}}
                                                    </span>
                                                    <span>Working</span>
                                                </a>

                                                <a href="{{route('activities.index',['task_id' =>$item->id])}}"
                                                    class="flex gap-2 justify-center items-center max-w-max py-1 px-2 rounded-md text-xs bg-slate-900 text-slate-200 font-semibold">
                                                    <span>
                                                    {{$item->getActivities()->where('status',0)->count()}}
                                                    </span>
                                                    <span>NotSeen</span>
                                                </a>

                                            </div>


                                            <div class="h-1 bg-slate-300"></div>



                                            <div class="flex flex-wrap gap-1 items-center">

                                                <div>
                                                    <span class="max-w-max flex items-center gap-1  py-1 px-2 rounded-md text-xs bg-blue-900 text-slate-200">
                                                        <i class="fa-solid fa-user-tie text-sm"></i>
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
                                                                <i class="fa-solid fa-running text-sm"></i>
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
                                        <div class="flex flex-col gap-2 w-32">
                                            <span  class="flex justify-center items-center gap-2 px-2 py-1 bg-slate-900 text-slate-200 rounded-md text-center font-semibold text-xs">
                                                {{-- <i class="fas fa-plus-circle text-base"></i> --}}
                                                 {{$item->created_at}}
                                            </span>
                                            <span  class="flex justify-center items-center gap-2 px-2 py-1 text-slate-200 bg-orange-700 rounded-md text-center font-semibold text-xs">
                                                {{-- <i class="fa-solid fa-arrows-rotate text-base"></i> --}}
                                                {{$item->updated_at}}
                                            </span>
                                        </div>



                                    </td>








                                    <td class="px-2 py-2 text-xs text-gray-200">
                                        <div class="w-full flex items-centert justify-end gap-2">


                                            <div class="bg-slate-300 w-1 rounded"></div>



                                            <div class="w-32 flex flex-col items-center gap-1">


                                                @if ($item->lock==0)
                                                <a class="w-full flex items-center justify-between gap-1 text-slate-200 bg-emerald-800  rounded-md py-1 px-2" title="Task is Open">
                                                    <i class="fa-solid fa-lock-open text-base"></i>
                                                    <div class="text-xs font-semibold">Open Task</div>
                                                </a>
                                                @elseif ($item->lock==1)
                                                    <a class="w-full flex items-center justify-between gap-1 text-xl text-slate-200 bg-red-800 rounded-md py-1 px-2" title="Task is Locked">
                                                        <i class=" fa-solid fa-lock text-base"></i>
                                                        <div class="text-xs font-semibold">Lock Task</div>
                                                    </a>
                                                @endif



                                                @if ($item->priority==0)
                                                    <a class="w-full flex items-center justify-between gap-1 text-xl text-slate-800 bg-slate-300 py-1 px-2 rounded-md " title="Low Priority">
                                                        <i class=" text-base fa-regular fa-star"></i>
                                                        <div class="text-xs font-semibold">Low Priority</div>
                                                    </a>
                                                @elseif ($item->priority==1)
                                                    <a class="w-full flex items-center justify-between gap-1 text-xl text-slate-200 bg-orange-700 py-1 px-2 rounded-md" title="Normal Priority">
                                                        <div class="flex">
                                                            <i class=" text-base fa-solid fa-star-half-stroke"></i>
                                                        </div>
                                                        <div class="text-xs font-semibold">Normal Priority</div>
                                                    </a>
                                                @elseif ($item->priority==2)
                                                    <a class="w-full flex items-center justify-between gap-1 text-xl text-slate-200 bg-red-900 py-1 px-2 rounded-md" title="High Priority">
                                                        <div class="flex items-center">
                                                            <i class=" text-base fa-solid fa-star"></i>
                                                        </div>
                                                        <div class="text-xs font-semibold">High Priority</div>
                                                    </a>
                                                @endif






                                                @if ($item->status==2)
                                                    <a class="w-full flex items-center justify-between gap-1 text-slate-200 bg-emerald-800 py-1 px-2 rounded-md " title="Complete Tsask">
                                                        <i class=" text-base fa-solid fa-circle-check"></i>
                                                        <div class="text-xs font-semibold">Complete</div>
                                                    </a>
                                                @elseif ($item->status==1)
                                                    <a class="w-full flex items-center justify-between gap-1 text-xl text-slate-200 bg-orange-700 py-1 px-2 rounded-md" title="Working Task">
                                                        <i class=" text-base fa-solid fa-person-digging"></i>
                                                        <div class="text-xs font-semibold">Working</div>
                                                    </a>
                                                @elseif ($item->status==0)
                                                    <a class="w-full flex items-center justify-between gap-1 text-xl text-gray-800 bg-slate-300 py-1 px-2 rounded-md " title="Nothing">
                                                        <i class=" text-base fa-solid fa-circle-minus"></i>
                                                        <div class="text-xs font-semibold">Nothing</div>
                                                    </a>
                                                @endif



                                            </div>



                                            <div class="bg-slate-300 w-1 rounded"></div>

                                            <div class="w-64 flex flex-col gap-1">

                                                <div class="grid  gap-2
                                                @if (Auth::user()->role!=0)
                                                grid-cols-3
                                                @else
                                                grid-cols-1
                                                @endif
                                                 ">
                                                    <a class="flex items-center justify-center gap-1 text-xl p-2 transition bg-slate-900 rounded-md text-slate-100   hover:scale-95"
                                                    href="{{route('tasks.show',$item->id)}}">
                                                        <i class=" text-base fa-solid fa-eye "></i>
                                                        <div class="text-sm">Show</div>
                                                    </a>
                                                    @if (Auth::user()->role!=0)
                                                        <a class="flex items-center gap-1 text-xl p-2 transition bg-orange-700 rounded-md text-slate-100  hover:scale-95"
                                                        href="{{route('tasks.edit',$item->id)}}">
                                                            <i class=" text-base fa-solid fa-pen-to-square"></i>
                                                            <div class="text-sm">Update</div>
                                                        </a>
                                                        <form action="{{route('tasks.delete',$item->id)}}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="w-full flex items-center gap-1 text-xl p-2 transition bg-red-900 rounded-md text-slate-100 hover:scale-95">
                                                                <i class=" text-base fa-solid fa-trash-can"></i>
                                                                <div class="text-sm">Delete</div>
                                                            </button>
                                                        </form>
                                                    @endif


                                                </div>


                                                <div class="h-1 w-full bg-slate-300 rounded"></div>

                                                <div class="grid grid-cols-1 gap-2">

{{--
                                                    <a href="{{route('activities.index',['task_id' =>$item->id])}}"
                                                        class="w-full flex items-center justify-center gap-1 text-slate-100 bg-blue-800 p-2 rounded-md transition hover:scale-95">
                                                        <div class="text-sm"> Activities  : {{$item->getActivities()->count()}}</div>
                                                    </a> --}}

                                                    @if ($item->lock == 0)
                                                    <a href="{{route('activities.create',['task_id' =>$item->id])}}"
                                                        class="w-full flex items-center justify-center gap-1 text-slate-100 bg-blue-800 p-2 rounded-md transition hover:scale-95">
                                                        <div class="text-sm"> Create New Activity</div>
                                                    </a>
                                                    @endif

                                                    {{-- <div class="w-full flex items-center justify-center gap-1 text-slate-100 bg-blue-900 p-2 rounded-xl">
                                                        <span class=" text-sm">Count : {{$item->getActivities()->count()}}</span>
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
                            <div class="flex items-center justify-center w-full gap-3 my-3 p-3">
                                <div wire:click="showMore()" class=" flex items-center cursor-pointer justify-center gap-1 px-6 py-2 text-xl font-medium text-white bg-orange-600 rounded-xl shadow-md hover:bg-orange-700 hover:shadow-lg ">
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
