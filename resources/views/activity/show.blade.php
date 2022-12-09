@extends('layouts.master')

@section('content')


    <div class="container mx-auto my-5 flex flex-col md:flex-row gap-5">




        <div class="w-full md:w-5/12 mx-auto flex flex-col justify-start items-center gap-3 bg-white p-3 overflow-hidden rounded-md">
            <div class="w-full flex items-center justify-center py-4 px-4  bg-gray-100 rounded-lg ">
                <div class="">
                    <span class="font-semibold text-xl text-gray-800">
                        Show Activity #{{$activity->id}}
                    </span>
                </div>
            </div>

            <div class="flex justify-center items-center p-3">
                <img class="w-full" src="{{asset('images/show_activity.png')}}" alt="">
            </div>
        </div>









        <div class="w-full p-3 mx-auto bg-white shadow-xl rounded-md md:w-7/12">








            <div class="px-2">
                <div class="">


                        <div class="flex flex-col items-start gap-2 my-5">
                            <label for="task_id" class="
                            @error('task_id')
                                text-red-500
                            @enderror
                            ">Select Task</label>
                            <select disabled name="task_id" class="form-select appearance-none bg-gray-50
                            block
                            w-full
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                         bg-clip-padding bg-no-repeat
                            border border-solid border-gray-300
                            rounded-xl
                            transition
                            ease-in-out
                            m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                            @error('task_id')
                                border-red-500
                            @enderror
                            " >

                                <option value="{{$task->id}}">#{{$task->id}}  / {{$task->title}}</option>


                            </select>

                        </div>



                        <div class="flex justify-between gap-3 my-5">


                            <div class="flex flex-col items-start w-full gap-2">
                                <label for="worker_id" class="
                                @error('worker_id')
                                    text-red-500
                                @enderror
                                ">Assign To</label>
                                <select disabled name="worker_id" class="form-select appearance-none
                                block
                                w-full
                                px-3
                                py-1.5
                                text-base
                                font-normal
                                text-gray-700
                                bg-gray-50 bg-clip-padding bg-no-repeat
                                border border-solid border-gray-300
                                rounded-xl
                                transition
                                ease-in-out
                                m-0
                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                                @error('worker_id')
                                    border-red-500
                                @enderror
                                " >
                                    <option value="{{$user->id}}">{{$user->name}} _ {{$user->email}}</option>
                                </select>

                            </div>


                        </div>



                        <hr>




                        <div class="flex flex-col gap-2 my-5 items-strat">

                            <label for="description" class="
                            @error('description')
                                text-red-500
                            @enderror
                            ">Activity Working Details</label>

                            <textarea disabled name="description" rows="5" class="
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
                            rounded-xl
                            transition
                            ease-in-out
                            m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                            @error('description')
                                border-red-500
                            @enderror
                            ">{{$activity->description}}</textarea>

                        </div>




                        {{-- <div class="flex justify-between gap-3 my-5">

                            <div class="flex flex-col items-start w-full gap-2">
                                <label for="status" class="
                                @error('status')
                                    text-red-500
                                @enderror
                                ">Select Status</label>
                                <select name="status" class="form-select appearance-none
                                block
                                w-full
                                px-3
                                py-1.5
                                text-base
                                font-normal
                                text-gray-700
                                bg-gray-50 bg-clip-padding bg-no-repeat
                                border border-solid border-gray-300
                                rounded-xl
                                transition
                                ease-in-out
                                m-0
                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                                @error('status')
                                    border-red-500
                                @enderror
                                " >
                                    <option value="">Select One</option>
                                    <option value="0" @if(old('status')=="0") selected @endif>Waiting</option>
                                    <option value="1" @if(old('status')=="1") selected @endif>Working</option>
                                    <option value="2" @if(old('status')=="2") selected @endif>Complete</option>

                                </select>

                            </div>




                        </div> --}}















                        <div class="flex gap-4">
                            @if ($activity->status != 2 && $activity->worker_id==auth()->id())
                                <a href="{{route('activities.reply',$activity)}}"
                                class="w-full px-6 py-4 text-sm font-medium leading-tight text-center text-white uppercase
                                bg-blue-800 shadow-md rounded-md hover:bg-blue-900 hover:shadow-lg ">Reply This Activity</a>
                            @endif

                            <a href="{{route('tasks.show',$task)}}"
                                class="w-full px-6 py-4 text-sm font-medium leading-tight text-center text-white uppercase
                                 bg-blue-800 shadow-md rounded-md hover:bg-blue-900 hover:shadow-lg ">Show Parent Task</a>

                            <a href="{{url()->previous()}}"
                            class="w-full px-6 py-4 text-sm font-medium leading-tight text-center text-white uppercase
                             bg-gray-800 shadow-md rounded-md hover:bg-gray-900 hover:shadow-lg ">Back</a>
                        </div>
                </div>
            </div>

        </div>

    </div>


@endsection

















