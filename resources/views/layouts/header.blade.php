<div class="container mx-auto flex  gap-2 justify-between items-center text-orange-600 my-2">
            <div class="flex items-center">
                <img class="w-16 md:w-20" src="{{asset('images/cpnis-logo.png')}}" alt="">
                <div>
                    <h1 class="text-2xl md:text-3xl font-semibold text-white">CPNIS Portal</h1>
                    <h3 class="text-xs md:text-base text-slate-400">Users Working System v1.3</h3>
                </div>
            </div>
            <div class="flex justify-center text-xl  p-2 rounded-lg ">
                <div class="dropdown relative">

                    <a class="nav-link flex justify-center items-center gap-2 text-slate-800 bg-slate-100 hover:scale-95 py-1 px-4 rounded-md transition-all duration-200"
                    href="#" id="dropdownMenuButton1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="flex gap-2 items-center justify-between">
                            <div class="flex flex-col">
                                <div class="flex flex-col items-end">
                                    <span class=" text-base font-semibold">Hi {{auth()->user()->name}}</span>
                                    {{-- <span class="text-xs">
                                        @if (auth()->user()->role==2)
                                            Super Admin
                                        @elseif (auth()->user()->role==1)
                                            Admin
                                        @elseif (auth()->user()->role==0)
                                            Normal User
                                        @endif
                                    </span> --}}
                                    <span class="text-xs font-semibold">
                                        {{auth()->user()->email}}
                                    </span>
                                </div>

                            </div>
                            <i class="fa-solid fa-bars text-2xl text-slate-800 rounded-lg p-1"></i>

                        </div>
                    </a>

                <ul class="
                  dropdown-menu
                  min-w-max
                  absolute
                  hidden
                  bg-white
                  text-base
                  z-50
                  float-left
                  py-2
                  list-none
                  text-left
                  rounded-lg
                  shadow-lg
                  mt-1
                  hidden
                  m-0
                  bg-clip-padding
                  border-none
                  left-auto
                  right-0
                " aria-labelledby="dropdownMenuButton1">
                <li>
                    <a class="
                      dropdown-item
                      text-sm
                      py-2
                      px-4
                      font-normal
                      block
                      w-full
                      whitespace-nowrap
                      bg-transparent
                      text-gray-700
                      hover:bg-gray-100
                    " href="{{route('user.profile')}}">Change Password</a>
                  </li>
                  <li>
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        @method('post')
                        <button class="
                        dropdown-item
                        text-sm
                        py-2
                        px-4
                        font-normal
                        block
                        w-full
                        whitespace-nowrap
                        bg-transparent
                        text-gray-700
                        hover:bg-gray-100
                      " type="submit">Exit</button>
                    </form>
                  </li>


                </ul>
              </div>
            </div>
</div>



<nav class="
bg-slate-700
  relative
  w-full
  py-2
  flex flex-wrap
  items-center
  justify-center
  text-slate-200
  hover:text-slate-400
  focus:text-slate-400
  shadow-lg
  navbar navbar-expand-lg navbar-light
  ">
  <div class="container mx-auto w-full flex flex-wrap items-center justify-between px-6">
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
  <div class="collapse navbar-collapse flex-grow" id="navbarSupportedContent">

    <!-- Left links -->
    <ul class="navbar-nav gap-1 flex flex-col pl-0 list-style-none">
        <li class="nav-item p-1">
            <a class="nav-link flex justify-center items-center gap-2 text-slate-300  hover:scale-95 py-2 px-4 rounded-md transition-all duration-200
            @if (Request::routeIs('index'))
             bg-slate-900 font-semibold
             @else
             bg-slate-800
            @endif
            " href="{{route('index')}}">
                <i class="fa-solid fa-home text-xl "></i>
                <span class="  text-lg text-slate-300">  Dashboard</span>
            </a>
        </li>
        {{-- <li class="nav-item p-2">
            <a class="nav-link flex justify-center items-center gap-2 text-gray-200 bg-slate-800 hover:scale-95 py-2 px-4 rounded-xl transition-all duration-200" href="{{route('documents.index')}}">
                <i class="fa-solid fa-folder text-xl rounded-xl bg-slate-800 text-slate-200"></i>
                <span class="font-bold text-slate-200 text-base">  Subjects </span>
            </a>
        </li> --}}

        <li class="nav-item p-1">
            <a class="relative nav-link flex justify-center items-center gap-2 text-slate-300  hover:scale-95 py-2 px-4 rounded-md transition-all duration-200
            @if (Request::routeIs('tasks.*'))
            bg-slate-900 font-semibold
            @else
            bg-slate-800
            @endif
          " href="{{route('tasks.index')}}">
                <i class="fas fa-code-fork text-xl"></i>
                <span class=" text-lg ">  Tasks </span>
                @if ($userTasksCount>0)
                    <span class="absolute -top-2 -right-2 rounded-full bg-red-800 text-slate-200 px-2">{{$userTasksCount}}</span>
                @endif
            </a>
        </li>

        <li class="nav-item p-1">
            <a class="relative nav-link flex justify-center items-center gap-2 text-slate-300  hover:scale-95 py-2 px-4 rounded-md transition-all duration-200
              @if (Request::routeIs('activities.*'))
              bg-slate-900 font-semibold
              @else
              bg-slate-800
             @endif
            " href="{{route('activities.index')}}">
                <i class="fa-solid fa-code-pull-request text-xl"></i>
                <span class=" text-lg ">  Activities </span>
                @if ($userActivitiesCount>0)
                    <span class="absolute -top-2 -right-2 rounded-full bg-red-800 text-slate-200 px-2">{{$userActivitiesCount}}</span>
                @endif
            </a>
        </li>

        <li class="nav-item p-1">
            <a class="relative nav-link flex justify-center items-center gap-2 text-slate-300  hover:scale-95 py-2 px-4 rounded-md transition-all duration-200
            @if (Request::routeIs('reminder.*'))
            bg-slate-900 font-semibold
            @else
            bg-slate-800
            @endif
          "
             href="{{route('reminder.index')}}">
                <i class="fa-solid fa-bell text-xl"></i>
                <span class="text-lg ">  Reminders </span>
                @if ($userRemindersCount>0)
                <span class="absolute -top-2 -right-2 rounded-full bg-red-800 text-slate-200 px-2">{{$userRemindersCount}}</span>
                @endif
            </a>
        </li>

        @if (Auth::user()->role!=0)
            <li class="nav-item p-1">
                <a class="nav-link flex justify-center items-center gap-2 text-gray-300  hover:scale-95 py-2 px-4 rounded-md transition-all duration-200
                @if (Request::routeIs('logs.*'))
                bg-slate-900 font-semibold
                @else
                bg-slate-800
                @endif
            " href="{{route('logs.index')}}">
                    <i class="fa-solid fa-binoculars text-xl"></i>
                    <span class="text-lg ">  Logs </span>
                </a>
            </li>
        @endif

        @if (Auth::user()->role!=0)
            <li class="nav-item p-1">
                <a class="nav-link flex justify-center items-center gap-2 text-gray-300  hover:scale-95 py-2 px-4 rounded-md transition-all duration-200
                @if (Request::routeIs('users.*'))
                bg-slate-900 font-semibold
                @else
                bg-slate-800
                @endif
            " href="{{route('users.index')}}">
                    <i class="fa-solid fa-users text-xl"></i>
                    <span class="text-lg ">  Users </span>
                </a>
            </li>
        @endif



        {{-- <li class="nav-item p-2 dropdown relative">
            <a class="dropdown-toggle nav-link flex justify-center items-center gap-2 text-gray-300 bg-slate-900 hover:scale-95 py-2 px-4 rounded-xl transition-all duration-200
            "
            id="dropdownMenuButton2"
            data-bs-toggle="dropdown"
            aria-expanded="false"
            href="#">
            <i class="fa-solid fa-gear text-xl"></i>
            <span class="text-base"> Settings</span>
            </a>
            <ul
                class="
                dropdown-menu
                min-w-max
                absolute
                hidden
                bg-white
                text-base
                z-50
                float-left
                py-2
                list-none
                text-left
                rounded-lg
                shadow-lg
                mt-1
                hidden
                m-0
                bg-clip-padding
                border-none
                "
                aria-labelledby="dropdownMenuButton2">
                    <li>
                    <a href="{{route('users.index')}}"
                        class="
                        dropdown-item
                        text-sm
                        py-2
                        px-4
                        font-normal
                        block
                        w-full
                        whitespace-nowrap
                        bg-transparent
                        text-gray-700
                        hover:bg-gray-100
                        "
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
  <div class="flex items-center relative">
  <!-- Icon -->

    @if (Auth::user()->role!=0)
        <ul class="flex items-center gap-1">
            <li class="nav-item">
                <a class="nav-link flex justify-center items-center gap-2 text-slate-300 bg-slate-900 hover:scale-95 py-2 px-4 rounded-md transition-all duration-200
                @if (Request::routeIs('admin.report'))
                bg-slate-900 text-orange-600 font-semibold
            @endif
            "
                href="{{route('admin.report')}}">
                    <i class="fa-solid fa-user-tie text-xl"></i>
                    <span class="text-lg ">  Admins Report </span>
                </a>
            </li>
            <li class="nav-item p-2 dropdown relative">
                <a class="dropdown-toggle nav-link flex justify-center items-center gap-2 text-gray-300 bg-slate-900 hover:scale-95 py-2 px-4 rounded-md transition-all duration-200
                "
                id="dropdownMenuButton2"
                data-bs-toggle="dropdown"
                aria-expanded="false"
                href="#">
                <i class="fa-solid fa-gear text-2xl"></i>
                </a>
                <ul
                    class="
                    dropdown-menu
                    min-w-max
                    absolute
                    hidden
                    bg-white
                    text-base
                    z-50
                    float-left
                    py-2
                    list-none
                    text-left
                    rounded-lg
                    shadow-lg
                    mt-1
                    hidden
                    m-0
                    bg-clip-padding
                    border-none
                    "
                    aria-labelledby="dropdownMenuButton2">
                        <li>
                        <a
                            class="
                            dropdown-item
                            text-sm
                            py-2
                            px-4
                            font-normal
                            block
                            w-full
                            whitespace-nowrap
                            bg-transparent
                            text-gray-700
                            hover:bg-gray-100
                            "
                            href="{{route('setting.edit')}}"
                            >Invitation Code</a
                        >
                        </li>


                </ul>
            </li>
        </ul>
    @endif



  </div>
  <!-- Right elements -->
  </div>
</nav>



<div>
    <div class="">

        <div class="flex flex-col-reverse md:flex-row items-center justify-between gap-3">


            <div class="w-full">
                <x-time-container/>
            </div>

        </div>

    </div>
</div>

