<div>
    <div class="container p-2 mx-auto bg-slate-900/80 rounded-xl ">






        <div class="my-3">
            <div class="flex items-center gap-3 p-2 text-center text-white bg-slate-800 rounded-xl">
                <div class="flex items-center justify-center">
                  <img class="w-16" src="http://127.0.0.1:8000/images/cpnis-logo.png" alt="">
                </div>
                <i class="text-4xl fa-solid fa-code-pull-request "></i>
                <h2 class="text-3xl font-semibold">Activities Managment</h2>
            </div>
        </div>



{{--
        @if (auth()->user()->role != 0)
            <div  class="grid w-full grid-cols-1 gap-5 p-3 my-5 md:grid-cols-3 bg-slate-600 rounded-xl">
                @foreach ($users as $user)
                    <div class="flex items-center justify-between gap-1 px-4 py-2 text-slate-200 bg-slate-900 rounded-xl">
                        <div class="flex flex-col items-start ">
                            <div class="text-2xl font-semibold ">{{$user->name}}</div>
                            <div class="w-40 text-xs font-semibold break-words text-slate-500">{{$user->email}}</div>
                        </div>
                        <div class="flex flex-col items-center text-2xl font-semibold ">
                            <div>{{count($user->getWorkingActivities->where('status','!=',2))}} </div>
                            <div class="text-xs font-semibold text-orange-600">Working Activities</div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif --}}





        @if (auth()->user()->role != 0)
        <div  class="grid w-full grid-cols-1 gap-3 p-3 my-5 rounded-md md:grid-cols-4 bg-slate-600">
            @foreach ($users as $user)
                <div class="flex flex-col items-center justify-between gap-1 text-slate-200 bg-slate-900 rounded-md py-1.5 px-2 cursor-pointer"
                wire:click="filter('worker_id',{{$user->id}})">
                    <div class="flex flex-col items-center ">
                        <div class="text-xl font-semibold uppercase">{{$user->name}}</div>
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
                        <div class="text-xs font-semibold text-slate-500">{{$user->email}}</div>
                    </div>
                    <div class="w-full h-0.5 bg-slate-600"></div>
                    <div class="flex justify-between w-full">

                        <div class="flex items-center gap-3 px-2 text-xl font-semibold rounded-md bg-slate-800 bg-emerald-800" >
                                <div class="text-base">{{count($user->getWorkingActivities->where('status' ,'==',2))}} </div>
                                <div class="text-xs text-slate-300">Complete</div>
                        </div>

                        <div class="flex items-center gap-3 px-2 text-xl font-semibold bg-orange-800 rounded-md" >
                                <div class="text-base">{{count($user->getWorkingActivities->where('status' ,'==',1))}} </div>
                                <div class="text-xs text-slate-300">Working</div>
                        </div>

                        <div class="flex items-center gap-3 px-2 text-xl font-semibold rounded-md bg-slate-800" >
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

                    <div class="flex flex-col justify-between gap-4 md:flex-row">



                        <div class="flex items-center gap-3">
                            <div  class="flex flex-wrap items-center gap-3">
                                <div class="flex flex-col items-center px-4 py-2 font-bold text-orange-600 transition-all duration-200 rounded-md cursor-pointer bg-slate-900 ">
                                    <div class="text-sm font-normal">
                                        Total Activities
                                    </div>
                                    <div class="text-3xl text-slate-300">
                                        <span>{{count($activities)}}</span>
                                        <span class="text-xl">/</span>
                                        <span>{{$activitiesCount}}</span>
                                    </div>
                                </div>
                                <a wire:click="filter()" class="px-2 py-2 text-lg font-semibold transition-all duration-200 rounded-md cursor-pointer bg-slate-300 text-slate-800 hover:scale-95">
                                    <i class="text-2xl fas fa-code-fork"></i>
                                    <span>All</span>
                                </a>
                                <a @click="open=!open" class="px-2 py-2 text-lg font-semibold transition-all duration-200 rounded-md cursor-pointer bg-slate-300 text-slate-800 hover:scale-95">
                                    <i class="text-2xl fas fa-filter rounded-xl"></i>
                                    <span> Filters</span>
                                </a>
                                <a class="px-2 py-2 text-lg font-semibold transition-all duration-200 rounded-md bg-slate-900 text-slate-300 hover:scale-95"
                                href="{{route('activities.index')}}">
                                <i class="text-2xl fas fa-refresh"></i>
                                <span> Refresh</span>
                               </a>
                               <div class="relative">
                                    <input type="text" name="search_text" wire:model="search_text" class="block px-4 py-2 pl-12 m-0 text-lg font-normal transition ease-in-out border-2 border-gray-800 border-solid rounded-md w-52 md:w-80 form-control text-slate-300 bg-slate-900 bg-clip-padding" placeholder="Activity ID , Task ID">
                                    <i class="absolute px-2 text-2xl fas fa-search top-3 left-2 text-slate-400"></i>
                                </div>
                            </div>

                        </div>

                        <div class="flex items-center gap-3">

                            <a href="{{route('activities.create')}}"
                                class="flex items-center gap-2 px-4 py-2 text-lg font-bold transition-all duration-200 rounded-md bg-slate-300 text-slate-900 hover:scale-95 "
                                >
                                <i class="text-2xl fas fa-plus"></i>
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
                                        <span class="block w-20 px-3 py-2 text-sm font-semibold text-center rounded-md text-slate-900 bg-slate-300">
                                             #{{$item->getTask->id}}
                                        </span>
                                    </td>

                                    <td class="px-2 py-4 text-sm text-gray-900">
                                        <span class="block px-2 py-1 text-xs font-semibold text-center rounded-md w-28 text-slate-900 bg-slate-300">
                                             Activity : #{{$item->reply_id}}
                                        </span>
                                    </td>


                                    <td class="px-2 py-4 text-sm text-gray-900">
                                        <span class="block w-40 px-2 py-1 text-xs font-semibold text-center rounded-md text-slate-900 bg-slate-300 ">
                                            {{Str::limit($item->description,15,"...")}}
                                        </span>
                                    </td>



                                    <td class="px-2 py-4 text-sm text-gray-900 ">

                                        <div class="flex flex-col items-center gap-1">

{{--

                                                    <span class="flex items-center gap-1 px-2 py-1 text-xs rounded-md max-w-max bg-slate-300">
                                                        <i class="text-sm fa-solid fa-right-from-bracket"></i>
                                                        <span class="font-semibold">{{$item->getSender->name}}</span>
                                                    </span> --}}
                                                    <span class="flex items-center gap-1 px-2 py-1 text-xs rounded-md max-w-max bg-slate-900 text-slate-200">
                                                        <i class="fa-solid fa-right-from-bracket"></i>
                                                        <span>Send By : </span>
                                                        <span class="font-semibold">{{$item->getSender->name}}</span>
                                                    </span>

                                                    <span class="flex items-center gap-1 px-2 py-1 text-xs bg-orange-700 rounded-md max-w-max text-slate-200">
                                                        <i class="fa-solid fa-running"></i>
                                                        <span>Worker : </span>
                                                        <span class="font-semibold">{{$item->getWorker->name}}</span>
                                                    </span>

                                                    {{-- <span class="flex items-center gap-1 px-2 py-1 text-xs rounded-md max-w-max bg-slate-300">
                                                        <i class="text-sm fa-solid fa-running"></i>
                                                        <span class="font-semibold">{{$item->getWorker->name}}</span>
                                                    </span> --}}




                                    </td>





                                    <td class="px-2 py-4 text-sm text-gray-900 ">
                                        <span  class="flex items-center justify-center gap-2 px-2 py-1 text-xs font-semibold text-center rounded-md text-slate-200 bg-slate-900">
                                            {{-- <i class="text-base fa-solid fa-arrows-rotate"></i> --}}
                                            {{$item->created_at}}
                                        </span>
                                    </td>







                                    <td class="px-2 py-2 text-xs text-gray-200">
                                        <div class="flex justify-end gap-2 items-centert">

                                            <div class="w-1 rounded bg-slate-300"></div>


                                            <div class="flex flex-col items-center justify-center gap-2">

                                                @if ($item->status==2)
                                                    <a class="flex items-center gap-1 px-2 py-1 rounded-md bg-emerald-800 text-slate-200">
                                                        <i class="text-xl fa-solid fa-circle-check"></i>
                                                        <div class="text-xs">Complete</div>
                                                    </a>
                                                @elseif ($item->status==1)
                                                    <a class="flex items-center gap-1 px-2 py-1 text-xl bg-orange-600 rounded-md text-slate-300">
                                                        <i class="text-xl fa-solid fa-person-digging"></i>
                                                        <div class="text-xs font-semibold">Working</div>
                                                    </a>
                                                @elseif ($item->status==0)
                                                    <a class="flex items-center gap-1 px-2 py-1 text-xl bg-gray-900 rounded-md text-slate-300">
                                                        <i class="text-lg fa-solid fa-circle-minus"></i>
                                                        <div class="text-xs font-semibold">Not Seen</div>
                                                    </a>
                                                @endif
                                            </div>



                                            <div class="w-1 rounded bg-slate-300"></div>




                                            <div class="w-72 grid gap-2
                                            @if (Auth::user()->role!=0)
                                            grid-cols-3
                                            @else
                                            grid-cols-2
                                            @endif
                                            ">
                                                <a class="flex items-center justify-center gap-1 p-2 text-xl transition rounded-md bg-slate-900 text-slate-100 hover:scale-95"
                                                href="{{route('activities.show',$item)}}">
                                                    <i class="text-xl fa-solid fa-eye"></i>
                                                    <div class="text-sm">Show</div>
                                                </a>
                                                {{-- <a class="flex items-center gap-1 p-2 text-xl transition bg-orange-700 rounded-md text-slate-100 hover:scale-95"
                                                href="{{route('activities.edit',$item)}}">
                                                    <i class="text-xl fa-solid fa-pen-to-square"></i>
                                                    <div class="text-sm">Update</div>
                                                </a> --}}

                                                @if ($item->status != 2 && $item->worker_id==auth()->id())
                                                <a href="{{route('activities.reply',$item)}}"
                                                    class="flex items-center justify-center w-full gap-1 p-2 transition bg-blue-900 rounded-md text-slate-100 hover:scale-95">
                                                    <i class="text-xl fa-solid fa-reply"></i>
                                                    <div class="text-sm"> Reply</div>
                                                </a>
                                                @endif


                                                @if (Auth::user()->role!=0)
                                                    {{-- <form action="{{route('activities.delete',$item)}}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="flex items-center w-full gap-1 p-2 text-xl transition bg-red-900 rounded-md text-slate-100 hover:scale-95">
                                                            <i class="text-xl fa-solid fa-trash-can"></i>
                                                            <div class="text-sm">Delete</div>
                                                        </button>
                                                    </form> --}}
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
                                                                    <form action="{{route('activities.delete',$item)}}" method="post">
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


                                        </div>
                                    </td>

                                  </tr>
                                @endforeach

                            </tbody>
                          </table>



                          @if ($activitylist->total()>$perPage)
                          <div class="flex items-center justify-center w-full gap-3 p-3 my-3">
                              <div wire:click="showMore()" class="flex items-center justify-center gap-1 px-6 py-2 text-xl font-medium text-white bg-orange-600 shadow-md cursor-pointer rounded-xl hover:bg-orange-700 hover:shadow-lg">
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
