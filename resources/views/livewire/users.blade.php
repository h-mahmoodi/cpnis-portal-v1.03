<div>
    <div class="container mx-auto my-5">
        <div class="shadow bg-white p-5 rounded-xl">



            <div class=" mt-3">
                <div class="min-w-full shadow rounded-xl overflow-hidden">
                    <table class="table-auto text-left w-full">
                        <thead class="">
                            <tr class=" bg-gray-800 text-white rounded font-medium">
                                <th class="p-3">id</th>
                                <th class="p-3">Name</th>
                                <th class="p-3">Email</th>
                                <th class="p-3"></th>

                              </tr>
                        </thead>
                        <tbody >
                            @foreach ($users as $item)
                            <tr class="border-b hover:bg-gray-100">
                                <td class="p-3">{{$item->id}}</td>
                                <td class="p-3">{{$item->name}}</td>
                                <td class="p-3">{{$item->email}}</td>

                                <td class="p-3">
                                    <div class="flex gap-2">
                                        <a  class="cursor-pointer"  wire:click="changeRole({{$item}})">
                                            @if ($item->role==0)
                                                <span class="bg-blue-600 text-slate-200 py-2 px-4   rounded-lg text-slate-200">
                                                    Normal User
                                                </span>
                                            @elseif ($item->role==1)
                                                <span class="bg-yellow-600 text-slate-200 py-2 px-4   rounded-lg text-slate-200">
                                                    Admin User
                                                </span>
                                            @elseif ($item->role==2)
                                                <span class="bg-indigo-700 text-slate-200 py-2 px-4   rounded-lg text-slate-200">
                                                    Owner
                                                </span>
                                            @endif

                                        </a>

                                        <a class="cursor-pointer" wire:click="changeStatus({{$item}})">
                                            @if ($item->status==0)
                                                <span class="bg-green-800 text-slate-200 py-2 px-4   rounded-lg text-slate-200">
                                                    Activate
                                                </span>
                                            @elseif ($item->status==1)
                                                <span class="bg-red-800 text-slate-200 py-2 px-4   rounded-lg text-slate-200">
                                                    Deactivate
                                                </span>
                                            @endif

                                        </a>
                                        {{-- <a class="cursor-pointer" wire:click="delete({{$item->id}})">
                                            <span class="bg-red-800 text-slate-200 py-2 px-4   rounded-lg text-slate-200">
                                                Delete
                                            </span>
                                        </a> --}}
                                    </div>
                                </td>


                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="my-3">
            {{-- {{ $users->links() }} --}}
        </div>
    </div>
</div>
