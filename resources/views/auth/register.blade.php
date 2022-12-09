@extends('layouts.master')

@section('content')


<div class="h-screen w-full flex items-center justify-center ">
    <div class="w-full md:w-1/4">
        <div class="bg-slate-800 rounded-xl px-5 py-3">

      <form  action="{{route('register')}}" method="post" class="">
        @csrf
        <h4 class="text-5xl font-semibold text-center text-slate-300">CPNIS Portal</h4>

        <p class="mb-8 text-center text-xl font-semibold my-3 text-slate-300">Please Register to Create your account</p>

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
            type="password" name="password"
            class="form-control block w-full px-3 py-3 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
            @error('password')
                border-red-500
            @enderror"
            id="exampleFormControlInput1"
            placeholder="Password"
          />
        </div>
        <div class="mb-4">
            <input
              type="password" name="password_confirmation"
              class="form-control block w-full px-3 py-3 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
              @error('password_confirmation')
                  border-red-500
              @enderror"
              id="exampleFormControlInput1"
              placeholder="Confirmation Password"
            />
          </div>
          <hr class="my-4">
          <div class="mb-4">
            <input
              type="text" name="invite_code"
              class="form-control block w-full px-3 py-3 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
              @error('invite_code')
                  border-red-500
              @enderror"
              id="exampleFormControlInput1"
              placeholder="Invitition Code"
            />
          </div>
        <div class="text-center my-3">
          <button
            class="block p-4 bg-emerald-600 text-white font-medium leading-tight uppercase rounded shadow-md hover:bg-emerald-700 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full mb-3"
            type="submit"
          >
            Sign Up
          </button>
          <a href="/login" class="block w-full p-4 bg-gray-900 text-white rounded" >Back to Login Page</a>
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
    </div>
    </div>
</div>




    <section class=" gradient-form ">
        <div class="container py-12 px-6 h-full mx-auto">
          <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
            <div class="md:w-8/12">
              <div class="block bg-white shadow-lg rounded-lg">
                <div class="lg:flex lg:flex-wrap g-0">
                  <div class="lg:w-6/12 px-4 md:px-0">
                    <div class="md:p-12 md:mx-6">
                            <div class="grid grid-cols-1 gap-2 my-2">
                                @foreach ($errors->all() as $error)
                                    <div class="text-xs bg-red-200 text-red-500 px-2 py-2 rounded">
                                        {{$error}}
                                    </div>
                                @endforeach
                            </div>
                      <form  action="{{route('register')}}" method="post" class="">
                        @csrf
                        <p class="mb-8 text-center text-xl font-semibold my-3">Please Register to Create your account</p>

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
                            type="password" name="password"
                            class="form-control block w-full px-3 py-3 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                            @error('password')
                                border-red-500
                            @enderror"
                            id="exampleFormControlInput1"
                            placeholder="Password"
                          />
                        </div>
                        <div class="mb-4">
                            <input
                              type="password" name="password_confirmation"
                              class="form-control block w-full px-3 py-3 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                              @error('password_confirmation')
                                  border-red-500
                              @enderror"
                              id="exampleFormControlInput1"
                              placeholder="Confirmation Password"
                            />
                          </div>
                          <hr class="my-4">
                          <div class="mb-4">
                            <input
                              type="text" name="invite_code"
                              class="form-control block w-full px-3 py-3 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                              @error('invite_code')
                                  border-red-500
                              @enderror"
                              id="exampleFormControlInput1"
                              placeholder="Invitition Code"
                            />
                          </div>
                        <div class="text-center pt-1 mb-12 pb-1">
                          <button
                            class="block px-6 py-5 bg-blue-800 text-white font-medium leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full mb-3"
                            type="submit"
                          >
                            Sign Up
                          </button>
                          <a href="/login" class="block w-full p-3 bg-gray-800 text-white rounded" >Back to Login Page</a>
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
                    </div>
                  </div>
                  <div
                    class="md:w-6/12 flex items-center lg:rounded-r-lg rounded-b-lg lg:rounded-bl-none"
                    style="
                      background: linear-gradient(to right, #4f0396, #090031);
                    "
                  >
                    <div class="text-white px-4 py-2 md:p-10 md:mx-6">
                        <h2 class="text-4xl my-2">Register Page</h2>
                        <div class="my-10"></div>
                        <h4 class="text-5xl font-semibold">CPNIS Portal</h4>
                      {{-- <p class="text-sm">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.
                      </p> --}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


@endsection

















