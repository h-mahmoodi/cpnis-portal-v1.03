@extends('layouts.master')

@section('content')


    <div class="container mx-auto my-5 flex flex-col md:flex-row gap-5">








        <div class="w-full md:w-5/12 mx-auto flex flex-col justify-start items-center gap-3 bg-white p-3 overflow-hidden rounded-md">
            <div class="w-full flex items-center justify-center py-4 px-4  bg-gray-100 rounded-md ">
                <div class="">
                    <span class="font-semibold text-xl text-gray-800">
                         ADD NEW TASK
                    </span>
                </div>
                {{-- <div class="flex gap-4">
                    <a href="{{route('tasks.index')}}"
                    class="inline-block px-6 py-2.5 bg-gray-800 text-white font-medium text-sm leading-tight uppercase rounded-xl shadow-md hover:bg-gray-900 hover:shadow-lg ">Back</a>
                </div> --}}
            </div>

            <div class="flex justify-center items-center p-3">
                <img class="w-full" src="{{asset('images/add_task.png')}}" alt="">
            </div>
        </div>





        <div class=" w-full md:w-7/12 mx-auto shadow-xl bg-white p-3 rounded-md">




            @if (count($errors)>0)
                <div class="flex flex-wrap gap-2 my-2 bg-red-100 p-2 rounded-md">
                    @foreach ($errors->all() as $error)
                        <div class="text-center text-xs bg-red-200 text-red-500 py-1 px-2 rounded-md">
                            {{$error}}
                        </div>
                    @endforeach
                </div>
            @endif



            <div class="px-2">
                <div class="">
                    <form action="{{route('tasks.store')}}" method="post" class="">

                        @csrf


                        <div class="flex justify-between gap-3 my-5">

                            <div class="w-full md:w-1/2 flex flex-col items-start gap-2">
                                <label for="type_id" class="
                                @error('type_id')
                                    text-red-500
                                @enderror
                                "> Task Type</label>
                                <select name="type_id" class="form-select appearance-none bg-gray-50
                                block
                                w-full
                                px-3
                                py-1.5
                                text-base
                                font-normal
                                text-gray-700
                             bg-clip-padding bg-no-repeat
                                border border-solid border-gray-300
                                rounded-md
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
                                        <option value="{{$item->id}}" @if(old('type_id')=="$item->id") selected @endif>{{$item->name}}</option>
                                    @endforeach
                                </select>

                            </div>


                            <div class="w-full md:w-1/2 flex flex-col items-start gap-2 ">
                                <label for="priority" class="
                                @error('priority')
                                    text-red-500
                                @enderror
                                "> Priority</label>
                                <select name="priority" class="form-select appearance-none
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
                                @error('priority')
                                    border-red-500
                                @enderror
                                " >
                                    <option value="">Select Task Priority</option>
                                    <option value="0" @if(old('priority')=="0") selected @endif>Low</option>
                                    <option value="1" @if(old('priority')=="1") selected @endif>Normal</option>
                                    <option value="2" @if(old('priority')=="2") selected @endif>High</option>
                                </select>

                            </div>


                        </div>



                        <div class="w-full  flex flex-col items-start gap-2">
                            <label for="teams" class="
                            @error('teams')
                                text-red-500
                            @enderror
                            ">Select Team Members</label>
                            <div class="form-select appearance-none
                            block
                            w-full
                            px-2
                            py-1
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
                            @error('teams')
                                border-red-500
                            @enderror
                            ">
                                <select name="teams[]" id="teams" multiple="multiple">
                                    @if (old('teams'))
                                        @foreach ($users as $user )
                                            <option value="{{$user->id}}"
                                                @if (in_array($user->id,old('teams')))
                                                    selected
                                                @endif
                                                >
                                                {{$user->name}}
                                            </option>
                                        @endforeach
                                    @else
                                        @foreach ($users as $user )
                                                <option value="{{$user->id}}"> {{$user->name}} </option>
                                        @endforeach
                                    @endif

                            </select>
                            </div>

                        </div>

                        <script>

                            $(document).ready(function() {
                                // $('#teams').select2();
                                $("#teams").select2({
                                    placeholder: "First User Start First Activity",
                                    allowClear: true
                                });

                            $("#teams").on("select2:select", function (evt) {
                                var element = evt.params.data.element;
                                var $element = $(element);

                            $element.detach();
                                $(this).append($element);
                                $(this).trigger("change");
                            });
                            });


                        </script>


                        <hr class="my-5">



                        <div class="w-full flex flex-col items-strat  gap-2 my-5">

                            <label for="title" class="
                            @error('title')
                                text-red-500
                            @enderror
                            ">Task Title</label>

                            <input type="text" name="title"  class="
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
                            @error('title')
                                border-red-500
                            @enderror
                            " value="{{old('title')}}" placeholder="Enter The Task or Subject Title">

                        </div>

                        <div class="flex flex-col items-strat  gap-2  my-5">

                            <label for="description" class="
                            @error('description')
                                text-red-500
                            @enderror
                            ">
                            Task Description
                        </label>

                            <textarea name="description" rows="3" class="
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
                            @error('description')
                                border-red-500
                            @enderror
                            "  placeholder="Enter More Description & Details For The Task">{{old('description')}}</textarea>

                        </div>




                        <div class="mt-8 mb-3 flex gap-3">
                            <button type="submit"
                            class=" w-full block px-6 py-4 bg-blue-800 text-white font-medium text-sm leading-tight uppercase rounded-md shadow-md hover:bg-blue-900 hover:shadow-lg ">
                            Save New Task</button>
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

















