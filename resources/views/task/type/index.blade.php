@extends('layouts.master')

@section('content')






  <div class="container mx-auto ">

    {{-- <div class="relative overflow-hidden bg-no-repeat bg-cover rounded-xl" style="
background-position: 50%;
background-image: url('https://mdbcdn.b-cdn.net/img/new/slides/146.webp');
height: 200px;
">
    <div class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed"
    style="background-color: rgba(0, 0, 0, 0.75)">
    <div class="flex justify-center items-center h-full">
        <div class="text-center text-white flex flex-col gap-3">
            <h1 class="text-5xl font-bold">CPNIS</h1>
            <h2 class="text-3xl font-bold">TasksTypes Managment</h2>
        </div>
    </div>
    </div>
</div> --}}


    <div class="shadow bg-slate-800 p-3 rounded-md">

        <div class="">


            <div class=" my-5">

                <div class="flex flex-col md:flex-row justify-between gap-4">

                    <div class="flex justify-between gap-8">
                        <div>
                            <span class="font-bold text-3xl text-slate-200">
                                Tasks Types List

                            </span>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row gap-3">
                        <a href="{{route('tasks.index')}}"
                        class="flex items-center gap-2 px-6 py-4 text-base font-medium leading-tight uppercase transition-all duration-200 bg-slate-900 text-slate-300 rounded-md hover:scale-95 "
                        >
                        <span>Back To Tasks</span>
                    </a>
                        <a href="{{route('tasks.types.create')}}"
                        class="flex items-center gap-2 px-6 py-4 text-base font-medium leading-tight uppercase transition-all duration-200 bg-blue-900 text-slate-300 rounded-md hover:scale-95 "
                        >
                        <i class="fas fa-plus"></i>
                        <span>Add New Task Type</span>
                    </a>
                    </div>


                </div>
            </div>
        </div>






{{-- Table --}}

        <div>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">

                      <table class="min-w-full overflow-hidden rounded-md">
                        <thead class="p-2 border-b bg-slate-900 ">
                          <tr class="">
                            <th scope="col" class="px-6 py-6 text-base font-medium text-left text-gray-100 cursor-pointer hover:text-gray-400" wire:click="sortByFeields('id')">
                                <i class="fa-solid fa-sort"></i>
                                ID
                            </th>
                            <th scope="col" class="px-6 py-6 text-base font-medium text-left text-gray-100 cursor-pointer hover:text-gray-400" wire:click="sortByFeields('description')">
                                <i class="fa-solid fa-sort"></i>
                                 Type Name
                            </th>


                            <th scope="col" class="px-6 py-4 text-base font-medium text-left text-gray-100">

                            </th>
                          </tr>
                        </thead>
                        <tbody class="">
                            @foreach ($taskTypes as $item)
                            <tr class="bg-slate-200 border-b-[8px] border-t-[8px] border-slate-300 transition duration-300 hover:bg-slate-800">

                                <td class="px-2 py-6 text-sm text-gray-900 whitespace-nowrap">
                                    <span class="w-16 px-3 py-2 text-slate-900 bg-slate-300 rounded-xl text-center text-base font-semibold ">
                                    #{{$item->id}}
                                    </span>
                                </td>

                                <td class="px-2 py-4 text-sm text-gray-900">
                                    <span class="w-48 px-3 py-2 text-slate-200 bg-blue-800 rounded-xl text-center text-sm font-semibold">
                                         {{$item->name}}
                                    </span>
                                </td>




                                <td class="px-2 py-2 text-xs text-gray-200">
                                    <div class="w-48 flex items-centert justify-end gap-2">


                                        <div class="grid grid-cols-2 gap-2">

                                            <a class="flex items-center gap-1 text-xl p-2 transition bg-orange-700 rounded-xl text-slate-100  hover:scale-95"
                                            href="{{route('tasks.types.edit',$item)}}">
                                                <i class=" text-xl fa-solid fa-pen-to-square"></i>
                                                <div class="text-sm">Update</div>
                                            </a>
                                            <form action="{{route('tasks.types.delete',$item)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="w-full flex items-center gap-1 text-xl p-2 transition bg-red-900 rounded-xl text-slate-100 hover:scale-95">
                                                    <i class=" text-xl fa-solid fa-trash-can"></i>
                                                    <div class="text-sm">Delete</div>
                                                </button>
                                            </form>



                                        </div>


                                    </div>
                                </td>

                              </tr>
                            @endforeach

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
        </div>



    </div>
</div>









@endsection
