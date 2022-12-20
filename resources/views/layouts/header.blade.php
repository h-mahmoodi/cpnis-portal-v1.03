<div class="container flex items-center justify-between gap-2 mx-auto my-2 text-orange-600">
            <div class="flex items-center">
                <img class="w-16 md:w-20" src="{{asset('images/cpnis-logo.png')}}" alt="">
                <div>
                    <h1 class="text-2xl font-semibold text-white md:text-3xl">CPNIS Portal</h1>
                    <h3 class="text-xs md:text-base text-slate-400">Users Working System v1.3</h3>
                </div>
            </div>
            <div class="flex justify-center p-2 text-xl rounded-lg ">
                <div class="relative dropdown">

                    <a class="flex items-center justify-center gap-2 px-4 py-1 transition-all duration-200 bg-red-800 rounded-md nav-link text-slate-100 hover:scale-95"
                    href="#" id="dropdownMenuButton1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="flex items-center justify-between gap-2">
                            <div class="flex flex-col">
                                <div class="flex flex-col items-end">
                                    <span class="text-base font-semibold">Hi {{auth()->user()->name}}</span>
                                    {{-- <span class="text-xs">
                                        @if (auth()->user()->role==2)
                                            Super Admin
                                        @elseif (auth()->user()->role==1)
                                            Admin
                                        @elseif (auth()->user()->role==0)
                                            Normal User
                                        @endif
                                    </span> --}}
                                    <span class="text-xs">
                                        {{auth()->user()->email}}
                                    </span>
                                </div>

                            </div>
                            <i class="p-1 text-4xl rounded-lg fa-solid fa-bars text-slate-100"></i>

                        </div>
                    </a>

                <ul class="absolute right-0 left-auto z-50 hidden float-left py-2 m-0 mt-1 text-base text-left list-none bg-white border-none rounded-lg shadow-lg dropdown-menu min-w-max bg-clip-padding" aria-labelledby="dropdownMenuButton1">
                <li>
                    <a class="block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-transparent dropdown-item whitespace-nowrap hover:bg-gray-100" href="{{route('user.profile')}}">Change Password</a>
                  </li>
                  <li>
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        @method('post')
                        <button class="block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-transparent dropdown-item whitespace-nowrap hover:bg-gray-100" type="submit">Exit</button>
                    </form>
                  </li>


                </ul>
              </div>
            </div>
</div>



<nav class="relative flex flex-wrap items-center justify-center w-full py-2 shadow-lg bg-slate-700 text-slate-200 hover:text-slate-400 focus:text-slate-400 navbar navbar-expand-lg navbar-light">
  <div class="container flex flex-wrap items-center justify-between w-full px-6 mx-auto">
  <button class="
      navbar-toggler
      text-slate-200
      border-0
      hover:shadow-none hover:no-underline
      py-2
      px-2.5
      bg-transparent
      focus:outline-none focus:ring-0 focus:shadow-none focus:no-underline
    " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bars"
    class="w-6" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
    <path fill="currentColor"
      d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z">
    </path>
  </svg>
  </button>
  <div class="flex-grow collapse navbar-collapse" id="navbarSupportedContent">

    <!-- Left links -->
    <ul class="flex flex-col gap-1 pl-0 navbar-nav list-style-none">
        <li class="p-1 nav-item">
            <a class="nav-link flex justify-center items-center gap-2 text-slate-300  hover:scale-95 py-2 px-4 rounded-md transition-all duration-200
            @if (Request::routeIs('index'))
             bg-red-800 font-semibold
             @else
             bg-slate-800
            @endif
            " href="{{route('index')}}">
                <i class="text-xl fa-solid fa-home "></i>
                <span class="text-lg text-slate-300">  Dashboard</span>
            </a>
        </li>
        {{-- <li class="p-2 nav-item">
            <a class="flex items-center justify-center gap-2 px-4 py-2 text-gray-200 transition-all duration-200 nav-link bg-slate-800 hover:scale-95 rounded-xl" href="{{route('documents.index')}}">
                <i class="text-xl fa-solid fa-folder rounded-xl bg-slate-800 text-slate-200"></i>
                <span class="text-base font-bold text-slate-200">  Subjects </span>
            </a>
        </li> --}}

        <li class="p-1 nav-item">
            <a class="relative nav-link flex justify-center items-center gap-2 text-slate-300  hover:scale-95 py-2 px-4 rounded-md transition-all duration-200
            @if (Request::routeIs('tasks.*'))
            bg-red-800 font-semibold
            @else
            bg-slate-800
            @endif
          " href="{{route('tasks.index')}}">
                <i class="text-xl fas fa-code-fork"></i>
                <span class="text-lg ">  Tasks </span>
                @if ($userTasksCount>0)
                    <span class="absolute px-2 bg-red-900 rounded-full -top-2 -right-2 text-slate-200">{{$userTasksCount}}</span>
                @endif
            </a>
        </li>

        <li class="p-1 nav-item">
            <a class="relative nav-link flex justify-center items-center gap-2 text-slate-300  hover:scale-95 py-2 px-4 rounded-md transition-all duration-200
              @if (Request::routeIs('activities.*'))
              bg-red-800 font-semibold
              @else
              bg-slate-800
             @endif
            " href="{{route('activities.index')}}">
                <i class="text-xl fa-solid fa-code-pull-request"></i>
                <span class="text-lg ">  Activities </span>
                @if ($userActivitiesCount>0)
                    <span class="absolute px-2 bg-red-900 rounded-full -top-2 -right-2 text-slate-200">{{$userActivitiesCount}}</span>
                @endif
            </a>
        </li>

        <li class="p-1 nav-item">
            <a class="relative nav-link flex justify-center items-center gap-2 text-slate-300  hover:scale-95 py-2 px-4 rounded-md transition-all duration-200
              @if (Request::routeIs('message.*'))
              bg-red-800 font-semibold
              @else
              bg-slate-800
             @endif
            " href="{{route('message.index')}}">
                <i class="text-xl fa-solid fa-comments"></i>
                <span class="text-lg ">  Messages </span>
                @if ($userMessagesCount>0)
                    <span class="absolute px-2 bg-red-800 rounded-full -top-2 -right-2 text-slate-200">{{$userMessagesCount}}</span>
                @endif
            </a>
        </li>

        <li class="p-1 nav-item">
            <a class="relative nav-link flex justify-center items-center gap-2 text-slate-300  hover:scale-95 py-2 px-4 rounded-md transition-all duration-200
            @if (Request::routeIs('reminder.*'))
            bg-red-800 font-semibold
            @else
            bg-slate-800
            @endif
          "
             href="{{route('reminder.index')}}">
                <i class="text-xl fa-solid fa-bell"></i>
                <span class="text-lg ">  Reminders </span>
                @if ($userRemindersCount>0)
                <span class="absolute px-2 bg-red-900 rounded-full -top-2 -right-2 text-slate-200">{{$userRemindersCount}}</span>
                @endif
            </a>
        </li>

        @if (Auth::user()->role!=0)
            <li class="p-1 nav-item">
                <a class="nav-link flex justify-center items-center gap-2 text-gray-300  hover:scale-95 py-2 px-4 rounded-md transition-all duration-200
                @if (Request::routeIs('logs.*'))
                bg-red-800 font-semibold
                @else
                bg-slate-800
                @endif
            " href="{{route('logs.index')}}">
                    <i class="text-xl fa-solid fa-binoculars"></i>
                    <span class="text-lg ">  Logs </span>
                </a>
            </li>
        @endif

        @if (Auth::user()->role!=0)
            <li class="p-1 nav-item">
                <a class="nav-link flex justify-center items-center gap-2 text-gray-300  hover:scale-95 py-2 px-4 rounded-md transition-all duration-200
                @if (Request::routeIs('users.*'))
                bg-red-800 font-semibold
                @else
                bg-slate-800
                @endif
            " href="{{route('users.index')}}">
                    <i class="text-xl fa-solid fa-users"></i>
                    <span class="text-lg ">  Users </span>
                </a>
            </li>
        @endif



        {{-- <li class="relative p-2 nav-item dropdown">
            <a class="flex items-center justify-center gap-2 px-4 py-2 text-gray-300 transition-all duration-200 dropdown-toggle nav-link bg-slate-900 hover:scale-95 rounded-xl "
            id="dropdownMenuButton2"
            data-bs-toggle="dropdown"
            aria-expanded="false"
            href="#">
            <i class="text-xl fa-solid fa-gear"></i>
            <span class="text-base"> Settings</span>
            </a>
            <ul
                class="absolute z-50 hidden float-left py-2 m-0 mt-1 text-base text-left list-none bg-white border-none rounded-lg shadow-lg dropdown-menu min-w-max bg-clip-padding"
                aria-labelledby="dropdownMenuButton2">
                    <li>
                    <a href="{{route('users.index')}}"
                        class="block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-transparent dropdown-item whitespace-nowrap hover:bg-gray-100"
                        href="#"
                        >Users</a
                    >
                    </li>


            </ul>
        </li> --}}






    </ul>
  <!-- Left links -->
  </div>
  <!-- Collapsible wrapper -->

  <!-- Right elements -->
  <div class="relative flex items-center">
  <!-- Icon -->

    @if (Auth::user()->role!=0)
        <ul class="flex items-center gap-1">
            <li class="nav-item">
                <a class="nav-link flex justify-center items-center gap-2 text-slate-300 bg-slate-800 hover:scale-95 py-2 px-4 rounded-md transition-all duration-200
                @if (Request::routeIs('admin.report'))
                bg-red-800  font-semibold
            @endif
            "
                href="{{route('admin.report')}}">
                    <i class="text-xl fa-solid fa-user-tie"></i>
                    <span class="text-lg ">  Admins Report </span>
                </a>
            </li>
            {{-- <li class="relative p-2 nav-item dropdown">
                <a class="flex items-center justify-center gap-2 px-4 py-2 text-gray-300 transition-all duration-200 rounded-md dropdown-toggle nav-link bg-slate-900 hover:scale-95 "
                id="dropdownMenuButton2"
                data-bs-toggle="dropdown"
                aria-expanded="false"
                href="#">
                <i class="text-2xl fa-solid fa-gear"></i>
                </a>
                <ul
                    class="absolute z-50 hidden float-left py-2 m-0 mt-1 text-base text-left list-none bg-white border-none rounded-lg shadow-lg dropdown-menu min-w-max bg-clip-padding"
                    aria-labelledby="dropdownMenuButton2">
                        <li>
                        <a
                            class="block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-transparent dropdown-item whitespace-nowrap hover:bg-gray-100"
                            href="{{route('setting.edit')}}"
                            >Invitation Code</a
                        >
                        </li>


                </ul>
            </li> --}}
        </ul>
    @endif



  </div>
  <!-- Right elements -->
  </div>
</nav>




    <div>
        <div class="">

            <div class="flex flex-col-reverse items-center justify-between gap-3 md:flex-row">


                <div class="w-full">
                    <x-time-container/>
                </div>

            </div>

        </div>
    </div>




<div>
    <div class="">

        <div class="flex flex-col-reverse items-center justify-between gap-3 md:flex-row">


            <div class="w-full">
                @livewire('user-status')
            </div>

        </div>

    </div>
</div>

