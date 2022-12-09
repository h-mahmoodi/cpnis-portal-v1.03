@extends('layouts.master')

@section('content')


<div class="container mx-auto my-5">



    <div class="shadow-xl bg-white p-3 rounded mb-5 w-full md:w-4/12 mx-auto">

        <div class="flex items-center justify-between py-4 px-4  bg-gray-100 rounded ">
            <div class="">
                <span class="font-semibold text-lg text-gray-800">
                     New Document Type
                </span>
            </div>
            <div class="flex gap-4">
                <a href="{{route('documents.types.index')}}"
                class="inline-block px-6 py-2.5 bg-gray-800 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-900 hover:shadow-lg ">
                Back </a>
            </div>
        </div>



        {{-- <div class="grid grid-cols-1 gap-2 my-2">
            @foreach ($errors->all() as $error)
                <div class="text-xs bg-red-200 text-red-500 px-2 py-2 rounded">
                    {{$error}}
                </div>
            @endforeach
        </div> --}}


        <div class="px-2">
            <div class="">
                <form action="{{route('documents.types.store')}}" method="post" class="">

                    @csrf


                    <div class="flex justify-between gap-3  my-5">

                        <div class="w-full flex flex-col items-strat  gap-2">

                            <label for="name" class="
                            @error('name')
                                text-red-500
                            @enderror
                            ">Document Type Name</label>

                            <input type="text" name="name"  class="
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
                            rounded
                            transition
                            ease-in-out
                            m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                            @error('name')
                                border-red-500
                            @enderror
                            " value="{{old('name')}}">

                        </div>

                    </div>


                    <div class="mt-8 mb-3">
                        <button type="submit"
                        class=" w-full block px-6 py-4 bg-gray-800 text-white font-medium text-sm leading-tight uppercase rounded shadow-md hover:bg-gray-900 hover:shadow-lg ">
                        Save New </button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>


{{-- ----------------------- --}}





@endsection

















