<div>
    <div class="owl-carousel owl-theme container mx-auto w-full grid grid-cols-2 md:grid-cols-4 gap-5 bg-slate-900 p-2 rounded-lg">
        <div class="item cursor-pointer flex flex-col md:flex-row items-center justify-between gap-1 md:gap-8 text-slate-200 bg-slate-800 hover:bg-red-700 rounded-md py-2 px-4 ">
            <div class="flex items-center gap-2 ">
                <div class="text-base font-semibold">IR / Tehran</div>
            </div>
            <div class="flex gap-2 items-center text-sm text-slate-200">
                @livewire('show-time', ['timezone' => 'Asia/Tehran'])
            </div>
        </div>
        <div class="item cursor-pointer flex flex-col md:flex-row items-center justify-between gap-1 md:gap-8 text-slate-200 bg-slate-800 hover:bg-red-700 rounded-md py-2 px-4 ">
            <div class="flex items-center gap-2 ">
                <div class="text-base font-semibold">PH / Manila</div>
            </div>
            <div class="flex gap-2 items-center text-sm text-slate-200">
                @livewire('show-time', ['timezone' => 'Asia/Manila'])
            </div>
        </div>
        <div class="item cursor-pointer flex flex-col md:flex-row items-center justify-between gap-1 md:gap-8 text-slate-200 bg-slate-800 hover:bg-red-700 rounded-md py-2 px-4 ">
            <div class="flex items-center gap-2 ">
                <div class="text-base font-semibold">EN / London</div>
            </div>
            <div class="flex gap-2 items-center  text-sm text-slate-200">
                @livewire('show-time', ['timezone' => 'Europe/London'])
            </div>
        </div>
        <div class="item cursor-pointer flex flex-col md:flex-row items-center justify-between gap-1 md:gap-8 text-slate-200 bg-slate-800 hover:bg-red-700 rounded-md py-2 px-4 ">
            <div class="flex items-center gap-2 ">
                <div class="text-base font-semibold">CA / Toronto</div>
            </div>
            <div class="flex gap-2 items-center  text-sm text-slate-200">
                @livewire('show-time', ['timezone' => 'Canada/Eastern'])
            </div>
        </div>
        {{-- <div class="flex flex-col items-center justify-center gap-1 text-slate-200 bg-slate-900 rounded-xl py-2 px-4">
            <div class="flex items-center gap-2 ">
                <div class="text-xl font-semibold">Canada / Montreal</div>
            </div>
            <div class="flex gap-2 items-center font-semibold text-lg text-slate-400">
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
            items:4
        }
    }
})
    </script>
</div>
