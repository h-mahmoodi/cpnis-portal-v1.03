@extends('layouts.master')

@section('content')


    <div class="container mx-auto my-5">
        <div class="shadow bg-white p-5 rounded-xl">


            <div class="flex justify-between mb-3">
                <div class="mt-3">
                    <span class="font-bold text-xl">
                        Notifications List
                    </span>
                </div>
                <div class="flex gap-4 mt-3">
                    <a href="{{route('index')}}" class="btn btn-secondary mr-3">Back To Document List</a>
                </div>

            </div>

            <hr>

            <div class=" mt-3">
                <div class="min-w-full shadow rounded-xl overflow-hidden">
                    <table class="table-auto text-left w-full">
                        <thead class="">
                            <tr class=" bg-gray-800 text-white rounded font-medium">
                                <th class="p-3">id</th>
                                <th class="p-3">Notify Type</th>
                                <th class="p-3">Notify To</th>
                                <th class="p-3">Notify Date</th>

                              </tr>
                        </thead>
                        <tbody >
                            @foreach ($notifys as $item)
                            <tr class="border-b hover:bg-gray-100">
                                <td class="p-3">{{$item->id}}</td>
                                <td class="p-3">{{$item->type}}</td>
                                <td class="p-3">{{$item->getdocument->first_name}} {{$item->getdocument->last_name}}</td>
                                <td class="p-3">{{$item->created_at}}</td>

                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection
