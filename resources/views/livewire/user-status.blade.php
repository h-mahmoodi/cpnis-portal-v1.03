<div>
    <div>
        <div class="w-full p-2 mx-auto rounded-lg owl-carousel owl-userstatus owl-theme md:grid-cols-4 bg-slate-900">

            @foreach ($users as $user)
                <div class="flex flex-col items-center justify-between gap-1 px-4 py-2 rounded-md cursor-pointer item md:flex-row md:gap-8 text-slate-200 bg-slate-800 hover:bg-red-800 ">
                    <div class="flex items-center gap-2 ">
                        <div class="text-xs font-semibold">{{$user->name}}</div>
                    </div>
                    <div class="flex items-center gap-2 text-xs text-slate-200">
                        @if(\Carbon\Carbon::now()->diffInSeconds($user->updated_at)<30)
                            <i class="fa-solid fa-circle text-emerald-600"></i>
                            <span class="text-success">Online</span>
                        {{-- @elseif(\Carbon\Carbon::now()->diffInSeconds($user->updated_at) < 120 && \Carbon\Carbon::now()->diffInSeconds($user->updated_at) > 31)
                            <i class="text-orange-600 fa-solid fa-circle"></i>
                            <span class="text-secondary">Idle</span> --}}
                        @else
                            <i class="fa-solid fa-circle text-slate-600"></i>
                            <span class="text-secondary">Offline</span>
                        @endif
                    </div>
                </div>
            @endforeach

        </div>
    </div>


    <script>
        $('.owl-carousel.owl-userstatus').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    dots:false,
    responsive:{
        0:{
            items:2
        },
        600:{
            items:3
        },
        1000:{
            items:8
        }
    }
})
    </script>

</div>
