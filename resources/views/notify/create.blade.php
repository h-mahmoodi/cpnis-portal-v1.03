@extends('layouts.master')

@section('content')


    <div class="container mx-auto my-5">
        <div class="shadow bg-white p-5 rounded-xl mb-5">


            <div class="flex justify-between mb-3">
                <div class="mt-3">
                    <span class="font-bold text-xl">
                        Add New Document
                    </span>
                </div>
                <div class="flex gap-4 mt-3">
                    <a href="{{route('index')}}" class="btn btn-secondary mr-3 font-bold">Back To Document List</a>
                    <a href="/register" class="btn btn-primary mr-3 font-bold">Add New Document</a>
                </div>
            </div>

        </div>







        <div class="grid grid-cols-4 gap-5 mb-5">
            @foreach ($errors->all() as $error)
                <div class="shadow bg-red-500 text-white px-3 py-2 rounded-xl">
                    {{$error}}
                </div>
            @endforeach
        </div>




        <div class="shadow bg-white p-8 rounded-xl mb-5 max-w-max mx-auto">


            <div class="">
                <div class="">
                    <form action="{{route('store')}}" method="post" class="">

                        @csrf
                        <div class="flex items-center gap-5 justify-between text-lg my-5">

                            <label for="document_id" class="
                            @error('document_id')
                                text-red-500
                            @enderror
                            ">Document ID</label>

                            <input name="document_id" class="
                            border border-gray-300 rounded-lg px-3 py-1 shadow-sm focus:outline-none
                            @error('document_id')
                                border-red-500
                            @enderror
                            "type="text" value="{{old('document_id')}}">

                        </div>


                        <hr>

                        <div class="flex items-center gap-5 justify-between text-lg my-5">
                            <label for="first_name" class="
                            @error('first_name')
                                text-red-500
                            @enderror
                            ">Name</label>
                            <input name="first_name" class="
                            border border-gray-300 rounded-lg px-3 py-1 shadow-sm focus:outline-none
                            @error('first_name')
                                border-red-500
                            @enderror
                            " type="text"  value="{{old('first_name')}}">
                        </div>





                        <div class="flex items-center gap-5 justify-between text-lg my-5">
                            <label for="last_name" class="
                            @error('last_name')
                                text-red-500
                            @enderror
                            ">Family</label>
                            <input name="last_name" class="
                            border border-gray-300 rounded-lg px-3 py-1 shadow-sm focus:outline-none
                            @error('last_name')
                                border-red-500
                            @enderror
                            " type="text" value="{{old('last_name')}}">
                        </div>

                        <hr>

                        <div class="flex items-center gap-5 justify-between text-lg my-5">
                            <label for="email" class="
                            @error('email')
                                text-red-500
                            @enderror
                            ">Email</label>
                            <input name="email" class="
                            border border-gray-300 rounded-lg px-3 py-1 shadow-sm focus:outline-none
                            @error('email')
                                border-red-500
                            @enderror
                            " type="text" value="{{old('email')}}">
                        </div>

                        <div class="flex items-center gap-5 justify-between text-lg my-5">
                            <label for="mobile" class="
                            @error('mobile')
                                text-red-500
                            @enderror
                            ">Mobile Number</label>
                            <input name="mobile" class="
                            border border-gray-300 rounded-lg px-3 py-1 shadow-sm focus:outline-none
                            @error('mobile')
                                border-red-500
                            @enderror
                            " type="text" value="{{old('mobile')}}">
                        </div>

                        <hr>

                        <div class="flex items-center gap-5 justify-between text-lg my-5">
                            <label for="submit_date" class="
                            @error('submit_date')
                                text-red-500
                            @enderror
                            ">IELTS Submited Date</label>
                            <input name="submit_date" class="
                            border border-gray-300 rounded-lg px-3 py-1 shadow-sm focus:outline-none
                            @error('submit_date')
                                border-red-500
                            @enderror
                            " type="date" value="{{old('submit_date')}}">
                        </div>

                        <div class="mt-8 mb-3">
                            <button type="submit" class="btn btn-primary mr-3 font-bold w-full">Save New Document</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>


@endsection

















