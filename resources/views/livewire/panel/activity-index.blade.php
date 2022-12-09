<div>
    <div class="container mx-auto bg-slate-900/80 p-2 rounded-xl ">






        <div class="my-3">
            <div class="text-center text-white flex items-center gap-3 bg-slate-800 p-2 rounded-xl">
                <div class="flex items-center justify-center">
                  <img class="w-16" src="http://127.0.0.1:8000/images/cpnis-logo.png" alt="">
                </div>
                <i class="fa-solid fa-code-pull-request text-4xl "></i>
                <h2 class="text-3xl font-semibold">Activities Managment</h2>
            </div>
        </div>



{{--
        @if (auth()->user()->role != 0)
            <div  class="w-full grid grid-cols-1 md:grid-cols-3 gap-5 bg-slate-600 p-3 rounded-xl my-5">
                @foreach ($users as $user)
                    <div class="flex items-center justify-between gap-1 text-slate-200 bg-slate-900 rounded-xl py-2 px-4">
                        <div class="flex flex-col items-start ">
                            <div class="text-2xl font-semibold ">{{$user->name}}</div>
                            <div class="w-40 text-xs font-semibold text-slate-500 break-words">{{$user->email}}</div>
                        </div>
                        <div class="flex flex-col items-center font-semibold text-2xl  ">
                            <div>{{count($user->getWorkingActivities->where('status','!=',2))}} </div>
                            <div class="text-xs font-semibold text-orange-600">Working Activities</div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif --}}





        @if (auth()->user()->role != 0)
        <div  class="w-full grid grid-cols-1 md:grid-cols-4 gap-3 bg-slate-600 p-3 rounded-md my-5">
            @foreach ($users as $user)
                <div class="flex flex-col items-center justify-between gap-1 text-slate-200 bg-slate-900 rounded-md py-1.5 px-2 cursor-pointer"
                wire:click="filter('worker_id',{{$user->id}})">
                    <div class="flex flex-col items-center ">
                        <div class="text-xl font-semibold uppercase">{{$user->name}}</div>
                        <div class="text-xs text-slate-500">
                            <span class="">
                                @if (auth()->user()->role==2)
                                    Super Admin
                                @elseif (auth()->user()->role==1)
                                    Admin
                                @elseif (auth()->user()->role==0)
                                    Normal User
                                @endif
                            </span>
                        </div>
                        <div class="text-xs font-semibold text-slate-500">{{$user->email}}</div>
                    </div>
                    <div class="w-full h-0.5 bg-slate-600"></div>
                    <div class="w-full flex justify-between">

                        <div class="flex items-center gap-3 font-semibold text-xl bg-slate-800 rounded-md px-2 bg-emerald-800" >
                                <div class="text-base">{{count($user->getWorkingActivities->where('status' ,'==',2))}} </div>
                                <div class="text-xs text-slate-300">Complete</div>
                        </div>

                        <div class="flex items-center gap-3 font-semibold text-xl  rounded-md px-2 bg-orange-800" >
                                <div class="text-base">{{count($user->getWorkingActivities->where('status' ,'==',1))}} </div>
                                <div class="text-xs text-slate-300">Working</div>
                        </div>

                        <div class="flex items-center gap-3 font-semibold text-xl  rounded-md px-2 bg-slate-800" >
                                <div class="text-base">{{count($user->getWorkingActivities->where('status' ,'==',0))}} </div>
                                <div class="text-xs text-slate-300">NotSeen</div>
                    </div>


                    </div>
                </div>
            @endforeach
        </div>
    @endif






        <div class="p-3 shadow bg-slate-600 rounded-xl">


            <div class="" x-data="{'open':false}">


                <div class="my-5 ">

                    <div class="flex flex-col md:flex-row justify-between gap-4">



                        <div class="flex items-center gap-3">
                            <div  class="flex flex-wrap items-center gap-3">
                                <div class="flex flex-col items-center px-4 py-2 font-bold transition-all duration-200 cursor-pointer bg-slate-900 text-orange-600 rounded-md ">
                                    <div class="text-sm font-normal">
                                        Total Activities
                                    </div>
                                    <div class="text-3xl text-slate-300">
                                        <span>{{count($activities)}}</span>
                                        <span class="text-xl">/</span>
                                        <span>{{$activitiesCount}}</span>
                                    </div>
                                </div>
                                <a wire:click="filter()" class="px-2 py-2 text-lg font-semibold transition-all duration-200 cursor-pointer bg-slate-300 text-slate-800 rounded-md hover:scale-95">
                                    <i class="fas fa-code-fork text-2xl"></i>
                                    <span>All</span>
                                </a>
                                <a @click="open=!open" class="px-2 py-2 text-lg font-semibold  transition-all duration-200 cursor-pointer bg-slate-300 text-slate-800 rounded-md hover:scale-95">
                                    <i class=" text-2xl fas fa-filter rounded-xl "></i>
                                    <span> Filters</span>
                                </a>
                                <a class=" px-2 py-2 text-lg font-semibold transition-all duration-200 bg-slate-900 text-slate-300 rounded-md hover:scale-95 "
                                href="{{route('activities.index')}}">
                                <i class="text-2xl fas fa-refresh"></i>
                                <span> Refresh</span>
                               </a>
                               <div class="relative">
                                    <input type="text" name="search_text" wire:model="search_text" class="block pl-12 w-52 md:w-80 px-4 py-2  m-0 text-lg font-normal transition ease-in-out border-2
                                     border-gray-800 border-solid form-control text-slate-300 bg-slate-900 bg-clip-padding rounded-md" placeholder="Activity ID , Task ID">
                                    <i class="absolute px-2 text-2xl fas fa-search top-3 left-2 text-slate-400"></i>
                                </div>
                            </div>

                        </div>

                        <div class="flex items-center gap-3">

                            <a href="{{route('activities.create')}}"
                                class="flex items-center gap-2 px-4 py-2 text-lg font-bold transition-all duration-200 bg-slate-300 text-slate-900 rounded-md hover:scale-95 "
                                >
                                <i class="fas fa-plus text-2xl"></i>
                                <span>Add New Activity</span>
                            </a>
                        </div>


                    </div>

                    <div x-show="open" class="flex gap-5 my-3" x-transition>

                        <div class="flex flex-col gap-3 p-3 bg-slate-700 rounded-xl ">
                            <a class="flex items-center justify-between gap-6 p-2 mx-1 text-base font-semibold leading-tight transition-all duration-200 cursor-pointer bg-slate-900 text-slate-300 rounded-xl hover:scale-95"
                            wire:click="filter('status',0)">
                               <i class="p-3 text-2xl fa-solid fa-circle-minus rounded-xl bg-slate-800 "></i>
                               <span>  Not Seen </span>
                               <span class="text-2xl">  {{count($totalActivities->where('status',0))}}</span>
                          </a>
                           <a class="flex items-center justify-between gap-6 p-2 mx-1 text-base font-semibold leading-tight transition-all duration-200 cursor-pointer bg-slate-900 text-slate-300 rounded-xl hover:scale-95"
                             wire:click="filter('status',1)">
                                <i class="p-3 text-2xl fa-solid fa-circle-half-stroke rounded-xl bg-slate-800 "></i>
                                <span>  Working </span>
                                <span class="text-2xl">  {{count($totalActivities->where('status',1))}}</span>
                           </a>
                           <a class="flex items-center justify-between gap-6 p-2 mx-1 text-base font-semibold leading-tight transition-all duration-200 cursor-pointer bg-slate-900 text-slate-300 rounded-xl hover:scale-95"
                           wire:click="filter('status',2)">
                              <i class="p-3 text-2xl fa-solid fa-circle-check rounded-xl bg-slate-800 "></i>
                              <span>  Complete </span>
                              <span class="text-2xl">  {{count($totalActivities->where('status',2))}}</span>
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
                <div class="flex flex-col" wire:loading.class="opacity-30">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                      <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                          <table class="min-w-full overflow-hidden rounded-xl">
                            <thead class="p-2 border-b bg-slate-900 ">
                              <tr class="">
                                <th scope="col" class="px-6 py-6 text-base font-medium text-left text-gray-100 cursor-pointer hover:text-gray-400" wire:click="sortByFeields('id')">
                                    <i class="fa-solid fa-sort"></i>
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-6 text-base font-medium text-left text-gray-100 cursor-pointer hover:text-gray-400" wire:click="sortByFeields('task_id')">
                                    <i class="fa-solid fa-sort"></i>
                                    Task ID
                                </th>
                                <th scope="col" class="px-6 py-6 text-base font-medium text-left text-gray-100 cursor-pointer hover:text-gray-400" wire:click="sortByFeields('task_id')">
                                    <i class="fa-solid fa-sort"></i>
                                    Reply To
                                </th>
                                <th scope="col" class="px-6 py-6 text-base font-medium text-left text-gray-100 cursor-pointer hover:text-gray-400" wire:click="sortByFeields('description')">
                                    <i class="fa-solid fa-sort"></i>
                                     Activity Details
                                </th>


                                <th scope="col" class="px-6 py-6 text-base font-medium text-left text-gray-100 cursor-pointer hover:text-gray-400" wire:click="sortByFeields('sender_id')">
                                    <i class="fa-solid fa-sort"></i>
                                    Users
                                </th>


                                  <th scope="col" class="px-6 py-6 text-base font-medium text-left text-gray-100 cursor-pointer hover:text-gray-400" wire:click="sortByFeields('created_at')">
                                    <i class="fa-solid fa-sort"></i>
                                    Created At
                                  </th>


                                <th scope="col" class="px-6 py-4 text-base font-medium text-left text-gray-100">

                                </th>
                              </tr>
                            </thead>
                            <tbody class="">
                                @foreach ($activitylist as $item)
                                <tr class="bg-slate-200 border-b-[8px] border-t-[8px] border-slate-300 transition duration-300 hover:bg-slate-800
                                {{-- @if ($item->status==2 || $item->sender_id==auth()->id() && $item->worker_id!=auth()->id())
                                    bg-slate-400
                                @endif  --}}
                                ">

                                    <td class="px-2 py-6 text-sm text-gray-900 whitespace-nowrap">
                                        <span class="w-16 px-3 py-2 text-slate-200 rounded-md text-center text-base font-semibold block
                                        @if ($item->getWorker->id == auth()->id() && $item->status != 2)
                                            bg-orange-700
                                        @else
                                            bg-slate-800
                                        @endif
                                        ">
                                        #{{$item->id}}
                                        </span>
                                    </td>

                                    <td class="px-2 py-4 text-sm text-gray-900">
                                        <span class="w-20 px-3 py-2 text-slate-900 bg-slate-300 rounded-md text-center text-sm font-semibold block">
                                             #{{$item->getTask->id}}
                                        </span>
                                    </td>

                                    <td class="px-2 py-4 text-sm text-gray-900">
                                        <span class="w-28 px-2 py-1 text-slate-900 bg-slate-300 rounded-md text-center text-xs font-semibold block">
                                             Activity : #{{$item->reply_id}}
                                        </span>
                                    </td>


                                    <td class="px-2 py-4 text-sm text-gray-900">
                                        <span class="w-40 px-2 py-1 text-slate-900 bg-slate-300 rounded-md text-center text-xs block font-semibold ">
                                            {{Str::limit($item->description,15,"...")}}
                                        </span>
                                    </td>



                                    <td class="px-2 py-4 text-sm text-gray-900 ">

                                        <div class="flex flex-col gap-1 items-center">

{{--

                                                    <span class="max-w-max flex items-center gap-1  py-1 px-2 rounded-md text-xs bg-slate-300">
                                                        <i class="fa-solid fa-right-from-bracket text-sm"></i>
                                                        <span class="font-semibold">{{$item->getSender->name}}</span>
                                                    </span> --}}
                                                    <span class="max-w-max flex items-center gap-1  py-1 px-2 rounded-md text-xs bg-slate-900 text-slate-200">
                                                        <i class="fa-solid fa-right-from-bracket"></i>
                                                        <span>Send By : </span>
                                                        <span class="font-semibold">{{$item->getSender->name}}</span>
                                                    </span>

                                                    <span class="max-w-max flex items-center gap-1  py-1 px-2 rounded-md text-xs bg-orange-700 text-slate-200">
                                                        <i class="fa-solid fa-running"></i>
                                                        <span>Worker : </span>
                                                        <span class="font-semibold">{{$item->getWorker->name}}</span>
                                                    </span>

                                                    {{-- <span class="max-w-max flex items-center gap-1  py-1 px-2 rounded-md text-xs bg-slate-300">
                                                        <i class="fa-solid fa-running text-sm"></i>
                                                        <span class="font-semibold">{{$item->getWorker->name}}</span>
                                                    </span> --}}




                                    </td>





                                    <td class="px-2 py-4 text-sm text-gray-900 ">
                                        <span  class="flex justify-center items-center gap-2 px-2 py-1 text-slate-200 bg-slate-900 rounded-md text-center font-semibold text-xs">
                                            {{-- <i class="fa-solid fa-arrows-rotate text-base"></i> --}}
                                            {{$item->created_at}}
                                        </span>
                                    </td>







                                    <td class="px-2 py-2 text-xs text-gray-200">
                                        <div class=" flex items-centert justify-end gap-2">

                                            <div class="bg-slate-300 w-1 rounded"></div>


                                            <div class="flex flex-col items-center justify-center  gap-2">

                                                @if ($item->status==2)
                                                    <a class="flex items-center gap-1 bg-emerald-800 text-slate-200 py-1 px-2 rounded-md">
                                                        <i class="text-xl fa-solid fa-circle-check"></i>
                                                        <div class="text-xs">Complete</div>
                                                    </a>
                                                @elseif ($item->status==1)
                                                    <a class="flex items-center gap-1 text-xl bg-orange-600 text-slate-300 py-1 px-2 rounded-md">
                                                        <i class=" text-xl fa-solid fa-person-digging"></i>
                                                        <div class="text-xs font-semibold">Working</div>
                                                    </a>
                                                @elseif ($item->status==0)
                                                    <a class="flex items-center gap-1 text-xl bg-gray-900 text-slate-300 py-1 px-2 rounded-md">
                                                        <i class=" text-lg fa-solid fa-circle-minus"></i>
                                                        <div class="text-xs  font-semibold">Not Seen</div>
                                                    </a>
                                                @endif
                                            </div>



                                            <div class="bg-slate-300 w-1 rounded"></div>




                                            <div class="w-72 grid gap-2
                                            @if (Auth::user()->role!=0)
                                            grid-cols-3
                                            @else
                                            grid-cols-2
                                            @endif
                                            ">
                                                <a class="flex items-center justify-center gap-1 text-xl p-2 transition bg-slate-900 rounded-md text-slate-100  hover:scale-95"
                                                href="{{route('activities.show',$item)}}">
                                                    <i class=" text-xl fa-solid fa-eye "></i>
                                                    <div class="text-sm">Show</div>
                                                </a>
                                                {{-- <a class="flex items-center gap-1 text-xl p-2 transition bg-orange-700 rounded-md text-slate-100  hover:scale-95"
                                                href="{{route('activities.edit',$item)}}">
                                                    <i class=" text-xl fa-solid fa-pen-to-square"></i>
                                                    <div class="text-sm">Update</div>
                                                </a> --}}

                                                @if ($item->status != 2 && $item->worker_id==auth()->id())
                                                <a href="{{route('activities.reply',$item)}}"
                                                    class="w-full flex items-center justify-center gap-1 text-slate-100 bg-blue-900 p-2 rounded-md transition hover:scale-95">
                                                    <i class="text-xl fa-solid fa-reply"></i>
                                                    <div class="text-sm"> Reply</div>
                                                </a>
                                                @endif


                                                @if (Auth::user()->role!=0)
                                                    <form action="{{route('activities.delete',$item)}}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="w-full flex items-center gap-1 text-xl p-2 transition bg-red-900 rounded-md text-slate-100 hover:scale-95">
                                                            <i class=" text-xl fa-solid fa-trash-can"></i>
                                                            <div class="text-sm">Delete</div>
                                                        </button>
                                                    </form>
                                                @endif




                                            </div>


                                        </div>
                                    </td>

                                  </tr>
                                @endforeach

                            </tbody>
                          </table>



                          @if ($activitylist->total()>$perPage)
                          <div class="flex items-center justify-center w-full gap-3 my-3 p-3">
                              <div wire:click="showMore()" class=" flex items-center cursor-pointer justify-center gap-1 px-6 py-2 text-xl font-medium text-white bg-orange-600 rounded-xl shadow-md hover:bg-orange-700 hover:shadow-lg ">
                                  <div>
                                      Show More
                                  </div>
                                  <div class="text-base text-gray-300">
                                      ( {{$activitylist->lastItem()}} of {{$activitylist->total()}} )
                                  </div>

                              </div>

                          </div>
                        @endif


                          {{-- {{ $activitylist->links() }} --}}


                        </div>
                      </div>
                    </div>
                  </div>
            </div>

        </div>






    </div>
</div>
