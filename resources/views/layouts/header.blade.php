<div class="container">
    <nav class=" bg-white px-2 sm:px-4 py-2.5 dark:bg-gray-900 fixed w-full z-20 top-0 left-0 border-b border-gray-200">
        <div class="container flex flex-wrap items-center justify-between mx-auto">
            <a href="{{ route('pages.home') }}" class="flex items-center">
                <img src="/assets/images/janeho.png" class="h-6 mr-3 sm:h-9" alt="Logo">
                <span class="self-center text-xl font-semibold whitespace-nowrap text-dark-400"><b class="text-teal-600">Pratikshya</b>Laya</span>
            </a>

            <div class="flex md:order-2">
                @auth

                <span class="inline-flex font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0 font-bold uppercase">Welcome {{ auth()->user()->name }} </span>
                <form method="POST" action="/user/logout" class="inline">
                    @csrf
                    <button type="submit" class="ml-2 text-white bg-teal-600 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0 ">Logout</button>
                    
                </form>

                @else

                <button type="button" class="text-white bg-teal-600 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0 "><a href={{ route('pages.login') }}>Log In</a></button>
                <button type="button" class="ml-2 text-white bg-teal-600 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0 "><a href={{ route('pages.sign_up') }}>Sign Up</a></button>
                
                @endauth

                <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white">
                    
                    <li>
                        <a href="{{ route('pages.home') }}"
                            class="block py-2 pl-3 pr-4 {{ Route::currentRouteName() == 'pages.home' ? 'text-teal-500' : 'text-gray-700' }} rounded hover:bg-gray-100 md:hover:bg-transparent">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('pages.about') }}"
                            class="block py-2 pl-3 pr-4 {{ Route::currentRouteName() == 'pages.about' ? 'text-teal-500' : 'text-gray-700' }} rounded hover:bg-gray-100 md:hover:bg-transparent">About us</a>
                    </li>
                    <li>
                        <a href="{{ route('my_bookings') }}"
                            class="block py-2 pl-3 pr-4 {{ Route::currentRouteName() == 'my_bookings' ? 'text-teal-500' : 'text-gray-700' }} rounded hover:bg-gray-100 md:hover:bg-transparent">My Bookings</a>
                    </li>
                    <li>
                        <button class="inline-block relative">
                            <a href="{{ route('pages.live') }}" class="block py-2 pl-3">
                                <p style="color:#cf3d3c"><u>Live Update
                            <span class="animate-ping absolute top-1 right-0.5 block h-1 w-1 rounded-full ring-2 ring-red-400 bg-red-600"></span>    
                        </u></p>
                            </a>
                        </button>                    
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
