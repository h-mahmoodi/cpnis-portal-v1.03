@extends('layouts.master')

@section('content')

<div class="relative overflow-hidden bg-no-repeat bg-cover" style="
    background-position: 50%;
    background-image: url('https://mdbcdn.b-cdn.net/img/new/slides/146.webp');
    height: 300px;
  ">
    <div class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed"
      style="background-color: rgba(0, 0, 0, 0.75)">
      <div class="flex justify-center items-center h-full">
        <div class="text-center text-white px-6 md:px-12">
          <h1 class="text-5xl font-bold mt-0 mb-6">Document Types</h1>
          <h3 class="text-xl mb-4">CPNIS Portal (Version 1.0)</h3>
          <nav class="bg-grey-light rounded-md w-full">
            <ol class="list-reset flex justify-center gap-2 font-semibold">
              <li><a href="/" class="text-white hover:text-gray-300">Dashboard</a></li>
              <li><span> > </span></li>
              <li><a href="{{route('documents.index')}}" class="text-white hover:text-gray-300">Documents</a></li>
              <li><span> > </span></li>
              <li><a class="text-yellow-500 hover:text-yellow-600">Document Types</a></li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>




  <div class="container mx-auto my-5">
    <div class="shadow bg-white p-3 rounded">

        <div class="">
            <div class="">
                <div class="flex justify-between gap-8">
                    <div>
                        <span class="font-bold text-3xl">
                            Document Types List

                        </span>
                    </div>
                </div>

            </div>

            <div class=" my-5">

                <div class="flex justify-between gap-4">

                    <div class="flex gap-4">
                        <div class="">
                            <button type="button" class="flex items-center gap-2 px-6 py-2.5 bg-indigo-800 text-white font-medium text-sm leading-tight uppercase rounded shadow-md hover:bg-gray-900 hover:shadow-lg "
                             data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                             <i class="fas fa-search"></i>
                              <span>  Search</span>
                            </button>
                          </div>

                        <div class="">
                            <button type="button" class="flex items-center gap-2 px-6 py-2.5 bg-blue-800 text-white font-medium text-sm leading-tight uppercase rounded shadow-md hover:bg-gray-900 hover:shadow-lg "
                             data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                             <i class="fas fa-filter"></i>
                             <span>  Filters</span>
                            </button>
                          </div>
                    </div>

                    <a href="{{route('documents.types.create')}}"
                    class="flex items-center gap-2 px-6 py-2.5 bg-emerald-800 text-white font-medium text-sm leading-tight uppercase rounded shadow-md hover:bg-gray-900 hover:shadow-lg "
                    >
                    <i class="fas fa-plus"></i>
                    <span>Add New Document Type</span>
                </a>




                      <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
                        <div class="modal-dialog modal-dialog-centered relative w-auto pointer-events-none">
                          <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                            <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                              <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalScrollableLabel">
                                Modal title
                              </h5>
                              <button type="button"
                                class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                                data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body relative p-4">
                              <p>This is a vertically centered modal.</p>
                            </div>
                            <div
                              class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                              <button type="button"
                                class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
                                data-bs-dismiss="modal">
                                Close
                              </button>
                              <button type="button"
                                class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1">
                                Save changes
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>



                </div>
            </div>
        </div>






{{-- Table --}}

        <div>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                      <table class="min-w-full rounded overflow-hidden">
                        <thead class="bg-gray-800 border-b ">
                          <tr class="">
                            <th scope="col" class="text-sm font-medium text-gray-100 px-6 py-4 text-left">
                              #
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-100 px-6 py-4 text-left">
                                 ID
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-100 px-6 py-4 text-left">
                                Name
                              </th>
                            <th scope="col" class="text-sm font-medium text-gray-100 px-6 py-4 text-left">

                            </th>

                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($documentTypes as $key=>$item)
                            <tr class="bg-white border-b transition duration-300 ease-in-out  hover:translate-x-5 hover:font-semibold">
                                <td class="px-6 py-4 whitespace-nowrap text-xs font-medium text-gray-800">{{$loop->iteration}}</td>
                                <td class="text-xs text-gray-900 px-6 py-4 whitespace-nowrap ">
                                    <span class="bg-gray-800 rounded py-1 px-2 text-white">
                                    # {{$item->id}}
                                    </span>
                                </td>
                                <td class="text-xs text-gray-900 px-6 py-4 whitespace-nowrap">
                                    <span class="bg-blue-800 rounded py-1 px-2 text-white">
                                        {{$item->name}}
                                    </span>
                                </td>



                                <td class="text-xs text-gray-900 px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-6">
                                        <a class="text-gray-800 hover:text-blue-800 text-xl hover:scale-110 transition" href="">
                                            <i class="fas fa-code-branch"></i>
                                        </a>
                                        <a class="text-gray-800 hover:text-orange-600 text-xl hover:scale-110 transition" href="">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a class="text-gray-800 hover:text-red-700  text-xl hover:scale-110 transition" href="">
                                            <i class="far fa-trash-alt"></i>
                                        </a>

                                    </div>
                                </td>
                              </tr>
                            @endforeach

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
        </div>



    </div>
</div>









@endsection
