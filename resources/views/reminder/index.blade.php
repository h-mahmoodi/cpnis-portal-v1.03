@extends('layouts.master')

@section('content')






<div>
    <div class="container mx-auto bg-slate-900/80 p-2 rounded-xl">





        <div class="my-3">
            <div class="text-center text-white flex items-center gap-3 bg-slate-800 p-2 rounded-xl">
                <div class="flex items-center justify-center">
                  <img class="w-16" src="http://127.0.0.1:8000/images/cpnis-logo.png" alt="">
                </div>
                <i class="fa-solid fa-bell text-4xl "></i>
                <h2 class="text-3xl font-semibold">Reminders Managment</h2>
            </div>
        </div>








        <div class="my-5 flex flex-col md:flex-row gap-5 bg-slate-600 p-3 rounded-md items-center">


            {{-- <div class="w-full md:w-4/12 mx-auto flex flex-col justify-start items-center gap-3  overflow-hidden rounded-xl">


                <div class="flex justify-center items-center p-3 ">
                    <img class="w-full rounded-xl" src="{{asset('images/reminder.png')}}" alt="">
                </div>
            </div> --}}


            <div class="w-full mx-auto ">

                <div class="">


                    <div class="">

                        <div class="flex flex-col md:flex-row justify-between gap-4 p-3 bg-white  rounded-md">
                            <div class="w-full px-2">
                                <div class="">
                                    <form action="{{route('reminder.store')}}" method="post" class="">

                                        @csrf

                                        <div class="w-full flex gap-3 items-end">

                                            <div class="w-full md:w-44 flex gap-3">
                                                <div class="flex flex-col items-start w-full gap-2">
                                                    <label for="user_id" class="
                                                    @error('user_id')
                                                        text-red-500
                                                    @enderror
                                                    ">Select User</label>
                                                    <select name="user_id" class="form-select appearance-none
                                                    block
                                                    w-full
                                                    px-3
                                                    py-1.5
                                                    text-base
                                                    font-normal
                                                    text-gray-700
                                                    bg-gray-50 bg-clip-padding bg-no-repeat
                                                    border border-solid border-gray-300
                                                    rounded-md
                                                    transition
                                                    ease-in-out
                                                    m-0
                                                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                                                    @error('user_id')
                                                        border-red-500
                                                    @enderror
                                                    " >
                                                    @if (auth()->user()->role != 0)
                                                        <option value="">Select One</option>
                                                        @foreach ($users as $item )
                                                            <option value="{{$item->id}}" @if(old('user_id')=="$item->id") selected @endif>{{$item->name}} _ {{$item->email}}</option>
                                                        @endforeach
                                                    @else
                                                        <option value="{{auth()->id()}}">{{auth()->user()->name}}</option>
                                                    @endif

                                                    </select>

                                                </div>
                                            </div>


                                            <div class="w-full md:w-44 flex gap-3">


                                                <div class="flex flex-col w-full items-strat  gap-2">

                                                    <label for="reminder_date" class="text-slate-800
                                                    @error('reminder_date')
                                                        text-red-500
                                                    @enderror
                                                    ">Reminder Date</label>

                                                    <input type="date" name="reminder_date" class="
                                                    form-control
                                                    block
                                                    w-full
                                                    px-3
                                                    py-1.5
                                                    text-base
                                                    font-normal
                                                    text-gray-700
                                                    bg-gray-50 bg-clip-padding
                                                    border border-solid border-gray-300
                                                    rounded-md
                                                    transition
                                                    ease-in-out
                                                    m-0
                                                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                                                    @error('reminder_date')
                                                        border-red-500
                                                    @enderror
                                                    " value="{{old('reminder_date')}}">

                                                </div>




                                            </div>



                                            <div class="w-full md:w-96 flex flex-col items-strat  gap-2">

                                                <label for="body" class="text-slate-800
                                                @error('body')
                                                    text-red-500
                                                @enderror
                                                ">Description Or Details</label>

                                                <input name="body" class="
                                                form-control
                                                block
                                                w-full
                                                px-3
                                                py-1.5
                                                text-base
                                                font-normal
                                                text-gray-700
                                                bg-gray-50 bg-clip-padding
                                                border border-solid border-gray-300
                                                rounded-md
                                                transition
                                                ease-in-out
                                                m-0
                                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                                                @error('body')
                                                    border-red-500
                                                @enderror
                                                " value={{old('body')}}>

                                            </div>

                                                <div class="flex">
                                                    <button type="submit"
                                            class="w-80  px-4 py-4 bg-slate-800 text-white font-medium text-sm  uppercase rounded-lg shadow-md hover:bg-blue-900 hover:shadow-lg ">
                                            Save New Reminder </button>
                                                </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>




        <div class="relative bg-slate-600 p-3 rounded-md">
            <div class="absolute bg-gray-800 rounded-full top-1/2 left-1/2" wire:loading>
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
                            <th scope="col" class=" py-6 px-2 text-base font-medium text-gray-100 cursor-pointer hover:text-gray-400" wire:click="sortByFeields('id')">
                                <i class="fa-solid fa-sort"></i>
                                 ID
                            </th>

                              <th scope="col" class=" py-6 px-2 text-base font-medium text-left text-gray-100 cursor-pointer hover:text-gray-400" wire:click="sortByFeields('title')">
                                <i class="fa-solid fa-sort"></i>
                                User
                              </th>
                              <th scope="col" class=" px-3 py-6 text-base font-medium text-left text-gray-100 cursor-pointer hover:text-gray-400"  wire:click="sortByFeields('document_type')">
                                <i class="fa-solid fa-sort"></i>
                                 Reminder Description
                              </th>
                              <th scope="col" class=" px-3 py-6 text-base font-medium text-left text-gray-100 cursor-pointer hover:text-gray-400" wire:click="sortByFeields('created_at')">
                                <i class="fa-solid fa-sort"></i>
                                Reminder Date
                              </th>



                            <th scope="col" class=" px-6 py-4 text-base font-medium text-left text-gray-100">

                            </th>
                          </tr>
                        </thead>
                        <tbody class="">
                            @foreach ($reminders as $item)
                            <tr class="bg-slate-200 border-b-[8px] border-t-[8px] border-slate-300 transition duration-300 hover:bg-slate-800">

                                <td class=" px-2 py-3 text-sm text-gray-900 whitespace-nowrap">
                                    <span class="w-full px-3 py-2 text-slate-200 bg-slate-800 rounded-md text-center text-base font-semibold block">
                                        #{{$item->id}}
                                    </span>
                                </td>

                                <td class="px-2 py-3 text-sm whitespace-nowrap">
                                    <span class="w-24 px-3 py-2 text-slate-900 bg-slate-300 rounded-md">
                                        {{$item->getUser->name}}
                                    </span>
                                </td>



                                <td class=" px-2 py-3 text-sm text-gray-900">
                                    <span  class="w-36 px-3 py-2 text-slate-900 bg-slate-300 rounded-md block">
                                        {{$item->body}}
                                    </span>
                                </td>


                                <td class="px-2 py-3 text-sm text-gray-900">
                                    <span  class="w-32 px-3 py-2 text-slate-900 bg-slate-300 rounded-md block text-center">
                                        {{$item->reminder_date}}
                                    </span>
                                </td>






                                <td class="px-2 py-3 text-xs text-gray-200">
                                    <div class="w-28 flex items-center justify-end gap-2">

                                        <div class=" grid grid-cols-1 gap-2">
                                            <form action="{{route('reminder.delete',$item)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="w-full flex items-center gap-1 text-xl p-2 transition bg-red-900 rounded-md text-slate-100 hover:scale-110">
                                                    <i class=" text-xl fa-solid fa-trash-can"></i>
                                                    <div class="text-sm">Delete</div>
                                                </button>
                                            </form>



                                            {{-- <div class="w-full flex items-center justify-center gap-1 text-slate-100 bg-blue-900 p-2 rounded-xl">
                                                <span class=" text-sm">Count : {{$item->getTasks()->count()}}</span>
                                            </div> --}}

                                        </div>


                                    </div>
                                </td>
                              </tr>
                            @endforeach

                        </tbody>
                      </table>

                      {{-- @if ($documentlist->total()>$perPage)
                        <div class="flex items-center justify-center w-full gap-3 my-3 p-3">
                            <div wire:click="showMore()" class=" flex items-center cursor-pointer justify-center gap-1 px-6 py-2 text-xl font-medium text-white bg-orange-600 rounded-xl shadow-md hover:bg-orange-700 hover:shadow-lg ">
                                <div>
                                    Show More
                                </div>
                                <div class="text-base text-gray-300">
                                    ( {{$documentlist->lastItem()}} of {{$documentlist->total()}} )
                                </div>

                            </div>

                        </div>
                      @endif --}}


                      {{-- {{ $documentlist->links() }} --}}


                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>










@endsection
