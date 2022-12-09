@extends('layouts.master')

@section('content')


    <div class="container mx-auto my-3 bg-slate-900 p-2 rounded-lg ">




        <div class="my-3">
            <div class="text-center text-white flex items-center gap-3 bg-slate-800 p-2 rounded-xl">
                <div class="flex items-center justify-center">
                    <img class="w-16" src="http://127.0.0.1:8000/images/cpnis-logo.png" alt="">
                </div>
                <i class="fa-solid fa-binoculars text-4xl "></i>
                <h2 class="text-3xl font-semibold">System Logs</h2>
            </div>
        </div>



        <div class="shadow bg-white p-5 rounded-xl">



            <div class=" mt-3">
                <div class="min-w-full shadow rounded-xl overflow-auto">
                    <table class="table-auto text-left w-full">
                        <thead class="">
                            <tr class=" bg-gray-800 text-white rounded font-medium">
                                <th class="p-3">id</th>
                                <th class="p-3">Type</th>
                                <th class="p-3">Message</th>
                                <th class="p-3">By</th>
                                <th class="p-3">Status</th>
                                <th class="p-3">Date</th>

                              </tr>
                        </thead>
                        <tbody >
                            @foreach ($logs as $item)
                            <tr class="border-b hover:bg-gray-100">
                                <td class="p-3">{{$item->id}}</td>
                                <td class="p-3">
                                    <div class="w-24">
                                        {{$item->type}}
                                    </div>
                                </td>
                                <td class="p-3">
                                    <div class="w-48">
                                        {{$item->message}}
                                    </div>
                                </td>
                                <td class="p-3">
                                    <div  class="w-24">
                                        {{$item->getUser->name}}
                                    </div>
                                </td>
                                <td class="p-3">
                                    <div class="w-24">
                                        {{$item->status}}
                                    </div>
                                </td>
                                <td class="p-3">
                                    <div class="w-24">
                                        {{$item->created_at}}
                                    </div>
                                </td>

                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="my-3">
            {{ $logs->links() }}
        </div>
    </div>



@endsection
