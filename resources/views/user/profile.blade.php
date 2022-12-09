@extends('layouts.master')

@section('content')



<div class="container mx-auto bg-slate-900/80 p-2 rounded-xl">
    <div class="my-3">
        <div class="text-center text-white flex items-center gap-3 bg-slate-800 p-2 rounded-xl">
            <div class="flex items-center justify-center">
                <img class="w-16" src="http://127.0.0.1:8000/images/cpnis-logo.png" alt="">
            </div>
            <i class="fa-solid fa-user text-4xl "></i>
            <h2 class="text-3xl font-semibold">Users Profile</h2>
        </div>
    </div>


    <div class="flex">
        <form action="{{route('user.profile.changepassword')}}" method="post" class="bg-slate-800 p-5 rounded-xl w-full md:w-auto">

            @csrf

            @method('post')



            @if (count($errors)>0)
            <div class="flex flex-wrap gap-2 my-2 bg-red-100 p-2 rounded-xl">
                @foreach ($errors->all() as $error)
                    <div class="text-center text-xs bg-red-200 text-red-500 py-1 px-2 rounded-xl">
                        {{$error}}
                    </div>
                @endforeach
            </div>
        @endif

            <div class=" flex flex-col gap-5">

                <div class="w-full md:w-64 flex flex-col items-strat  gap-2">

                    <label for="password" class="text-slate-300
                    @error('password')
                        text-red-500
                    @enderror
                    ">New Password</label>

                    <input type="password" name="password" class="
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
                    @error('password')
                        border-red-500
                    @enderror
                    " >

                </div>

                <div class="w-full md:w-64 flex flex-col items-strat  gap-2">

                    <label for="password_confirmation" class="text-slate-300
                    @error('password_confirmation')
                        text-red-500
                    @enderror
                    ">Password Confirmation</label>

                    <input type="password" name="password_confirmation" class="
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
                    @error('password_confirmation')
                        border-red-500
                    @enderror
                    " >

                </div>

                <button type="submit"
                class=" w-full px-4 py-4 bg-slate-900 text-white font-medium text-sm  uppercase rounded-xl shadow-md hover:bg-blue-900 hover:shadow-lg ">
                Save New Password </button>
            </div>

        </form>
    </div>

</div>



@endsection
