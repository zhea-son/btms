@extends('layouts.layout')

@section('title','Jane HO')

@section('content')


<div class="container px-5 py-12 mx-auto">

    <div class="flex flex-col text-center w-full mb-20">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-teal-700">Bus Ticketing and Transport Management</h1>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Whatever cardigan tote bag tumblr hexagon brooklyn asymmetrical gentrify, subway tile poke farm-to-table. Franzen you probably haven't heard of them man bun deep jianbing selfies heirloom prism food truck ugh squid celiac humblebrag.</p>
      </div>
    <div class="flex flex-wrap -mx-4 -mb-10 text-center">
      <div class="sm:w-1/2 mb-10 px-4">
        <div class="rounded-lg h-64 overflow-hidden">
          <img alt="content" class="object-cover object-center h-full w-full" src="/assets/images/userwala.jpg">
        </div>
        <h2 class="title-font text-2xl font-medium text-gray-900 mt-6 mb-3">Travel with Us</h2>
        <p class="leading-relaxed text-base">Look for buses and tickets for a great experience of travelling.</p>
        <button type="button" class="text-white bg-teal-600 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mt-2 mr-3 md:mr-0 "><a href={{ route('users.login') }}>User Login</a></button>
      </div>
      <div class="sm:w-1/2 mb-10 px-4">
        <div class="rounded-lg h-64 overflow-hidden">
          <img alt="content" class="object-cover object-center h-full w-full" src="/assets/images/companywala.jpg">
        </div>
        <h2 class="title-font text-2xl font-medium text-gray-900 mt-6 mb-3">Manage your Fleet</h2>
        <p class="leading-relaxed text-base">Manage your vehicles as well as routes and schedule your trip.</p>
        <button type="button" class="text-white bg-teal-600 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mt-2 mr-3 md:mr-0 "><a href={{ route('company.login') }}>Company Login</a></button>
      </div>
    </div>
  </div>

<div class="container mx-auto flex px-5 py-2 md:flex-row flex-col items-center">
    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
      <img class="object-cover object-center rounded" alt="hero" src="/assets/images/nepal.jpg">
    </div>
    <div class="lg:flex-grow md:w-1/2 lg:pl-2 md:pl-2 flex flex-col md:items-start md:text-left items-center text-center">
        <div class="flex flex-col text-center w-full mb-5">
            <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Buses</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">We provide variety of options for distinct trips!</p>
        </div>
        <div class="lg:w-2/3 w-full mx-auto overflow-auto">
            <table class="table-auto w-full text-left whitespace-no-wrap">
            <thead>
                <tr>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">From</th>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">To</th>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Best Price</th>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Bus Type</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td class="px-4 py-3">Chitwan</td>
                <td class="px-4 py-3">Kathmandu</td>
                <td class="px-4 py-3">Rs. 600</td>
                <td class="px-4 py-3 text-lg text-gray-900">Micro</td>
                </tr>
                <tr>
                <td class="border-t-2 border-gray-200 px-4 py-3">Kathmandu</td>
                <td class="border-t-2 border-gray-200 px-4 py-3">Pokhara</td>
                <td class="border-t-2 border-gray-200 px-4 py-3">Rs. 1200</td>
                <td class="border-t-2 border-gray-200 px-4 py-3 text-lg text-gray-900">Tourist</td>
                </tr>
                <tr>
                <td class="border-t-2 border-gray-200 px-4 py-3">Pokhara</td>
                <td class="border-t-2 border-gray-200 px-4 py-3">Butwal</td>
                <td class="border-t-2 border-gray-200 px-4 py-3">Rs. 1000</td>
                <td class="border-t-2 border-gray-200 px-4 py-3 text-lg text-gray-900">Deluxe</td>
                </tr>
                <tr>
                <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3">Kathmandu</td>
                <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3">Jhapa</td>
                <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3">Rs. 1800</td>
                <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3 text-lg text-gray-900">Tourist</td>
                </tr>
            </tbody>
            </table>
        </div>
        <div class="flex pl-4 mt-4 lg:w-2/3 w-full mx-auto">
            <a class="text-teal-500 inline-flex items-center md:mb-2 lg:mb-0" href="/buses">See Buses
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
            </a>
            
        </div>
    </div>
</div>

<div class="container px-5 mt-12 mb-5 mx-auto">
   
    <div class="flex background-teal-100 flex-wrap -m-4 text-center">
      <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-indigo-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
            <path d="M8 17l4 4 4-4m-4-5v9"></path>
            <path d="M20.88 18.09A5 5 0 0018 9h-1.26A8 8 0 103 16.29"></path>
          </svg>
          <h2 class="title-font font-medium text-3xl text-gray-700">2.7K</h2>
          <p class="leading-relaxed text-teal-700">Trips</p>
        </div>
      </div>
      <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-indigo-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
            <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path>
            <circle cx="9" cy="7" r="4"></circle>
            <path d="M23 21v-2a4 4 0 00-3-3.87m-4-12a4 4 0 010 7.75"></path>
          </svg>
          <h2 class="title-font font-medium text-3xl text-gray-700">1.3K</h2>
          <p class="leading-relaxed text-teal-700">Users</p>
        </div>
      </div>
      <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-indigo-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
            <path d="M3 18v-6a9 9 0 0118 0v6"></path>
            <path d="M21 19a2 2 0 01-2 2h-1a2 2 0 01-2-2v-3a2 2 0 012-2h3zM3 19a2 2 0 002 2h1a2 2 0 002-2v-3a2 2 0 00-2-2H3z"></path>
          </svg>
          <h2 class="title-font font-medium text-3xl text-gray-700">74</h2>
          <p class="leading-relaxed text-teal-700">Buses</p>
        </div>
      </div>
      <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-indigo-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
          </svg>
          <h2 class="title-font font-medium text-3xl text-gray-700">46</h2>
          <p class="leading-relaxed text-teal-700">Places</p>
        </div>
      </div>
    </div>
  </div>
    
@endsection