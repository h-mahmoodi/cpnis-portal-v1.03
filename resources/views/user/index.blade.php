@extends('layouts.master')

@section('content')



<div class="container mx-auto bg-slate-900/80 p-2 rounded-xl">
    <div class="my-3">
        <div class="text-center text-white flex items-center gap-3 bg-slate-800 p-2 rounded-xl">
            <div class="flex items-center justify-center">
                <img class="w-16" src="http://127.0.0.1:8000/images/cpnis-logo.png" alt="">
            </div>
            <i class="fa-solid fa-binoculars text-4xl "></i>
            <h2 class="text-3xl font-semibold">Users Managment</h2>
        </div>
    </div>

        @livewire('users')
</div>



@endsection
