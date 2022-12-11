<div>
    <div class="flex flex-col gap-5 p-3 my-5 rounded-md md:flex-row bg-slate-600">
        <div class="w-full p-3 rounded-md md:w-1/4 bg-slate-900">
            <div class="flex flex-col gap-3">
                @foreach ($users as $user)
                    <div wire:click="setSelectedUser({{$user}})"
                     class="flex justify-center p-2 font-semibold rounded-md cursor-pointer bg-slate-300 text-slate-900 hover:bg-slate-400">{{$user->name}}</div>
                @endforeach
            </div>
        </div>
        <div class="w-full p-3 rounded-md md:w-3/4 bg-slate-900">
            <div>
                @if (!is_null($selectedUser))
                    <div class="flex flex-col gap-3 p-2 rounded-md bg-slate-400">
                        <div class="px-1 py-2 rounded-md bg-slate-800 text-slate-100">
                        Your Messages With {{$selectedUser->name}}
                        </div>
                        <div class="h-[300px] bg-slate-300 p-2 rounded-md overflow-y-scroll">
                            <div class="">
                                @foreach ($userMessages as $userMessage)
                                @if ($userMessage->from==auth()->id())
                                    <div class="flex items-center justify-end gap-1">

                                        <div class="flex flex-col p-1 my-2 bg-blue-400 rounded-md">
                                            <span class="text-sm font-semibold">{{$userMessage->body}}</span>
                                            <div class="flex items-center justify-between gap-5">
                                                <span class="text-xs">{{$userMessage->getToFrom->name}}</span>
                                                <span class="text-xs">{{$userMessage->created_at->diffForHumans()}}</span>
                                            </div>
                                        </div>

                                    </div>
                                @else
                                <div class="flex items-center justify-start gap-1">

                                    <div class="flex flex-col p-1 my-2 rounded-md bg-emerald-400">
                                        <span class="text-sm font-semibold">{{$userMessage->body}}</span>
                                        <div class="flex items-center justify-between gap-5">
                                            <span class="text-xs">{{$userMessage->getToFrom->name}}</span>
                                            <span class="text-xs">{{$userMessage->created_at->diffForHumans()}}</span>
                                        </div>
                                    </div>

                                </div>
                                @endif

                                @endforeach
                            </div>
                        </div>
                        <div class="flex w-full gap-3 px-2 py-2 ">
                            <input wire:model.lazy="messageBox" type="text" class="w-full px-2 py-1 rounded-md" placeholder="Type Your Message ... ">
                            <button wire:click="sendMessage" class="p-2 rounded-md bg-slate-800 text-slate-100">Send</button>
                            <button wire:click="setMessages" wire:poll.8000ms='setMessages' class="p-2 rounded-md bg-slate-800 text-slate-100">Refresh</button>
                        </div>
                    </div>
                @else
                    <div class="flex items-center justify-center py-3 text-slate-300">
                        Please Select SomeOne To Send Message
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
