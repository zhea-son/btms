@extends('company.master')

@section('title','My Routes')

@section('content')

<body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
    <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>

    <aside class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 xl:ml-6 max-w-64 ease-nav-brand z-990 rounded-2xl xl:left-0 xl:translate-x-0" aria-expanded="false">
      <div class="h-19">
        <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times dark:text-white text-slate-400 xl:hidden" sidenav-close></i>
        <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap dark:text-white text-slate-700" href="https://demos.creative-tim.com/argon-dashboard-tailwind/pages/dashboard.html" target="_blank">
          <img src="{{ asset('template/assets/img/logo-ct-dark.png') }}" class="inline h-full max-w-full transition-all duration-200 dark:hidden ease-nav-brand max-h-8" alt="main_logo" />
          <img src="{{ asset('template/assets/img/logo-ct.png') }}" class="hidden h-full max-w-full transition-all duration-200 dark:inline ease-nav-brand max-h-8" alt="main_logo" />
          <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">Company Dashboard</span>
        </a>
      </div>

      <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

      <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
        <ul class="flex flex-col pl-0 mb-0">

          <li class="mt-0.5 w-full">
            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors dark:text-white dark:opacity-80" href="/company/dashboard">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-tv-2"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
            </a>
          </li>
          
          <li class="mt-0.5 w-full">
            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors dark:text-white dark:opacity-80" href="/company/buses">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-emerald-500 ni ni-bus-front-12"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Buses</span>
            </a>
          </li>
          
          <li class="mt-0.5 w-full">
            <a class="py-2.7 bg-blue-500/13 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors " href="/company/routes">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-cyan-500 ni ni-square-pin"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Routes</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors dark:text-white dark:opacity-80" href="/company/schedules">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-red-500 ni ni-calendar-grid-58"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Schedules</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors dark:text-white dark:opacity-80" href="/company/trips">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-delivery-fast"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Trips</span>
            </a>
          </li>

          <li class="w-full mt-4">
            <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase dark:text-white opacity-60">Account pages</h6>
          </li>

          <li class="mt-0.5 w-full">
            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors dark:text-white dark:opacity-80" href="{{ route('company.profile') }}">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-slate-700 ni ni-single-02"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Profile</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="/company/logout">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-single-copy-04"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Log Out</span>
            </a>
          </li>

        </ul>
      </div>

      <div class="mx-4">
        <!-- load phantom colors for card after: -->
        <p class="invisible hidden text-gray-800 text-red-500 text-red-600 text-blue-500 dark:bg-white bg-slate-500 bg-gray-500/30 bg-cyan-500/30 bg-emerald-500/30 bg-orange-500/30 bg-red-500/30 after:bg-gradient-to-tl after:from-zinc-800 after:to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 after:from-blue-700 after:to-cyan-500 after:from-orange-500 after:to-yellow-500 after:from-green-600 after:to-lime-400 after:from-red-600 after:to-orange-600 after:from-slate-600 after:to-slate-300 text-emerald-500 text-cyan-500 text-slate-400"></p>
        <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none rounded-2xl bg-clip-border" sidenav-card>
          <img class="w-1/2 mx-auto" src="{{ asset('template/assets/img/illustrations/icon-documentation.svg') }}" alt="sidebar illustrations" />
          <div class="flex-auto w-full p-4 pt-0 text-center">
            <div class="transition-all duration-200 ease-nav-brand">
              <h6 class="mb-0 dark:text-white text-slate-700">Done Work?</h6>
              <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Go back to site</p>
            </div>
          </div>
        </div>
        <a href="/" class="inline-block w-full px-8 py-2 mb-4 text-xs font-bold leading-normal text-center text-white capitalize transition-all ease-in rounded-lg shadow-md bg-slate-700 bg-150 hover:shadow-xs hover:-translate-y-px">Visit Home Page</a>
        <!-- pro btn  -->
        <a class="inline-block w-full px-8 py-2 text-xs font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md select-none bg-150 bg-x-25 hover:shadow-xs hover:-translate-y-px" href="/company/logout">Logout</a>
      </div>
    </aside>

    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
        <!-- Navbar -->
        <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="false">
          <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
            <nav>
              <!-- breadcrumb -->
              <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                <li class="text-sm leading-normal">
                  <a class="text-white opacity-50" href="javascript:;">Company</a>
                </li>
                <li class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']" aria-current="page">Routes</li>
              </ol>
              <h6 class="mb-0 font-bold text-white capitalize">My Routes</h6>
            </nav>
  
            <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
              <div class="flex items-center md:ml-auto md:pr-4">
                <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease">
                  <span class="text-sm ease leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
                    <i class="fas fa-search"></i>
                  </span>
                  <input type="text" class="pl-9 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Type here..." />
                </div>
              </div>
              <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
                <!-- online builder btn  -->  
                <!-- <li class="flex items-center">
                  <a class="inline-block px-8 py-2 mb-0 mr-4 text-xs font-bold text-center text-blue-500 uppercase align-middle transition-all ease-in bg-transparent border border-blue-500 border-solid rounded-lg shadow-none cursor-pointer leading-pro hover:-translate-y-px active:shadow-xs hover:border-blue-500 active:bg-blue-500 active:hover:text-blue-500 hover:text-blue-500 tracking-tight-rem hover:bg-transparent hover:opacity-75 hover:shadow-none active:text-white active:hover:bg-transparent" target="_blank" href="https://www.creative-tim.com/builder/soft-ui?ref=navbar-dashboard&amp;_ga=2.76518741.1192788655.1647724933-1242940210.1644448053">Online Builder</a>
                </li> -->
                <li class="flex items-center">
                  <a href="../pages/sign-in.html" class="block px-0 py-2 text-sm font-semibold text-white transition-all ease-nav-brand">
                    <i class="fa fa-user sm:mr-1"></i>
                    <span class="hidden sm:inline">{{ $company->company_name }}</span>
                  </a>
                </li>
                <li class="flex items-center pl-4 xl:hidden">
                  <a href="javascript:;" class="block p-0 text-sm text-white transition-all ease-nav-brand" sidenav-trigger>
                    <div class="w-4.5 overflow-hidden">
                      <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                      <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                      <i class="ease relative block h-0.5 rounded-sm bg-white transition-all"></i>
                    </div>
                  </a>
                </li>
                <li class="flex items-center px-4">
                  <a href="#" class="p-0 text-sm text-white transition-all ease-nav-brand">
                    <i fixed-plugin-button-nav class="cursor-pointer fa fa-cog"></i>
                    <!-- fixed-plugin-button-nav  -->
                  </a>
                </li>
  
                <!-- notifications -->
  
                <li class="relative flex items-center pr-2">
                  <p class="hidden transform-dropdown-show"></p>
                  <a href="javascript:;" class="block p-0 text-sm text-white transition-all ease-nav-brand" dropdown-trigger aria-expanded="false">
                    <i class="cursor-pointer fa fa-bell"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
  
        <!-- end Navbar -->

        <div class="w-full px-6 py-6 mx-auto">
            <!-- table 1 -->
    
            <div class="flex flex-wrap -mx-3">
              <div class="flex-none w-full max-w-full px-3">
                <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border flex justify-end">
                  <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="dark:text-white">Routes table</h6>
                    <a class="flex text-red bg-teal-600 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"  href="{{ route('routes.create') }}"><p>Add Route</p></a>
                  </div>

                  @if(count($routes) == 0)
                    <p>No Routes found!</p>
                  @endif
    <div class="flex flex-wrap -m-4">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap -mx-4 -my-8">
                @foreach ($routes as $route)
                  @php $viaarray = explode(',', $route->via) @endphp
              <div class="py-8 px-4 lg:w-1/3 border border-teal-500">
                <div class="h-full flex items-start">
                  
                  <div class="flex-grow pl-6">
                    <h2 class="tracking-widest text-xs title-font font-medium text-indigo-500 mb-1">{{$route->distance}} km</h2>
                    <h1 class="title-font text-xl font-medium text-gray-900 mb-3">{{$route->name}}</h1>
                    <p class="leading-relaxed mb-5">Estimated Time: {{$route->estimated_time}} hrs.</p>
                    
                    <ul class="flex">
                        <li
                            class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-sm"
                        >
                            <a href="/routes/?origin={{$route->origin}}">{{$route->origin}}</a>
                        </li>
                        <li
                        class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-sm"
                        >
                        <a href="/routes/?destination={{$route->destination}}">{{$route->destination}}</a>
                    </li>
                    </ul>
                    <ul class="flex">
                      @foreach ($viaarray as $item)
                          
                      <li
                      class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-2 mr-1 mt-1 text-xs"
                      >
                      <a href="/routes/?place={{$item}}">{{$item}}</a>
                    </li>
                    @endforeach
                    {{-- <li
                        class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                        >
                        <a href="/buses/?type={{$route->type}}">{{$route->type}}</a>
                    </li> --}}
                    </ul>
                    <ul class="flex">
                        <li
                        class="text-teal-500 px-2 inline-flex items-center md:mb-2 lg:mb-0"
                    >
                        <a href="/schedules/{{$route->id}}/create">Add to Schedule</a>
                    </li>
                    <li
                        class="text-blue-500 inline-flex items-center px-2 md:mb-2 lg:mb-0"
                    >
                        <a href="/routes/{{$route->id}}/edit">Edit</a>
                    </li>
                    <li
                        class="text-red-500 inline-flex items-center px-2 md:mb-2 lg:mb-0"
                    >
                    <form method="POST" action="/routes/{{$route->id}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>        
                      </form>
                    </li>
                    </ul>
                  </div>
                </div>
              </div>

              @endforeach
            </div>
        </div>
            </div>
              </div>
            </div>
        </div>
    </main>
</body>


                




@endsection