@extends('layouts.layout')

@section('title','Jane HO')

@section('content')


<div class="container px-5 py-12 mx-auto">

    <div class="flex flex-col text-center w-full mb-12">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-teal-700">Bus Ticketing and Transport Management</h1>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Whatever cardigan tote bag tumblr hexagon brooklyn asymmetrical gentrify, subway tile poke farm-to-table. Franzen you probably haven't heard of them man bun deep jianbing selfies heirloom prism food truck ugh squid celiac humblebrag.</p>
      </div>
      @auth

      @else
          
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
      @endauth
</div>
<hr>
<div class="container mx-auto flex px-5 md:flex-row flex-col items-center">
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
<hr class="mt-2">
<div class="container px-5 py-12 mx-auto flex flex-wrap">
  <div class="flex flex-wrap -mx-4 mt-auto mb-auto lg:w-1/2 sm:w-2/3 content-start sm:pr-10">
    <div class="w-full sm:p-4 px-4 mb-6">
      <h1 class="title-font font-medium text-3xl mb-2 text-teal-700">Succesful in Delivering high quality services!</h1>
      <div class="leading-relaxed">Pour-over craft beer pug drinking vinegar live-edge gastropub, keytar neutra sustainable fingerstache kickstarter.</div>
    </div>
    <div class="p-4 sm:w-1/2 lg:w-1/4 w-1/2">
      <h2 class="title-font text-center font-medium text-3xl text-gray-900">{{ $users }}</h2>
      <p class="leading-relaxed text-center text-teal-700">Users</p>
    </div>
    <div class="p-4 sm:w-1/2 lg:w-1/4 w-1/2">
      <h2 class="title-font text-center font-medium text-3xl text-gray-900">{{ $buses }}</h2>
      <p class="leading-relaxed text-center text-teal-700">Buses</p>
    </div>
    <div class="p-4 sm:w-1/2 lg:w-1/4 w-1/2">
      <h2 class="title-font text-center font-medium text-3xl text-gray-900">{{ $places }}</h2>
      <p class="leading-relaxed text-center text-teal-700">Locations</p>
    </div>
    <div class="p-4 sm:w-1/2 lg:w-1/4 w-1/2">
      <h2 class="title-font text-center font-medium text-3xl text-gray-900">{{ $trips }}</h2>
      <p class="leading-relaxed text-center text-teal-700">Trips</p>
    </div>
  </div>
  <div class="lg:w-1/2 sm:w-1/3 w-full rounded-lg overflow-hidden mt-6 sm:mt-0">
    <img class="object-cover object-center w-full h-full" src="/assets/images/hatti.jpg" alt="stats">
  </div>
</div>
    
@endsection