@extends('layouts.master')

@section('content')



<div class="container mx-auto bg-slate-900/80 p-2 rounded-xl">
    <div class="my-3 flex justify-between bg-slate-800 p-2 rounded-md items-center">
        <div class="text-center text-white flex items-center gap-3 bg-slate-800 p-2 rounded-xl">
            <div class="flex items-center justify-center">
                <img class="w-16" src="http://127.0.0.1:8000/images/cpnis-logo.png" alt="">
            </div>
            <i class="fa-solid fa-binoculars text-4xl "></i>
            <h2 class="text-3xl font-semibold">Users Managment</h2>
        </div>
        <div class="flex flex-col md:flex-row gap-3">
            <a href="{{route('setting.edit')}}"
            class="flex items-center gap-2 px-6 py-4 text-base font-medium leading-tight uppercase transition-all duration-200 bg-slate-900 text-slate-300 rounded-md hover:scale-95 "
            >
            <span>Invitation Code</span>
        </a>
            <a href="{{route('users.add')}}"
            class="flex items-center gap-2 px-6 py-4 text-base font-medium leading-tight uppercase transition-all duration-200 bg-blue-900 text-slate-300 rounded-md hover:scale-95 "
            >
            <i class="fas fa-plus"></i>
            <span>Add New User</span>
        </a>
        </div>
    </div>

        @livewire('users')
</div>



@endsection
