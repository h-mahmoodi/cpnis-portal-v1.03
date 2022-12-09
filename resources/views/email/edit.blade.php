@extends('layouts.master')

@section('content')


    <div class="container mx-auto my-5">
        <div class="shadow bg-white p-5 rounded-xl mb-5">


            <div class="flex justify-between mb-3">
                <div class="mt-3">
                    <span class="font-bold text-xl">
                        Edit Email Notification Details
                    </span>
                </div>
                <div class="flex gap-4 mt-3">
                    <a href="{{route('index')}}" class="btn btn-secondary mr-3 font-bold">Back To Document List</a>
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




        <div x-data="{tab: 'tab1'}">

            <div class="flex justify-center gap-5 max-w-max mx-auto">
                <div @click="tab='tab1'" class="shadow bg-white p-3 rounded-xl mb-5 mx-auto cursor-pointer">
                    IELTS
                </div>
                <div @click="tab='tab2'" class="shadow bg-white p-3 rounded-xl mb-5 mx-auto cursor-pointer">
                    ReSubmite
                </div>
                <div @click="tab='tab3'" class="shadow bg-white p-3 rounded-xl mb-5 mx-auto cursor-pointer">
                    Remind Me
                </div>

            </div>

            <div>
                <div x-show="tab==='tab1'" class="shadow bg-white p-8 rounded-xl mb-5 max-w-max mx-auto">
                    <div class="">
                        <h3 class="text-xl font-bold pb-3">IELTS</h3>
                        <hr>
                        <div class="">
                            <form action="{{route('email.update')}}" method="post" class="">

                                @csrf
                                @method('PUT')


                                <div class="flex items-center gap-5 justify-between text-md my-5">
                                    <input name="type" hidden class="
                                    border border-gray-300 rounded-lg px-3 py-1 shadow-sm focus:outline-none
                                    @error('type')
                                        border-red-500
                                    @enderror
                                    " type="text"  value="{{old('type',$emails[0]->type)}}">
                                </div>

                                <div class="flex items-center gap-5 justify-between text-md my-5">
                                    <label for="name" class=" font-bold
                                    @error('name')
                                        text-red-500
                                    @enderror
                                    ">Name</label>
                                    <input name="name" class="
                                    border border-gray-300 rounded-lg px-3 py-1 shadow-sm focus:outline-none
                                    @error('name')
                                        border-red-500
                                    @enderror
                                    " type="text"  value="{{old('name',$emails[0]->name)}}">
                                </div>


                                <div class="flex items-center gap-5 justify-between text-md my-5">
                                    <label for="email" class="font-bold
                                    @error('email')
                                        text-red-500
                                    @enderror
                                    ">Email</label>
                                    <input name="email" class="
                                    border border-gray-300 rounded-lg px-3 py-1 shadow-sm focus:outline-none
                                    @error('email')
                                        border-red-500
                                    @enderror
                                    " type="text" value="{{old('email',$emails[0]->email)}}">
                                </div>



                                <div class="flex items-center gap-5 justify-between text-md my-5">
                                    <label for="subject" class="font-bold
                                    @error('subject')
                                        text-red-500
                                    @enderror
                                    ">Subject</label>
                                    <input name="subject" class="
                                    border border-gray-300 rounded-lg px-3 py-1 shadow-sm focus:outline-none
                                    @error('subject')
                                        border-red-500
                                    @enderror
                                    " type="text" value="{{old('subject',$emails[0]->subject)}}">
                                </div>

                                <hr>

                                <div class="flex flex-col items-center gap-5 justify-between text-md my-5">
                                    <label for="text" class=" text-left w-full font-bold
                                    @error('text')
                                        text-red-500
                                    @enderror
                                    ">IELTS Submited Date</label>
                                    <textarea name="text" class="
                                    border border-gray-300 rounded-lg px-3 py-1 shadow-sm focus:outline-none
                                    @error('text')
                                        border-red-500
                                    @enderror
                                    " cols="30" rows="10">{{old('text',$emails[0]->text)}}</textarea>

                                </div>

                                <div class="mt-8 mb-3">
                                    <button type="submit" class="btn btn-primary mr-3 font-bold w-full">Save Email Details</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

                <div x-show="tab==='tab2'" class="shadow bg-white p-8 rounded-xl mb-5 max-w-max mx-auto">
                    <div class="">
                        <h3 class="text-xl font-bold pb-3">ReSumite</h3>
                        <hr>
                        <div class="">
                            <form action="{{route('email.update')}}" method="post" class="">

                                @csrf
                                @method('PUT')

                                <div class="flex items-center gap-5 justify-between text-md my-5">
                                    <input name="type" hidden class="
                                    border border-gray-300 rounded-lg px-3 py-1 shadow-sm focus:outline-none
                                    @error('type')
                                        border-red-500
                                    @enderror
                                    " type="text"  value="{{old('type',$emails[1]->type)}}">
                                </div>



                                <div class="flex items-center gap-5 justify-between text-md my-5">
                                    <label for="name" class=" font-bold
                                    @error('name')
                                        text-red-500
                                    @enderror
                                    ">Name</label>
                                    <input name="name" class="
                                    border border-gray-300 rounded-lg px-3 py-1 shadow-sm focus:outline-none
                                    @error('name')
                                        border-red-500
                                    @enderror
                                    " type="text"  value="{{old('name',$emails[1]->name)}}">
                                </div>


                                <div class="flex items-center gap-5 justify-between text-md my-5">
                                    <label for="email" class="font-bold
                                    @error('email')
                                        text-red-500
                                    @enderror
                                    ">Email</label>
                                    <input name="email" class="
                                    border border-gray-300 rounded-lg px-3 py-1 shadow-sm focus:outline-none
                                    @error('email')
                                        border-red-500
                                    @enderror
                                    " type="text" value="{{old('email',$emails[1]->email)}}">
                                </div>



                                <div class="flex items-center gap-5 justify-between text-md my-5">
                                    <label for="subject" class="font-bold
                                    @error('subject')
                                        text-red-500
                                    @enderror
                                    ">Subject</label>
                                    <input name="subject" class="
                                    border border-gray-300 rounded-lg px-3 py-1 shadow-sm focus:outline-none
                                    @error('subject')
                                        border-red-500
                                    @enderror
                                    " type="text" value="{{old('subject',$emails[1]->subject)}}">
                                </div>

                                <hr>

                                <div class="flex flex-col items-center gap-5 justify-between text-md my-5">
                                    <label for="text" class=" text-left w-full font-bold
                                    @error('text')
                                        text-red-500
                                    @enderror
                                    ">IELTS Submited Date</label>
                                    <textarea name="text" class="
                                    border border-gray-300 rounded-lg px-3 py-1 shadow-sm focus:outline-none
                                    @error('text')
                                        border-red-500
                                    @enderror
                                    " cols="30" rows="10">{{old('text',$emails[1]->text)}}</textarea>

                                </div>

                                <div class="mt-8 mb-3">
                                    <button type="submit" class="btn btn-primary mr-3 font-bold w-full">Save Email Details</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

                <div x-show="tab==='tab3'" class="shadow bg-white p-8 rounded-xl mb-5 max-w-max mx-auto">
                    <div class="">
                        <h3 class="text-xl font-bold pb-3">Remind Me</h3>
                        <hr>
                        <div class="">
                            <form action="{{route('email.update')}}" method="post" class="">

                                @csrf
                                @method('PUT')


                                <div class="flex items-center gap-5 justify-between text-md my-5">
                                    <input name="type" hidden class="
                                    border border-gray-300 rounded-lg px-3 py-1 shadow-sm focus:outline-none
                                    @error('type')
                                        border-red-500
                                    @enderror
                                    " type="text"  value="{{old('type',$emails[2]->type)}}">
                                </div>

                                <div class="flex items-center gap-5 justify-between text-md my-5">
                                    <label for="name" class=" font-bold
                                    @error('name')
                                        text-red-500
                                    @enderror
                                    ">Name</label>
                                    <input name="name" class="
                                    border border-gray-300 rounded-lg px-3 py-1 shadow-sm focus:outline-none
                                    @error('name')
                                        border-red-500
                                    @enderror
                                    " type="text"  value="{{old('name',$emails[2]->name)}}">
                                </div>


                                <div class="flex items-center gap-5 justify-between text-md my-5">
                                    <label for="email" class="font-bold
                                    @error('email')
                                        text-red-500
                                    @enderror
                                    ">Email</label>
                                    <input name="email" class="
                                    border border-gray-300 rounded-lg px-3 py-1 shadow-sm focus:outline-none
                                    @error('email')
                                        border-red-500
                                    @enderror
                                    " type="text" value="{{old('email',$emails[2]->email)}}">
                                </div>



                                <div class="flex items-center gap-5 justify-between text-md my-5">
                                    <label for="subject" class="font-bold
                                    @error('subject')
                                        text-red-500
                                    @enderror
                                    ">Subject</label>
                                    <input name="subject" class="
                                    border border-gray-300 rounded-lg px-3 py-1 shadow-sm focus:outline-none
                                    @error('subject')
                                        border-red-500
                                    @enderror
                                    " type="text" value="{{old('subject',$emails[2]->subject)}}">
                                </div>

                                <hr>

                                <div class="flex flex-col items-center gap-5 justify-between text-md my-5">
                                    <label for="text" class=" text-left w-full font-bold
                                    @error('text')
                                        text-red-500
                                    @enderror
                                    ">IELTS Submited Date</label>
                                    <textarea name="text" class="
                                    border border-gray-300 rounded-lg px-3 py-1 shadow-sm focus:outline-none
                                    @error('text')
                                        border-red-500
                                    @enderror
                                    " cols="30" rows="10">{{old('text',$emails[2]->text)}}</textarea>

                                </div>

                                <div class="mt-8 mb-3">
                                    <button type="submit" class="btn btn-primary mr-3 font-bold w-full">Save Email Details</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>


@endsection

















