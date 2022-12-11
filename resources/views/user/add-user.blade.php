@extends('layouts.master')

@section('content')



<div class="container mx-auto bg-slate-900/80 p-2 rounded-xl">
    <div class="my-3">
        <div class="text-center text-white flex items-center gap-3 bg-slate-800 p-2 rounded-xl">
            <div class="flex items-center justify-center">
                <img class="w-16" src="http://127.0.0.1:8000/images/cpnis-logo.png" alt="">
            </div>
            <i class="fa-solid fa-user text-4xl "></i>
            <h2 class="text-3xl font-semibold">ADD User</h2>
        </div>
    </div>


    <div class="flex">
        <form  action="{{route('users.store')}}" method="post" class="w-64 bg-slate-800 rounded-md py-2 px-4">
            @csrf


            <div class="grid grid-cols-1 gap-2 my-2">
                @foreach ($errors->all() as $error)
                    <div class="text-xs bg-red-200 text-red-500 px-2 py-2 rounded">
                        {{$error}}
                    </div>
                @endforeach
            </div>

            <div class="mb-4">
              <input
                type="text" name="name"
                class="form-control block w-full px-3 py-3 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                @error('name')
                    border-red-500
                @enderror"
                id="exampleFormControlInput1"
                placeholder="Full Name"
                value="{{old('name')}}"
              />
            </div>


            <div class="mb-4">
                <input
                  type="text" name="email"
                  class="form-control block w-full px-3 py-3 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                  @error('email')
                      border-red-500
                  @enderror"
                  id="exampleFormControlInput1"
                  placeholder="Email"
                  value="{{old('email')}}"
                />
              </div>



            <div class="mb-4">
              <input
                type="text" name="password"
                class="form-control block w-full px-3 py-3 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                @error('password')
                    border-red-500
                @enderror"
                id="exampleFormControlInput1"
                placeholder="Password"
              />
            </div>
            {{-- <div class="mb-4">
                <input
                  type="password" name="password_confirmation"
                  class="form-control block w-full px-3 py-3 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                  @error('password_confirmation')
                      border-red-500
                  @enderror"
                  id="exampleFormControlInput1"
                  placeholder="Confirmation Password"
                />
              </div> --}}
              {{-- <hr class="my-4"> --}}
              {{-- <div class="mb-4">
                <input
                  type="text" name="invite_code"
                  class="form-control block w-full px-3 py-3 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                  @error('invite_code')
                      border-red-500
                  @enderror"
                  id="exampleFormControlInput1"
                  placeholder="Invitition Code"
                />
              </div> --}}
            <div class="text-center my-3">
              <button
                class="block p-4 bg-emerald-800 text-white font-medium leading-tight uppercase rounded shadow-md hover:bg-emerald-700 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full mb-3"
                type="submit"
              >
                Add New User
              </button>
              {{-- <a href="/login" class="block w-full p-4 bg-gray-900 text-white rounded" >Back to Login Page</a> --}}
              {{-- <a class="text-gray-500" href="#!">Forgot password?</a> --}}
            </div>
            {{-- <div class="flex items-center justify-between pb-6">
              <p class="mb-0 mr-2">Don't have an account?</p>
              <button
                type="button"
                class="inline-block px-6 py-2 border-2 border-red-600 text-red-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                data-mdb-ripple="true"
                data-mdb-ripple-color="light"
              >
                Danger
              </button>
            </div> --}}
          </form>
        {{-- <form action="{{route('user.profile.changepassword')}}" method="post" class="bg-slate-800 p-5 rounded-xl w-full md:w-auto">

            @csrf

            @method('post')



            @if (count($errors)>0)
                <div class="flex flex-wrap gap-2 my-2 bg-red-100 p-2 rounded-xl">
                    @foreach ($errors->all() as $error)
                        <div class="text-center text-xs bg-red-200 text-red-500 py-1 px-2 rounded-xl">
                            {{$error}}
                        </div>
                    @endforeach
                </div>
            @endif

            <div class=" flex flex-col gap-5">

                <div class="w-full md:w-64 flex flex-col items-strat  gap-2">

                    <label for="password" class="text-slate-300
                    @error('password')
                        text-red-500
                    @enderror
                    ">New Password</label>

                    <input type="password" name="password" class="
                    form-control
                    block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-gray-50 bg-clip-padding
                    border border-solid border-gray-300
                    rounded-xl
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                    @error('password')
                        border-red-500
                    @enderror
                    " >

                </div>

                <div class="w-full md:w-64 flex flex-col items-strat  gap-2">

                    <label for="password_confirmation" class="text-slate-300
                    @error('password_confirmation')
                        text-red-500
                    @enderror
                    ">Password Confirmation</label>

                    <input type="password" name="password_confirmation" class="
                    form-control
                    block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-gray-50 bg-clip-padding
                    border border-solid border-gray-300
                    rounded-xl
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                    @error('password_confirmation')
                        border-red-500
                    @enderror
                    " >

                </div>

                <button type="submit"
                class=" w-full px-4 py-4 bg-slate-900 text-white font-medium text-sm  uppercase rounded-xl shadow-md hover:bg-blue-900 hover:shadow-lg ">
                Save New Password </button>
            </div>

        </form> --}}
    </div>

</div>



@endsection
