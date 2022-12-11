@extends('layouts.master')

@section('content')





  <div class="container p-2 mx-auto bg-slate-900/80 rounded-xl">








    <div class="my-3">
        <div class="flex items-center gap-3 p-2 text-center text-white bg-slate-800 rounded-xl">
            <div class="flex items-center justify-center">
            <img class="w-16" src="http://127.0.0.1:8000/images/cpnis-logo.png" alt="">
            </div>
            <i class="text-4xl fa-solid fa-comments "></i>
            <h2 class="text-3xl font-semibold">Messages</h2>
        </div>
    </div>




    {{-- <div class="p-3">
        <div class="flex flex-col items-center justify-between md:flex-row">
            <div class="flex flex-col gap-2 text-slate-200">
              <h1 class="text-5xl font-bold">Dashboard</h1>
              <h3 class="text-xl">CPNIS ToDoSystem (Version 1.0)</h3>
            </div>
            <div class="flex flex-col items-end gap-2 text-slate-200">
                <h1 class="text-3xl">Welcome {{auth()->user()->name}}</h1>
            </div>
        </div>
    </div> --}}

    {{-- <div class="h-2 my-5 bg-blue-600 rounded-xl"></div> --}}

    @livewire('message-system')













    </div>






@endsection
