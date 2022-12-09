@extends('layouts.master')

@section('content')


    <div class="container mx-auto my-5 flex flex-col md:flex-row gap-5">






        <div class="w-full md:w-5/12 mx-auto flex flex-col justify-start items-center gap-3 bg-white p-3 overflow-hidden rounded-md">
            <div class="w-full flex items-center justify-center py-4 px-4  bg-gray-100 rounded-md ">
                <div class="">
                    <span class="font-semibold text-xl text-gray-800">
                        Show Task #{{$task->id}}
                    </span>
                </div>
                {{-- <div class="flex gap-4">
                    <a href="{{url()->previous()}}"
                    class="inline-block px-6 py-2.5 bg-gray-800 text-white font-medium text-sm leading-tight uppercase rounded-xl shadow-md hover:bg-gray-900 hover:shadow-lg ">Back</a>
                </div> --}}
            </div>

            <div class="flex justify-center items-center p-3">
                <img class="w-full" src="{{asset('images/show_task.png')}}" alt="">
            </div>
        </div>









        <div class="shadow-xl bg-white p-3 rounded-md w-full md:w-7/12 mx-auto">


            @if (count($errors)>0)
                <div class="flex flex-wrap gap-2 my-2 bg-red-100 p-2 rounded-xl">
                    @foreach ($errors->all() as $error)
                        <div class="text-center text-xs bg-red-200 text-red-500 py-1 px-2 rounded-xl">
                            {{$error}}
                        </div>
                    @endforeach
                </div>
            @endif



            <div class="px-2">
                <div class="">
                    <form class="">

                        @csrf


                        <div class="w-full flex flex-col items-strat  gap-2 my-5">

                            <label for="title" class="
                            @error('title')
                                text-red-500
                            @enderror
                            ">Task Title</label>

                            <input disabled type="text" name="title"  class="
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
                            @error('title')
                                border-red-500
                            @enderror
                            "  value="{{old('title',$task->title)}}" placeholder="Enter The Task or Subject Title">

                        </div>

                        <div class="flex flex-col items-strat  gap-2  my-5">

                            <label for="description" class="
                            @error('description')
                                text-red-500
                            @enderror
                            ">
                            Task Description
                        </label>

                            <textarea disabled name="description" rows="3" class="
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
                            "  placeholder="Enter More Description & Details For The Task">{{old('description',$task->description)}}</textarea>

                        </div>




                        <hr>





                        <div class="flex justify-between gap-3 my-5">

                            <div class="w-full md:w-1/2 flex flex-col items-start gap-2">
                                <label for="type_id" class="
                                @error('type_id')
                                    text-red-500
                                @enderror
                                "> Task Type</label>
                                <select disabled name="type_id" class="form-select appearance-none bg-gray-50
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
                                @error('type_id')
                                    border-red-500
                                @enderror
                                " >
                                    <option value="">Select Task Type</option>
                                    @foreach ($types as $item )
                                        <option value="{{$item->id}}" @if(old('type_id',$task->type_id)=="$item->id") selected @endif>{{$item->name}}</option>
                                    @endforeach
                                </select>

                            </div>


                            <div class="w-full md:w-1/2  flex flex-col items-start gap-2">
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
                                    <option value="">Select Some One</option>
                                    @foreach ($users as $item )
                                        <option value="{{$item->id}}" @if(old('worker_id',$task->worker_id)=="$item->id") selected @endif>{{$item->name}} ({{$item->email}})</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>




                        <hr>

                        <div class="flex justify-between gap-5 my-5">



                            <div class="w-full md:w-1/3 flex flex-col items-start gap-2">
                                <label for="lock" class="
                                @error('lock')
                                    text-red-500
                                @enderror
                                ">Task Lock</label>
                                <select disabled name="lock" class="form-select appearance-none
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
                                @error('lock')
                                    border-red-500
                                @enderror
                                " >
                                    <option value="">Select Lock Type</option>
                                    <option value="0" @if(old('lock',$task->lock)=="0") selected @endif>Open Task</option>
                                    <option value="1" @if(old('lock',$task->lock)=="1") selected @endif>Lock Task</option>
                                </select>

                            </div>



                            <div class="w-full md:w-1/3 flex flex-col items-start gap-2 ">
                                <label for="priority" class="
                                @error('priority')
                                    text-red-500
                                @enderror
                                "> Priority</label>
                                <select disabled name="priority" class="form-select appearance-none
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
                                @error('priority')
                                    border-red-500
                                @enderror
                                " >
                                    <option value="">Select Task Priority</option>
                                    <option value="0" @if(old('priority',$task->priority)=="0") selected @endif>Low</option>
                                    <option value="1" @if(old('priority',$task->priority)=="1") selected @endif>Normal</option>
                                    <option value="2" @if(old('priority',$task->priority)=="2") selected @endif>High</option>
                                </select>

                            </div>



                            <div class="w-full md:w-1/3 flex flex-col items-start gap-2">
                                <label for="status" class="
                                @error('status')
                                    text-red-500
                                @enderror
                                ">Select Status</label>
                                <select disabled name="status" class="form-select appearance-none
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
                                    <option value="">Select Status Type</option>
                                    <option value="0" @if(old('status',$task->status)=="0") selected @endif>Nothing</option>
                                    <option value="1" @if(old('status',$task->status)=="1") selected @endif>Working</option>
                                    <option value="2" @if(old('status',$task->status)=="2") selected @endif>Compelete</option>

                                </select>

                            </div>


                        </div>














                        <div class="mt-8 mb-3 flex gap-3">
                            <a href="{{route('activities.index',['task_id' =>$item->id])}}"
                            class=" w-full text-center block px-6 py-4 bg-blue-800 text-white font-medium text-sm leading-tight uppercase rounded-md shadow-md hover:bg-blue-900 hover:shadow-lg ">
                            Show Activities : {{$task->getActivities()->count()}}</a>


                            @if ($item->lock == 0)
                                <a href="{{route('activities.create',['task_id' =>$task->id])}}"
                                    class=" w-full text-center block px-6 py-4 bg-blue-800 text-white font-medium text-sm leading-tight uppercase rounded-md shadow-md hover:bg-blue-900 hover:shadow-lg ">
                                    Add Activity
                                </a>
                            @endif
                            <a href="{{url()->previous()}}"
                            class=" w-full text-center block px-6 py-4 bg-gray-800 text-white font-medium text-sm leading-tight uppercase rounded-md shadow-md hover:bg-gray-900 hover:shadow-lg ">
                            Back</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>


@endsection

















