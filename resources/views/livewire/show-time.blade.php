<div>
    <div wire:poll.60000ms class="w-full flex gap-3">
        <div>
            {{-- <i class="fas fa-clock text-xl"></i> --}}
            {{$time->format('H:i')}}
        </div>
        <div>
            {{-- <i class="fas fa-calendar  text-xl"></i> --}}
            {{$time->format('Y/m/d')}}
        </div>

    </div>
</div>
