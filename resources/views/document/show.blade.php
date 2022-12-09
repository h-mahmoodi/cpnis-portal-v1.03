@extends('layouts.master')

@section('content')


<div class="container mx-auto">
    <div class="flex flex-col gap-3 my-5 text-slate-300">

        <div class="flex justify-between items-center">
            <div class="flex flex-col gap-3  rounded-xl">
                <div class="flex items-center  w-full gap-8 font-semibold leading-tight rounded-xl text-slate-300">
                    <i class=" text-6xl fa-solid fa-folder rounded-xl  "></i>
                    <span class="text-5xl font-semibold">  Documents Details</span>
                </div>
                <div class="flex gap-3 text-base font-semibold">
                    <div class="flex gap-2">
                        @if ($document->lock==0)
                            <a class="flex items-center gap-1  text-orange-600   p-2 rounded-lg bg-slate-800">
                                <i class="text-xl fa-solid fa-lock"></i>
                                <div class="text-sm">Lock</div>
                            </a>
                        @elseif ($document->lock==1)
                            <a class="flex items-center gap-1  text-emerald-600  p-2 rounded-lg bg-slate-800" >
                                <i class="text-xl fa-solid fa-lock-open"></i>
                                <div class="text-sm">Open</div>
                            </a>
                        @endif


                        @if ($document->status==2)
                            <a class="flex items-center gap-1 text-xl text-emerald-600  p-2 rounded-lg bg-slate-800">
                                <i class="text-xl fa-solid fa-circle-check"></i>
                                <div class="text-sm">Complete</div>
                            </a>
                        @elseif ($document->status==1)
                            <a class="flex items-center gap-1 text-xl text-orange-600  p-2 rounded-lg bg-slate-800">
                                <i class="text-xl fa-solid fa-circle-dot"></i>
                                <div class="text-sm">Working</div>
                            </a>
                        @elseif ($document->status==0)
                            <a class="flex items-center gap-1 text-xl text-slate-500  p-2 rounded-lg bg-slate-800">
                                <i class="text-xl fa-solid fa-circle"></i>
                                <div class="text-sm">empty</div>
                            </a>
                        @endif
                    </div>
                    <div class="p-2 bg-slate-800 rounded-lg">
                        Created At : 2
                    </div>
                    <div class="p-2 bg-slate-800 rounded-lg">
                        Tasks : 2
                    </div>
                    <div  class="p-2 bg-slate-800 rounded-lg">
                        Activities : 12
                    </div>
                </div>
            </div>

            <div>
                <a class="flex items-center justify-center px-4 py-3 text-xl font-bold transition-all duration-200 bg-slate-800 text-slate-300 rounded-xl hover:scale-95"
                href="{{route('documents.index')}}">
                <span class="text-xl">Back To All</span>
               </a>
            </div>
        </div>

        <div class="h-2 my-5 bg-yellow-600 rounded-xl"></div>


        <div class="flex gap-3">
            <div class="w-6/12 p-5 rounded-xl bg-slate-800">


                <div class="flex flex-col gap-3 ">

                    <div class="flex gap-3 justify-between">
                        <div class="flex gap-1 justify-between items-center bg-blue-900 p-3 rounded-xl text-slate-300 font-semibold">
                            <div class=""> Document Id :  </div>
                            <div>#{{$document->id}}</div>
                        </div>

                    </div>

                    <div class="flex gap-1 justify-between items-center bg-slate-300 p-3 rounded-xl text-slate-900 font-semibold">
                        <div class="">Document Title : </div>
                        <div>{{$document->title}}</div>
                    </div>

                    <div class="flex flex-col justify-between  bg-slate-300 p-3 rounded-xl text-slate-900 font-semibold">
                        <div class="">Document Description : </div>
                        <div>{{$document->description}}</div>
                    </div>

                    <hr class="my-3 border-slate-500">




                    <div class="flex gap-3 justify-between">
                        <div class="flex gap-1 justify-between items-center bg-slate-300 p-3 rounded-xl text-slate-900 font-semibold">
                            <div class="">Created By : </div>
                            <div>{{$document->issue_date}}</div>
                        </div>
                        <div class="flex gap-1 justify-between items-center bg-slate-300 p-3 rounded-xl text-slate-900 font-semibold">
                            <div class="">Created At : </div>
                            <div>{{$document->created_at->diffForHumans()}}</div>
                        </div>
                    </div>




                </div>
            </div>
            <div class="w-6/12 p-3 ">


                <div class="flex flex-col gap-3">


                    <div class="p-3 rounded-xl bg-slate-300 text-slate-800 font-semibold flex flex-col gap-2">
                        <div class="flex justify-between  text-sm">
                            <div>
                                Task Id : #422
                            </div>
                            <div>
                                Assign To : hesam
                            </div>
                        </div>
                        <hr>
                        <div>
                            Document DetailsDocument Id :#123
                        </div>
                        <hr>
                        <div class="flex justify-between text-slate-800 text-sm">
                            <div>
                                 Waiting
                            </div>
                            <div>
                                7 days ago
                           </div>
                        </div>

                    </div>



                </div>
            </div>
        </div>

    </div>
</div>













@endsection
