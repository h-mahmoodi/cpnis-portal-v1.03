<div>
    <div class="w-full p-2 mx-auto rounded-lg owl-carousel owl-theme md:grid-cols-4 bg-slate-900">
        <div class="flex flex-col items-center justify-between gap-1 px-4 py-2 rounded-md cursor-pointer item md:flex-row md:gap-8 text-slate-200 bg-slate-800 hover:bg-red-800 ">
            <div class="flex items-center gap-2 ">
                <div class="text-base font-semibold">IR / Tehran</div>
            </div>
            <div class="flex items-center gap-2 text-sm text-slate-200">
                @livewire('show-time', ['timezone' => 'Asia/Tehran'])
            </div>
        </div>
        <div class="flex flex-col items-center justify-between gap-1 px-4 py-2 rounded-md cursor-pointer item md:flex-row md:gap-8 text-slate-200 bg-slate-800 hover:bg-red-800 ">
            <div class="flex items-center gap-2 ">
                <div class="text-base font-semibold">PH / Manila</div>
            </div>
            <div class="flex items-center gap-2 text-sm text-slate-200">
                @livewire('show-time', ['timezone' => 'Asia/Manila'])
            </div>
        </div>
        <div class="flex flex-col items-center justify-between gap-1 px-4 py-2 rounded-md cursor-pointer item md:flex-row md:gap-8 text-slate-200 bg-slate-800 hover:bg-red-800 ">
            <div class="flex items-center gap-2 ">
                <div class="text-base font-semibold">EN / London</div>
            </div>
            <div class="flex items-center gap-2 text-sm text-slate-200">
                @livewire('show-time', ['timezone' => 'Europe/London'])
            </div>
        </div>
        <div class="flex flex-col items-center justify-between gap-1 px-4 py-2 rounded-md cursor-pointer item md:flex-row md:gap-8 text-slate-200 bg-slate-800 hover:bg-red-800 ">
            <div class="flex items-center gap-2 ">
                <div class="text-base font-semibold">CA / Toronto</div>
            </div>
            <div class="flex items-center gap-2 text-sm text-slate-200">
                @livewire('show-time', ['timezone' => 'Canada/Eastern'])
            </div>
        </div>
        {{-- <div class="flex flex-col items-center justify-center gap-1 px-4 py-2 text-slate-200 bg-slate-900 rounded-xl">
            <div class="flex items-center gap-2 ">
                <div class="text-xl font-semibold">Canada / Montreal</div>
            </div>
            <div class="flex items-center gap-2 text-lg font-semibold text-slate-400">
                @livewire('show-time')
            </div>
        </div> --}}
    </div>
    <script>
        $('.owl-carousel').owlCarousel({
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
            items:5
        }
    }
})
    </script>
</div>
